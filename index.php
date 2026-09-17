<?php

require_once("router.php");
require_once("cars_model.php");
require_once("response.php");

app::get("/", function(){
    echo "INDEX";
});

app::get("/cars", "html/cars");

app::get('/deletecar/$id', function($id){
    Cars::deleteCar($id);
    Res::redirect("/cars");
});

app::get('/cars/search/$name', function($name){
    echo "CAR width name: $name";
});


