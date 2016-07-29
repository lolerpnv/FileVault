<?php
/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 22.6.2016.
 * Time: 20:54
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('URL','http://'.$_SERVER['SERVER_NAME'].'/FileVault/index');
define('BP',$_SERVER['DOCUMENT_ROOT'].'/FileVault');
session_start();

spl_autoload_register(function ($class_name) {
    include  (BP."/model/".$class_name . '.class.php');
});
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$Array = explode("/",$actual_link);
$message = "";
$one = "";
$two = "";
if(isset($Array[5]))$one = $Array[5];
if(isset($Array[6]))$two = $Array[6];

$db = DataBase::getInstance();
$usr = new User();
if(isset($_SESSION['user'])){
    $choice = "";
    switch ($one)
    {
        case 1:
            $table = $usr->getUserAssets($_SESSION['user_id']);
            $choice = include BP."/html/user_index_files.php";
            include BP."/html/user_index.php";
            break;

        case 2:
            include BP."/html/user_index.php";
            break;

        case 3:
            $choice = file_get_contents(BP."/html/user_index_settings.php",FILE_USE_INCLUDE_PATH);
            include BP."/html/user_index.php";
            break;

        case "logout":
            $usr->logout();
            include BP."/html/welcome.php";
            break;

        case "files":
            $file = new FileHandle();
            if(!isset($_POST['private']))$private = "off";
            else $private = $_POST['private'];
            switch($two)
            {
                case "up":
                    $file->upFile($_FILES["fileToUpload"]["tmp_name"],$_FILES['fileToUpload']['name'],$_FILES['fileToUpload']['size'],$private);
                    $table = $usr->getUserAssets($_SESSION['user_id']);
                    $choice = include BP."/html/user_index_files.php";
                    include BP."/html/user_index.php";
                    break;
                case "delete":

                    break;
                default :
                    if(!$file->getFile($two,$actual_link)){
                        $table = $usr->getUserAssets($_SESSION['user_id']);
                        $choice = include BP."/html/user_index_files.php";
                        include BP."/html/user_index.php";
                    }
                    break;
            }
            break;
        default:
            $table = $usr->getUserAssets($_SESSION['user_id']);
            $choice = include BP."/html/user_index_files.php";
            include BP."/html/user_index.php";
            break;
    }
}else
    switch ($one)
    {
        ////////////////////////////////////////////////Login
        case "login":
            if(($usr->login($_POST['usr'],$_POST['pwd']))==1){
                $table = $usr->getUserAssets($_SESSION['user_id']);
                $choice = include BP."/html/user_index_files.php";
                include BP."/html/user_index.php";
            }
            else {
                $message = 'alert("Failed to login")';
                include BP."/html/welcome.php";
            }
            break;

        case "register":
            if(isset($_POST['usr'])){
                if(($resp = $usr->register($_POST['usr'],$_POST['email'],$_POST['pwd'],$_POST['pwd2']))){
                    $usr->sendActivationMail($_POST['email']);
                    $message = "alert(successfully registered,please log in.)";
                    include BP."/html/welcome.php";
                }
                else{
                    $message = 'alert("Failed to register")';
                    echo $resp; include BP."/html/registerForm.php";
                }
            }
            else include BP."/html/registerForm.php";
            break;
        case "activate":
            if(isset($_POST['usr']))
            {
                if(($usr->login($_POST['usr'],$_POST['pwd']))==1){
                    $db = DataBase::getInstance();
                    $db->activateUser($_SESSION['user_id']);
                    $table = $usr->getUserAssets($_SESSION['user_id']);
                    $choice = include BP."/html/user_index_files.php";
                    include BP."/html/user_index.php";
                }
                else {
                    $message = 'alert("Failed to login")';
                    include BP."/html/welcome.php";
                }
            }else include BP."/html/activateForm.php";
            break;
        case "files":
            if(isset($two)) {
                $file = new FileHandle();
                if ($file->getFile($two, $actual_link)==0) {
                    include BP . "/html/welcome.php";
                }
                else {
                    $message = 'alert("There is no such file")';
                    include BP."/html/welcome.php";
                }
            }
            break;

        default:
            include BP."/html/welcome.php";
    }
