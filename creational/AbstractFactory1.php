<?php
  interface Door
  {
  	public function getDescription();
  }

  class WoodenDoor implements Door
  {
  	public function getDescription()
  	{
  		echo 'I am a wooden door';
  		echo '</br>';
  	}
  }

  class IronDoor implements Door
  {
  	public function getDescription()
  	{
  		echo 'I am an iron door';
  		echo '</br>';
  	}
  }

  interface DoorFittingExpert
  {
  	public function getDescription();
  }

  class Welder implements DoorFittingExpert
  {
  	public function getDescription()
  	{
  		echo 'I can only fit iron doors';
  		echo '</br>';
  	}
  }

  class Carpenter implements DoorFittingExpert
  {
  	public function getDescription()
  	{
  		echo 'I can only fit wooden doors';
  		echo '</br>';
  	}
  }

  interface DoorFactory
  {
  	public function makeDoor(): Door;
  	public function makeFittingExpert(): DoorFittingExpert;
  }

  class WoodenDoorFactory implements DoorFactory
  {
  	public function makeDoor(): Door
  	{
  		return new WoodenDoor();
  	}

  	public function makeFittingExpert(): DoorFittingExpert
  	{
  		return new Carpenter();
  	}
  }

  class IronDoorFactory implements DoorFactory
  {
  	public function makeDoor(): Door
  	{
  		return new IronDoor();
  	}

  	public function makeFittingExpert(): DoorFittingExpert
  	{
  		return new Welder();
  	}
  }

  $woodenFactory = new WoodenDoorFactory();

  $door = $woodenFactory->makeDoor();
  $expert = $woodenFactory->makeFittingExpert();

  $door->getDescription();
  $expert->getDescription();

?>