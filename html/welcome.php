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

<h1 align="center"style="padding-top: 4%">Welcome to FileVault</h1>
<form role="form" action="<?php BP.'/public/index.php' ?>" method="post" align = "center" style="padding-left: 40%;padding-right: 40%;padding-top: 5%">
    <input type="hidden" name="action" value="login" />
    <div class="form-group">
        <label for="usr">Username:</label>
        <input type="text" class="form-control" id="usr" name="usr">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="pwd">
    </div>
    <button type="Login" class="btn btn-default">Login</button>
</form>
<div align="center" style="padding-top: 2%">
    <form method="post" action="http://localhost/FileVault/index.php">
        <input type="hidden" name="action" value="registerform" />
        <button class="btn btn-default" type="submit" >Register</button>
    </form>
</div>
</body>
</html>