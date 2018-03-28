<?php

class Observable implements \SplSubject
{
  private $_observers = array();

  public function notify()
  {
    foreach($this->_observers as $observer) {
      $observer->update($this);
    }
  }

  public function attach(\SplObserver $observer)
  {
    $this->_observers[] = $observer;
    return $this;
  }

  public function detach(\SplObserver $observer)
  {
    foreach($this->_observers as $i => $iteratedObserver) {
      if($observer === $iteratedObserver) {
        unset($this->_observers[$i]);
        break;
      }
    }

    return $this;
  }
}
class Observer implements \SplObserver
{
  private $_name;

  public function __construct($name)
  {
    $this->_name = $name;
  }

  public function update(\SplSubject $subject)
  {
    echo 'Observer ' . $this->_name . ' called' . '</br>';
  }
}
$observable = new Observable;
$observer1 = new Observer('A');
$observable->attach($observer1);
$observer2 = new Observer('B');
$observable->attach($observer2);
$observable->notify();

?>
