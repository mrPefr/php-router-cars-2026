<?php

require_once("router.php");

app::get("/", function(){
    echo "INDEX";
});

app::get("/cars", "html/cars");

app::get('/cars/$id', 'html/cars');

app::get('/cars/search/$name', function($name){
    echo "CAR width name: $name";
});


