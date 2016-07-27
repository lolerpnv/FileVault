<?php

/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 23.7.2016.
 * Time: 20:42
 */
class User
{
    function __construct(){}

    public function login($user,$pass){

        $pass = md5(md5($pass));
        $db = DataBase::getInstance();
        $result = $db->query("SELECT * FROM user WHERE pass=? AND username=?",Array($pass,$user));
        if(sizeof($result) == 1 )
        {
            if(session_status() != 2)session_start();
            $_SESSION['user'] = $user;
            $_SESSION['user_id'] =   $result[0]['id'];
            return 1;
        }
        else return 0;
    }
    public function logout(){
        session_unset();
        session_destroy();
    }
    public function register($user,$email,$pwd,$pwd2){
        $db = DataBase::getInstance();
        $emails = $db->query("SELECT * FROM user WHERE email=? ",Array($email));
        $users = $db->query("SELECT * FROM user WHERE username=:user ",Array($user));

        if ($pwd != $pwd2) {
            return "passwords do not match";
        }else if(sizeof($users) != 0){
            return "username already in use.";
        }else if(sizeof($emails)!= 0){
            return "email already in use.";
        }else {
            $db->query("INSERT INTO user (username, email, pass, active) VALUES (?,?,?,?)",Array($user,$email,md5(md5($pwd)),false));
            return 1;
        }
    }
}