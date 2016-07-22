<?php/**
* Created by PhpStorm.
* User: Toni
* Date: 18.7.2016.
* Time: 22:23
*/
if(session_status()!=2)session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>File Vault</title>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="http://localhost/FileVault/model/user_index.php?choice=1">Files</a></li>
                <li><a href="http://localhost/FileVault/model/user_index.php?choice=2">Upload</a></li>
                <li><a href="http://localhost/FileVault/model/user_index.php?choice=3">Settings</a></li>
            </ul>
            <div class="navbar-header" align="right">
                <a class="navbar-brand" href="http://localhost/FileVault/model/logoutUser.php">Logout as <?php session_start();  echo $_SESSION['user']?></a>
            </div>
        </div>
    </nav>
<?php
if(session_status()!=2)session_start();
if(isset($_GET['choice'])) {
    switch ($_GET['choice'])
    {
        case 1:
            echo include_once ("html/user_index_files.php");
            break;
        case 2:
            echo include_once ("html/user_index_upload.php");
            break;
        case 3:
            echo include_once ("html/user_index_settings.php");
            break;
        default :
            echo include_once ("html/user_index_files.php");
            break;
    }
}else echo include_once("html/user_index_files.php");?>
