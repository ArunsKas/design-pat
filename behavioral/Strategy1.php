<?php

interface Power
{
  public function raise(int $number): int;
}

class Square implements Power
{
  public function raise(int $number): int
  {
    return pow($number, 2);
  }
}

class Cube implements Power
{
  public function raise(int $number): int
  {
    return pow($number, 3);
  }
}

class RaiseNumber
{
  public function __construct(Power $strategy)
  {
    $this->strategy = $strategy;
  }

  public function raise(int $number)
  {
    return $this->strategy->raise($number);
  }
}

// load number from query -- ex. /Strategy1.php?n=3
if (isset($_GET['n'])) {
  $number = $_GET['n'];
} else {
  $number = 0;
}

if ($number < 5) {
  $power = new Cube();
} else {
  $power = new Square();
}

$processor = new RaiseNumber($power);

var_dump($processor->raise($number));

?>
