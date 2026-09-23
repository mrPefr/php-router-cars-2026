<?php
session_set_cookie_params([
    'httponly' => true
]);
/* ini_set("session.cookie_httponly",1); */
session_start();

require_once("router.php");
require_once("cars_model.php");
require_once("response.php");
require_once("auth.php");

app::get("/session", function(){

    var_dump($_SESSION);

});



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


app::post("/cars/update", function(){

    Cars::updateCar($_POST);
    Res::redirect("/cars");

});

app::get('/deletecar/$id', function($id){
    Cars::deleteCar($id);
    Res::redirect("/cars");
});

app::get('/cars/search/$name', function($name){
    echo "CAR width name: $name";
});



// auth-routes

app::get("/register", "html/register");
app::post("/register", function(){

$email = $_POST['email'] ?? "";
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    Res::redirect("/error/email error");
    return;
}
$password = $_POST['password'] ?? "";
if(strlen($password)<8){
    Res::redirect("/error/Password must be at least 8 char long");
    return;
}
$user = [
    "role"=>"user",
    "email"=>$email,
    "password"=>$password
];

$regReturn = Auth::register($user);
if(isset($regReturn['error'])){
  return  Res::redirect("/login?error=".$regReturn['error']);
}

Res::redirect("/login");

});


app::post("/login", function(){

   try{
    $loginReturn = Auth::login($_POST);
    Res::redirect("/session");
   } 
   catch(Exception $e){
    Res::redirect("/login?error=".$e->getMessage());
   }

});

app::get("/login", "html/login" );