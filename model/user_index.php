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
                <li><a href="<?php echo URL; ?>index.php?choice=1">Files</a></li>
                <li><a href="<?php echo URL; ?>index.php?choice=2">Upload</a></li>
                <li><a href="<?php echo URL; ?>index.php?choice=3">Settings</a></li>
            </ul>
            <div class="navbar-header" align="right">
                <form class="navbar-brand" method="post" href="<?php echo URL; ?>index.php">
                    <input type="hidden" name="action" value="logout" />
                    <button type="submit" class="btn btn-default"> Logout as <?php if(session_status()!=2)session_start();  echo $_SESSION['user']?></button>
                </form>
            </div>
        </div>
    </nav>
<?php
if(session_status()!=2)session_start();
if(isset($choice)) {
    switch ($choice)
    {
        case 1:
            include ("html/user_index_files.php");
            break;
        case 2:
            include ("html/user_index_upload.php");
            break;
        case 3:
            include ("html/user_index_settings.php");
            break;
        default :
            include ("html/user_index_files.php");
            break;
    }
}else include("html/user_index_files.php");?>
