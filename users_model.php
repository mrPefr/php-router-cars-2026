<?php


class Users
{
    public static function getUsers()
    {
        $users = json_decode(file_get_contents("users.json"), true);
        return $users;
    }
    public static function saveUsers($users){
        file_put_contents("users.json", json_encode($users, JSON_PRETTY_PRINT));
    }
}
