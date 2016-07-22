
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
<form role="form" action="http://localhost/FileVault/model/registerUser.php?reg=check" method="post" align = "center" style="padding-left: 40%;padding-right: 40%;padding-top: 5%">
    <div class="form-group">
        <label for="usr">Username:</label>
        <input type="text" class="form-control" id="usr" name="usr">
    </div>
    <div class="form-group">
        <label for="usr">email:</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="pwd">
    </div>
    <div class="form-group">
        <label for="pwd">Repeat Password:</label>
        <input type="password" class="form-control" id="pwd2" name="pwd2">
    </div>
    <button type="Login" class="btn btn-default">Register</button>
</form>
<?php
/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 21.7.2016.
 * Time: 16:35
 */
if(isset($_GET['reg']))
{
    $output = $_GET['reg'];
    echo "<h5>$output</h5>";
}
?>
</body>
</html>