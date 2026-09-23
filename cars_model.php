<?php


class Cars
{


    public static function getCars()
    {
        if (file_exists('cars.json'))
            return json_decode(file_get_contents("cars.json"), true);

        return [];
    }

    public static function saveCars(array $cars)
    {
        file_put_contents("cars.json", json_encode($cars, JSON_PRETTY_PRINT));
    }

    public static function deleteCar($id)
    {
        $cars = self::getCars();


        $delCar = array_find($cars, function($c) use($id){
            return $c['id'] == $id;
        });


        if(($_SESSION['userId'] != $delCar['userId']) && $_SESSION["role"]!= "admin")
            throw new Exception("not your car"); 
 

        // Manuell filtrering
        $filteredCars = [];

        foreach ($cars as $car) {
            if ($car['id'] != $id) array_push($filteredCars, $car);
        }
        self::saveCars($filteredCars);
    }

    public static function createCar($data){
        $cars = self::getCars();
        $data['id'] = uniqid(true);
        $data['userId'] = $_SESSION['userId'];
        array_push($cars, $data);
        self::saveCars($cars);

    }

    public static function updateCar($data){
        $cars = self::getCars();
        if(empty($data['id'])) return "no_id";

        $id = $data['id'];

        $delCar = array_find($cars, function($c) use($id){
            return $c['id'] == $id;
        });
        if(($_SESSION['userId'] != $delCar['userId']) && $_SESSION["role"]!= "admin")
            throw new Exception("not your car"); 



        $index = -1;
        foreach($cars as $key=>$car){
            if($car['id'] == $id) $index = $key;
            break;
        }

        if($index>-1){
            $cars[$index]['brand'] = !empty(trim($data['brand'])) ? $data['brand'] : $cars[$index]['brand'];
            $cars[$index]['model'] = !empty(trim($data['model'])) ? $data['model'] : $cars[$index]['model'];
            $cars[$index]['price'] = !empty(trim($data['price'])) ? $data['price'] : $cars[$index]['price'];
          
            self::saveCars($cars);
        }

     
      


    }


}
