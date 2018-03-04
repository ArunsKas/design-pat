<?php

interface ToyFactory {
  function makeMaze();
  function makePuzzle();
}

class SFToyFactory implements ToyFactory
{
  private $location = "San Francisco";

  public function makeMaze()
  {
    return new SFMazeToy();
  }

  public function makePuzzle()
  {
    return new SFPuzzleToy();
  }
}

class UKToyFactory implements ToyFactory
{
  private $location = "United Kingdom";

  public function makeMaze()
  {
    return new UKMazeToy();
  }

  public function makePuzzle()
  {
    return new UKPuzzleToy();
  }
}

abstract class Toy
{
  abstract public function getSize(): int;
  abstract public function getPictureName(): string;
}

abstract class MazeToy extends Toy
{
  private $type = "Maze";
}

abstract class PuzzleToy extends Toy
{
  private $type = "Puzzle";
}

class SFMazeToy extends MazeToy
{
  private $size;
  private $pictureName;

  public function __construct()
  {
    $this->size = 9;
    $this->pictureName = "San Francisco Maze";
  }

  public function getSize(): int
  {
    return $this->size;
  }

  public function getPictureName(): string
  {
    return $this->pictureName;
  }
}

class SFPuzzleToy extends PuzzleToy
{
  private $size;
  private $pictureName;

  public function __construct()
  {
    $rand = rand(1, 3);

    switch ($rand) {
      case 1:
        $this->size = 3;
        break;
      case 2:
        $this->size = 6;
        break;
      case 3:
        $this->size = 9;
        break;
    }

    $this->pictureName = "San Francisco Puzzle";
  }

  public function getSize(): int
  {
    return $this->size;
  }

  public function getPictureName(): string
  {
    return $this->pictureName;
  }
}

class UKMazeToy extends Toy
{
  private $size;
  private $pictureName;

  public function __construct()
  {
    $this->size = 9;
    $this->pictureName = "London Maze";
  }

  public function getSize(): int
  {
    return $this->size;
  }

  public function getPictureName(): string
  {
    return $this->pictureName;
  }
}

class UKPuzzleToy extends PuzzleToy
{
  private $size;
  private $pictureName;

  public function __construct()
  {
    $rand = rand(1, 2);

    switch ($rand) {
      case 1:
        $this->size = 3;
        break;
      case 2:
        $this->size = 9;
        break;
    }

    $this->pictureName = "London Puzzle";
  }

  public function getSize(): int
  {
    return $this->size;
  }

  public function getPictureName(): string
  {
    return $this->pictureName;
  }
}

$sanFraciscoFactory = new SFToyFactory();
var_dump($sanFraciscoFactory->makeMaze());
echo '</br>';
var_dump($sanFraciscoFactory->makePuzzle());
echo '</br>';
echo '</br>';

$britishToyFactory = new UKToyFactory();
var_dump($britishToyFactory->makeMaze());
echo '</br>';
var_dump($britishToyFactory->makePuzzle());
echo '</br>';

?>