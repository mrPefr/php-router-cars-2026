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
        array_push($cars, $data);
        self::saveCars($cars);

    }

    public static function updateCar($data){
        $cars = self::getCars();
        if(empty($data['id'])) return "no_id";

        $id = $data['id'];
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
