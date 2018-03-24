<?php

class Car
{
  public $name;
  public function __construct($name)
  {
    $this->name = $name;
  }
}

// === A Flyweight ===
// That cache objects and re-use when possible
// And create new object only when necessary
class CarFlyweightFactory
{
  private $cars = [];
  public function make($name)
  {
    if (!isset($this->cars[$name])) {
      $this->cars[$name] = new Car($name);
    }
    return $this->cars[$name];
  }
}

$factory = new CarFlyweightFactory();
$fit = $factory->make("Fit");
echo $fit->name;
echo '</br>';
var_dump($fit);
echo '</br>';

// same object again
$fit1 = $factory->make("Fit");
echo $fit->name;
echo '</br>';
var_dump($fit);
echo '</br>';

// new object because name is new
$car1 = $factory->make("Another name");
echo $car1->name;
echo '</br>';
var_dump($car1);
echo '</br>';

// same object again
$fit1 = $factory->make("Fit");
echo $fit->name;
echo '</br>';
var_dump($fit);
echo '</br>';

?>
