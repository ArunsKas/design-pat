<?php

interface Lion
{
  public function roar();
}

class AfricanLion implements Lion
{
  public function roar()
  {
  }
}

class AsianLion implements Lion
{
  public function roar()
  {
  }
}

class Hunter
{
  public function hunt(Lion $lion)
  {
  }
}

class WildDog
{
  public function bark()
  {
  }
}

// Adapter around wild dog to make it compatible with our game
class WildDogAdapter implements Lion
{
  protected $dog;

  public function __construct(WildDog $dog)
  {
    $this->dog = $dog;
  }

  public function roar()
  {
    $this->dog->bark();
  }
}

// And now the WildDog can be used in our game using WildDogAdapter
$wildDog = new WildDog();
$wildDogAdapter = new WildDogAdapter($wildDog);

$hunter = new Hunter();
$hunter->hunt($wildDogAdapter);


?>
