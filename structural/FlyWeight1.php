<?php

interface Shape
{
  public function draw();
}

class Circle implements Shape
{

  private $colour;
  private $x;
  private $y;
  private $radius;

  public function __construct(string $colour)
  {
    $this->colour = $colour;
  }

  public function setX(int $x)
  {
    $this->x = $x;
  }

  public function setY(int $y)
  {
    $this->y = $y;
  }

  public function setRadius(int $radius)
  {
    $this->radius = $radius;
  }

  public function draw()
  {
    echo "Drawing circle which is " . $this->colour . " at [" . $this->x . ", " . $this->y . "] of radius " . $this->radius . ".";
    echo "\n";
  }
}

class ShapeFactory
{
  private $shapeMap = array();

  public function getCircle(string $colour)
  {
    $circle = 'Circle' . '_' . $colour;

    if (!isset($this->shapeMap[$circle])) {
      echo "Creating a ".$colour." circle.";
      echo "\n";
      $this->shapeMap[$circle] = new Circle($colour);
    }

    return $this->shapeMap[$circle];
  }
}

$colours = array('red', 'blue', 'green', 'black', 'white', 'orange');

$factory = new ShapeFactory();

for ($i = 0; $i < 100; $i++) {
  $randomColour = $colours[array_rand($colours)];

  $circle = $factory->getCircle($randomColour);
  $circle->setX(rand(0, 100));
  $circle->setY(rand(0, 100));
  $circle->setRadius(100);

  $circle->draw();
  echo '</br>';
}

?>
