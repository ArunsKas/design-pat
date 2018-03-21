<?php

// from
// https://phpenthusiast.com/blog/the-decorator-design-pattern-in-php-explained

interface Car {
  function cost();
  function description();
}

class Suv implements Car {
  function cost()
  {
    return 30000;
  }

  function description ()
  {
    return "Suv";
  }
}

// The decorator pattern thus has the following structure:
// * A decorator which is an abstract class that implements the interface.
// * Sub-classes that inherit the decorator class.

abstract class CarFeature implements Car {
  protected $car;

  function __construct(Car $car)
  {
    $this->car = $car;
  }

  abstract function cost();

  abstract function description();
}

class SunRoof extends CarFeature {
  function cost ()
  {
    return $this->car->cost() + 1500;
  }

  function description()
  {
    return $this->car->description() . ",  sunroof";
  }
}

class HighEndWheels extends CarFeature {
  function cost ()
  {
    return $this->car->cost() + 2000;
  }

  function description()
  {
    return $this->car->description() . ",  high end wheels";
  }
}

// Create an object from one of the basic classes.
$basicCar = new Suv();

// Pass the object from the basic class as a parameter to the first feature class.
$carWithSunRoof = new SunRoof($basicCar);

// Run the methods on the last object that was created.
echo $carWithSunRoof->description();
echo " costs ";
echo $carWithSunRoof->cost();

echo '</br>';

$carWithSunRoofAndHighEndWheels = new HighEndWheels($carWithSunRoof);
// Run the methods on the last object that was created.
echo $carWithSunRoofAndHighEndWheels->description();
echo " costs ";
echo $carWithSunRoofAndHighEndWheels->cost();

?>
