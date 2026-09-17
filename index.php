<?php

require_once("router.php");
require_once("cars_model.php");
require_once("response.php");


app::get("/", "html/home");
app::get('/error/$message', "html/error");

app::get("/cars", "html/cars");
app::get("/cars/create", "html/createCar.php");
app::post("/cars/create", function(){
    $check = true;
    $message = "";
    foreach($_POST as $key => $input){
        if(empty(trim($input))) {
            $check = false;
            $message = $key . " is required";
            break;
        }
    }
    if(!$check) {
        res::redirect("/error/$message");
        return;
    }
    Cars::createCar($_POST);
    Res::redirect("/cars");
});

app::get('/deletecar/$id', function($id){
    Cars::deleteCar($id);
    Res::redirect("/cars");
});

app::get('/cars/search/$name', function($name){
    echo "CAR width name: $name";
});


