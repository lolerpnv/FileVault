<?php
/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 22.6.2016.
 * Time: 20:54
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('URL','http://localhost/FileVault/');
define('BP',$_SERVER['DOCUMENT_ROOT'].'/FileVault');
session_start();

spl_autoload_register(function ($class_name) {
    include  (BP."/model/".$class_name . '.class.php');

});
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$Array = explode("/",$actual_link);
$one = $Array[5];
if(isset($Array[6]))$two = $Array[6];
$usr = new User();
switch ($one)
{
    case "login":
        echo "log";
        $usr->login($_POST['usr'],$_POST['pass']);
        break;
    case "register":
        echo "reg";
        $usr->register($_POST['usr'],$_POST['email'],$_POST['pwd'],$_POST['pwd2']);
        break;
    case "logout":
        echo "logout";
        $usr->logout();
        break;
    case "file":
        echo "file";
        $file = new FileHandle();

        break;
}