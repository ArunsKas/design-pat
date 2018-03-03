<?php

interface Door 
{
  public function getWidth(): float;
  public function getHeight(): float;
}

class WoodenDoor implements Door
{
  protected $width;
  protected $height;

  public function __construct(float $width, float $height)
  {
    $this->width = $width;
    $this->height = $height;
  }

  public function getWidth(): float
  {
    return $this->width;
  }

  public function getHeight(): float 
  {
    return $this->height;
  }

}

class DoorFactory
{
  public static function makeDoor($width, $height): Door
  {
    return new WoodenDoor($width, $height);
  }
}

//
// ** Simple Factory (sometimes called static factory)
//
// ** Rules
// 1. The factory class must have a static method, this is called a factory 
//    method. (class 'DoorFactory')
// 2. The factory method must return a class instance (called product class).
// 3. Only one object should be created and returned at a time.
//
// ** When to Use?
// 
// When creating an object is not just a few assignments and involves some 
// logic, it makes sense to put it in a dedicated factory instead of repeating 
// the same code everywhere.

$door = DoorFactory::makeDoor(100, 200);
echo 'Width: ' . $door->getWidth() . ', ';
echo 'Height: ' . $door->getHeight();

?>