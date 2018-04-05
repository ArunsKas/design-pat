<?php

interface Purchaser
{
  public function setNextPurchaser(Purchaser $nextPurchaser): bool;

  public function buy($price): bool;
}

class AssociatePurchaser implements Purchaser
{
  public function setNextPurchaser(Purchaser $nextPurchaser): bool
  {
    $this->nextPurchaser = $nextPurchaser;
    return true;
  }

  public function buy($price): bool
  {
    if ($price < 100) {
      var_dump("Associate purchased");
      return true;
    } else {
      if (isset($this->nextPurchaser)) {
        return $this->nextPurchaser->buy($price);
      } else {
        var_dump("Could not buy");
        return false;
      }
    }
  }
}

class ManagerPurchaser implements Purchaser
{
  public function setNextPurchaser(Purchaser $nextPurchaser): bool
  {
    $this->nextPurchaser = $nextPurchaser;
    return true;
  }

  public function buy($price): bool
  {
    if ($price < 500) {
      var_dump("Associate purchased");
      return true;
    } else {
      if (isset($this->nextPurchaser)) {
        return $this->nextPurchaser->buy($price);
      } else {
        var_dump("Could not buy");
        return false;
      }
    }
  }
}

class DirectorPurchaser implements Purchaser
{
  public function setNextPurchaser(Purchaser $nextPurchaser): bool
  {
    $this->nextPurchaser = $nextPurchaser;
    return true;
  }

  public function buy($price): bool
  {
    if ($price < 10000) {
      var_dump("Director purchased");
      return true;
    } else {
      if (isset($this->nextPurchaser)) {
        return $this->nextPurchaser->buy($price);
      } else {
        var_dump("Could not buy");
        return false;
      }
    }
  }
}

class BoardPurchaser implements Purchaser
{
  public function setNextPurchaser(Purchaser $nextPurchaser): bool
  {
    $this->nextPurchaser = $nextPurchaser;
    return true;
  }

  public function buy($price): bool
  {
    if ($price < 100000) {
      var_dump("Board purchased");
      return true;
    } else {
      if (isset($this->nextPurchaser)) {
        return $this->nextPurchaser->buy($price);
      } else {
        var_dump("Could not buy");
        return false;
      }
    }
  }
}

$associate = new AssociatePurchaser();
$manager = new ManagerPurchaser();
$director = new DirectorPurchaser();
$board = new BoardPurchaser();

$associate->setNextPurchaser($manager);
$manager->setNextPurchaser($director);
$director->setNextPurchaser($board);

$associate->buy(11000);

?>
