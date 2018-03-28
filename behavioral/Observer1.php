<?php

// interface SplSubject  {
//   public function attach (SplObserver $observer);
//   public function detach (SplObserver $observer);
//   public function notify ();
// }

// interface SplObserver  {
//   public function update (SplSubject $subject);
// }

class Feed implements SplSubject
{
  private $name;
  private $observers = array();
  private $content;

  public function __construct($name)
  {
    $this->name = $name;
  }

  public function attach(SplObserver $observer)
  {
    $observerHash = spl_object_hash($observer);
    $this->observers[$observerHash] = $observer;
  }

  public function detach(SplObserver $observer)
  {
    $observerHash = spl_object_hash($observer);
    unset($this->observers[$observerHash]);
  }

  public function breakOutNews($content)
  {
    $this->content = $content;
    $this->notify();
  }

  public function getContent()
  {
    return $this->content . " on ". $this->name . ".";
  }

  public function notify()
  {
    foreach ($this->observers as $value) {
      $value->update($this);
    }
  }
}

class Reader implements SplObserver
{
  private $name;

  public function __construct($name)
  {
    $this->name = $name;
  }

  public function update(SplSubject $subject)
  {
    echo $this->name . ' is reading the article ' . $subject->getContent() . ' ';
  }
}

$newspaper = new Feed('Junade.com');

$allen = new Reader('Mark');
$jim = new Reader('Lily');
$linda = new Reader('Caitlin');

//add reader
$newspaper->attach($allen);
$newspaper->attach($jim);
$newspaper->attach($linda);

//remove reader
$newspaper->detach($linda);

//set break outs
$newspaper->breakOutNews('PHP Design Patterns');

?>
