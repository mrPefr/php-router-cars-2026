<?php
require_once("users_model.php");

class Auth{


    public static function register($user){

        $users = Users::getUsers();

        if(isset($users[$user['email']])) return "User Exists";

        $user['id'] = uniqid(true);
        $user["password"] = password_hash($user["password"], PASSWORD_DEFAULT,["cost"=>12]);
        
        // Lägg till i users
        $users[$user['email']] = $user;

        Users::saveUsers($users);


        /* Vad ska denna funktion egentligen göra?
        Ta emot ny user
        Kolla om denna redan finns
        Lägga till id
        hasha lösenord
        ev spara ner användaren
        */


    }
    public static function login(){}
    public static function logout(){}



}