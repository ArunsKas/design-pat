<?php

interface AnimalFeeder
{
  public function __construct(string $petName);

  public function dropFood(int $hungerLevel, bool $water = false): string;

  public function displayFood(int $hungerLevel): string;
}

class Cat implements AnimalFeeder
{
  public function __construct(string $petName)
  {
    $this->petName = $petName;
  }

  public function dropFood(int $hungerLevel, bool $water = false): string
  {
    return $this->selectFood($hungerLevel) . ($water ? ' with water' : '');
  }

  public function displayFood(int $hungerLevel): string
  {
    return $this->selectFood($hungerLevel);
  }

  protected function selectFood(int $hungerLevel): string
  {
    switch ($hungerLevel) {
      case 0:
      return 'lamb';
      break;
      case 1:
      return 'chicken';
      break;
      case 3:
      return 'tuna';
      break;
    }
  }
}

class Dog
{

  public function __construct(string $petName)
  {
    if (strlen($petName) > 10) {
      throw new \Exception('Name too long.');
    }

    $this->petName = $petName;
  }

  public function dropFood(int $hungerLevel, bool $water = false): string
  {
    return $this->selectFood($hungerLevel) . ($water ? ' with water' : '');
  }

  public function displayFood(int $hungerLevel): string
  {
    return $this->selectFood($hungerLevel);
  }

  protected function selectFood(int $hungerLevel): string
  {
    if ($hungerLevel == 3) {
      return "chicken and vegetables";
    } elseif (date('H') < 10) {
      return "turkey and beef";
    } else {
      return "chicken and rice";
    }
  }
}

class AnimalFeederProxy
{
  protected $instance;

  public function __construct(string $feeder, string $name)
  {
    $class = $feeder;
    $this->instance = new $class($name);
  }

  public function __call($name, $arguments)
  {
    return call_user_func_array([$this->instance, $name], $arguments);
  }
}

$felix = new AnimalFeederProxy('Cat', 'Felix');
echo $felix->displayFood(1);
echo "</br>";
echo $felix->dropFood(1, true);
echo "</br>";

$brian = new AnimalFeederProxy('Dog', 'Brian');
echo $brian->displayFood(1);
echo "</br>";
echo $brian->dropFood(1, true);

?>
