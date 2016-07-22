<?php
/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 18.7.2016.
 * Time: 22:17
 */
if(session_status()!=2)session_start();

if(isset($_GET['reg']) and $_GET['reg'] == 'check') {

    $username = $_POST['usr'];
    $password = $_POST['pwd'];
    $email = $_POST['email'];
    //$conn = include "dbLogin.php";
    //$mailis = sql("SELECT COUNT(email) FROM user WHERE email='$email'");
    //$usernameis = sql("SELECT COUNT(username) FROM user WHERE username='$username'");
    //$conn->close();

    if ($_POST['pwd'] != $_POST['pwd2']) {
        return '<html><meta http-equiv="refresh" content="0;url=http://localhost/FileVault/model/registerForm.php?reg=passwords dont match"/></html>';
    /*}else if ($mailis->num_rows > 0) {echo "one";
        return '<html><meta http-equiv="refresh" content="0;url=http://localhost/FileVault/model/registerForm.php?reg=email taken"/></html>';
    }else if($usernameis->num_rows > 0){echo "two";
        return '<html><meta http-equiv="refresh" content="0;url=http://localhost/FileVault/model/registerForm.php?reg=username taken"/></html>';*/
    }
    else {
        echo "else fail";
        $conn= include "dbLogin.php";

        $sql = "INSERT INTO user (username, email, pass, active) VALUES ('$username','$email', '$password','false')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        echo "databse done";
    }
}
else echo '<html><meta http-equiv="refresh" content="0;url=http://localhost/FileVault/model/registerForm.php"/></html>';

function sql($sql)
{
    $conn = include "dbLogin.php";
    if (($result = $conn->query($sql)) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error ;
    }
    $conn->close();
    return $result;
}