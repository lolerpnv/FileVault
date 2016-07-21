<?php
/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 12.7.2016.
 * Time: 20:34
 */
$user = $_POST["usr"];
$pass = $_POST["pwd"];

$conn = include_once("dbLogin.php");

//$pass = md5(md5($pass));

$sql = "SELECT * FROM user WHERE pass='$pass' AND username='$user'";
$result = $conn->query($sql);
if($result->num_rows == 1 )
{
    session_start();
    $_SESSION['user']=$user;
    $output = '<html><meta http-equiv="refresh" content="0;url=http://localhost/FileVault/index.php"/></html>';
    //$output = "<html><body>LOGIRAN</body></html>";
}
$conn->close();

echo $output;