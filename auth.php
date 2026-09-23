<?php
require_once("users_model.php");

class Auth{


    public static function register($user){

        $users = Users::getUsers();

        if(isset($users[$user['email']])) return ["error"=>"User Exists"];

        $user['id'] = uniqid(true);
        $user["password"] = password_hash($user["password"], PASSWORD_DEFAULT,["cost"=>12]);
        
        // Lägg till i users
        $users[$user['email']] = $user;

        Users::saveUsers($users);
        return ["success"=>true];

    }
    public static function login($user){

        $users = Users::getUsers();

        if(empty($users[$user['email']])){
            throw new Exception("Bad Credentials");
        }

        $dbUser = $users[$user['email']];

        if(!password_verify($user['password'], $dbUser['password']))
            throw new Exception("Bad Credentials pw");

        // Fixa session
        $_SESSION["userId"] = $dbUser['id'];
        $_SESSION["email"] = $dbUser['email'];
        $_SESSION["role"] = $dbUser['role'];

        return "Login Succes";



    }
    public static function logout(){}

    public static function checkAuth(){

        if(!empty($_SESSION['userId'])){
            return true;
        }

        return false;

    }



}