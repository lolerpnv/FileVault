<?php
/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 12.7.2016.
 * Time: 18:16
 */


$cookie_name = "FileVault_tpap";
if(!isset($_COOKIE[$cookie_name])) {

    setcookie("$cookie_name","false");
    return "false";

} else {
    return $_COOKIE[$cookie_name];
}