<?php
/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 22.6.2016.
 * Time: 20:54
 */
session_start();
$local="localhost/FileVault/";
$cookieValue = include_once "model/handleCookie.php";
if(isset($_SESSION['user']))//not logged in
{
    $output = '<html><meta http-equiv="refresh" content="0;url=http://localhost/FileVault/model/user_index.php"/></html>';

}else {
    $output = '<html><meta http-equiv="refresh" content="0;url=http://localhost/FileVault/html/welcome.html"/></html>';
}

echo $output;

