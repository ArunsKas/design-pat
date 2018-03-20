<?php

class Car
{
    public $color = "White";
    public $doors = 4;
 
    public function __clone()
    {
        echo "Cloning Car...\n";
    }
}

$car = new Car();

print_r($car);

// Creating new object by cloning
$car2 = clone $car;
$car2->color = 'Black';
$car2->doors = 2;

print_r($car2);

?>