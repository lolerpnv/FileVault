<?php
/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 22.6.2016.
 * Time: 20:54
 */
define('URL','http://localhost/FileVault/');
session_start();
$cookieValue = include_once "model/handleCookie.php";
if(isset($_POST['action']))
{
    include "model/User.class.php";
    $user = new User();
    switch ($_POST['action'])
    {
        case "login":
            $result = $user->login($_POST['usr'],$_POST['pwd']);
            if($result == 0)include "html/welcome.html";
            else include "model/user_index.php";
            break;
        case "registerform":
            include "model/registerForm.php";
            break;
        case "register":
            $result = $user->register($_POST['usr'],$_POST['email'],$_POST['pwd'],$_POST['pwd2']);
            if($result == 1)
                include "html/welcome.html";
            else{
                $message = $result;
                include "model/registerForm.php";
            }
            break;
        case "logout":
            $user->logout();
            include "html/welcome.html";
            break;
        case "upload":
            include "model/html/upload.php";
            break;
    }
}
else if(isset($_SESSION['user']))//logged in
{
    if(isset($_GET['choice']))$choice = $_GET['choice'];
    else $choice = "1";
    include "model/user_index.php";

}else {
    include "html/welcome.html";
}

