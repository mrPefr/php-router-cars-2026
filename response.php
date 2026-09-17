<?php

class Res{


    public static function redirect(string $path){
        header("Location:$path");
    }


}