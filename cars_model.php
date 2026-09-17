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
}
