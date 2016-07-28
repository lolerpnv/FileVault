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
                <li><a href="<?php echo URL; ?>/1">Files</a></li>
                <li><a href="<?php echo URL; ?>/2">Upload</a></li>
                <li><a href="<?php echo URL; ?>/3">Settings</a></li>
            </ul>
            <a href = "<?php echo URL ?>/logout">
                <button type="submit" class="btn btn-default"> Logout as <?php echo $_SESSION['user']?></button>
            </a>
        </div>
    </nav>
<?php
echo $choice;
if($one == "2")include (BP."/html/user_index_upload.php");?>
</body>
</html>
