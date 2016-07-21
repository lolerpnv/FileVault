<?php
/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 18.7.2016.
 * Time: 22:17
 */
if(session_status()!=2)session_start();

if(isset($_GET['reg']) and $_GET['reg'] == 'register')
{


    $username = $_POST['usr'];
    $password = $_POST['pwd'];
    $email = $_POST['email'];

    $conn = include_once "dbLogin.php";
    $sql = "INSERT INTO MyGuests (username, email, pass, active) VALUES ($username, $email, $password,false)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
else echo include_once ("registerForm.php");
