<?php

/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 23.7.2016.
 * Time: 20:42
 */
class User
{
    public function login($user,$pass){
        $conn = include("dbLogin.php");

        //$pass = md5(md5($pass));
        $pass = md5(md5($pass));
        $sql = "SELECT * FROM user WHERE pass='$pass' AND username='$user'";
        $result = $conn->query($sql);
        if($result->rowCount()==1 )
        {
            $rs = $result->fetch();
            if(session_status()!=2)session_start();
            $_SESSION['user']=$user;
            $_SESSION['user_id']=$rs['id'];
        }

        //echo $output;
    }
    public function logout(){
        if(session_status()!=2)session_start();
        session_unset();
        session_destroy();
    }
    public function register($user,$email,$pwd,$pwd2){
        if(session_status()!=2)session_start();
        //$conn = include "dbLogin.php";
        //$mailis = sql("SELECT COUNT(email) FROM user WHERE email='$email'");
        //$usernameis = sql("SELECT COUNT(username) FROM user WHERE username='$username'");
        //$conn->close();

        if ($pwd != $pwd) {
            return '<html><meta http-equiv="refresh" content="0;url='.URL.'model/registerForm.php?reg=passwords dont match"/></html>';
            /*}else if ($mailis->num_rows > 0) {echo "one";
                return '<html><meta http-equiv="refresh" content="0;url='.URL.'model/registerForm.php?reg=email taken"/></html>';
            }else if($usernameis->num_rows > 0){echo "two";
                return '<html><meta http-equiv="refresh" content="0;url='.URL.'model/registerForm.php?reg=username taken"/></html>';*/
        }
        else {
            $conn= include "dbLogin.php";
            $sql = "INSERT INTO user (username, email, pass, active) VALUES (:user,:email, :password,'false')";
            $statement = $conn->prepare($sql);
            $statement->bindParam(':user',$user);
            $statement->bindParam(':email',$email);
            $statement->bindParam(':password',md5(md5($pwd)));
            $statement->execute();

        }

    }
}