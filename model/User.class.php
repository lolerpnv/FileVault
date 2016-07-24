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
        $sql = "SELECT * FROM user WHERE pass=? AND username=?";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(Array($pass,$user));
        if($stmt->rowCount()==1 )
        {
            $rs = $stmt->fetch(PDO::FETCH_ASSOC);
            print_r($rs);
            if(session_status()!=2)session_start();
            $_SESSION['user']=$user;
            $_SESSION['user_id']=   $rs['id'];
            return 1;
        }
        else return 0;
    }
    public function logout(){
        if(session_status()!=2)session_start();
        session_unset();
        session_destroy();
    }
    public function register($user,$email,$pwd,$pwd2){
        if(session_status()!=2)session_start();
        $conn= include "dbLogin.php";
        //EMAIL
        $Estmt = $conn->prepare("SELECT * FROM user WHERE email=:email ");
        $Estmt->bindParam(':email',$email);
        $Estmt->execute();
        //USERNAME
        $Ustmt = $conn->prepare("SELECT * FROM user WHERE username=:user ");
        $Ustmt->bindParam(':user',$user);
        $Ustmt->execute();

        if ($pwd != $pwd2) {
            return "passwords do not match";
        }else if($Ustmt->rowCount() != 0){
            return "username already in use.";
        }else if($Estmt->rowCount() != 0){
            return "email already in use.";
        }

        else {
            $sql = "INSERT INTO user (username, email, pass, active) VALUES (:user,:email, :password,'false')";
            $statement = $conn->prepare($sql);
            $statement->bindParam(':user',$user);
            $statement->bindParam(':email',$email);
            $statement->bindParam(':password',md5(md5($pwd)));
            $statement->execute();
            return 1;
        }

    }
}