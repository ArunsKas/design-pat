<?php

interface Observer
{
  public function newValue($value);
}

abstract class Observable
{
  private $observers = array();
    /**
     * Add an Observer to the $observers Array
     */
    final public function addObserver($observer){
      (!in_array($observer,$this->observers))?array_push($this->observers,$observer):void;
    }
    /**
     * Remove an Observer from the $observers Array
     */
    final public function removeObserver($observer){
      unset($this->observers[array_search($observer, $this->observers)]);
    }
    /**
     * Notify all Observers about a new Value
     */
    final protected function notifyObserver($value){
      foreach($this->observers as $observer) {
        $observer->newValue($value);
      }
    }
  }

  class FuelDisplay implements Observer {
    /**
     * Handling a new Value
     */
    public function newValue($value)
    {
      echo 'Your tank is filled to ' . $value . '%'."</br></br>";
    }
  }

  class FuelSensor extends Observable {
    private $fuelLevel;
    /**
     * Set the new Fuel Level
     */
    public function setFuelLevel($fuelLevel){
      $this->fuelLevel = $fuelLevel;
      self::notifyObserver($fuelLevel);
    }
  }

  class FuelTankWarning implements Observer{
    const isFull = 100;
    const warnLevel = 5;
    /**
     * Handling a new Value
     */
    public function newValue($value) {
      if ($value <= self::warnLevel) {
        self::activateLED();
      } elseif ($value > self::warnLevel && $value <= self::isFull) {
        self::deactivateLED();
      } else {
        throw new \Exception('The tank can only be filled up to 100%');
      }
    }
    /**
     * Activating the Fuel Gauge LED
     */
    private function activateLED() {
      echo 'LED: on'."</br>";
    }
    /**
     * Deactivating the Fuel Gauge LED
     */
    private function deactivateLED() {
      echo 'LED: off'."</br>";
    }
  }

// Object creation/generation
  $fuelTankWarning = new FuelTankWarning();
  $fuelDisplay = new FuelDisplay();
  $fuelSensor = new FuelSensor();
// Our FuelSensor extends Observeable and handles the Observers
  $fuelSensor->addObserver($fuelTankWarning);
  $fuelSensor->addObserver($fuelDisplay);
// The Observers are triggered by a value change
  $fuelSensor->setFuelLevel(80);
  $fuelSensor->setFuelLevel(10);
  $fuelSensor->setFuelLevel(5);
  $fuelSensor->setFuelLevel(1);
  $fuelSensor->setFuelLevel(100);
// uncommend to throw Exception
// $fuelSensor->setFuelLevel(101);
// Removing Observer when they are not needed anymore
  $fuelSensor->removeObserver($fuelTankWarning);
  $fuelSensor->removeObserver($fuelDisplay);

  ?>
