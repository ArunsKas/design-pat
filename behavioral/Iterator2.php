<?php

class RadioStation
{
  protected $frequency;

  public function __construct(float $frequency)
  {
    $this->frequency = $frequency;
  }

  public function getFrequency(): float
  {
    return $this->frequency;
  }
}

class StationList implements Countable, Iterator
{
  /** @var RadioStation[] $stations */
  protected $stations = [];

  /** @var int $counter */
  protected $counter;

  public function addStation(RadioStation $station)
  {
    $this->stations[] = $station;
  }

  public function removeStation(RadioStation $toRemove)
  {
    $toRemoveFrequency = $toRemove->getFrequency();
    $this->stations = array_filter($this->stations, function (RadioStation $station) use ($toRemoveFrequency) {
      return $station->getFrequency() !== $toRemoveFrequency;
    });
    // there is need to recreate array as zero based
    $this->stations = array_values($this->stations);
  }

  public function count(): int
  {
    return count($this->stations);
  }

  public function current(): RadioStation
  {
    return $this->stations[$this->counter];
  }

  public function key()
  {
    return $this->counter;
  }

  public function next()
  {
    $this->counter++;
  }

  public function rewind()
  {
    $this->counter = 0;
  }

  public function valid(): bool
  {
    return isset($this->stations[$this->counter]);
  }
}

$stationList = new StationList();

$stationList->addStation(new RadioStation(89));
$stationList->addStation(new RadioStation(101));
$stationList->addStation(new RadioStation(102));
$stationList->addStation(new RadioStation(103.2));

foreach($stationList as $station) {
  echo $station->getFrequency() . '</br>';
}

$stationList->removeStation(new RadioStation(89)); // Will remove station 89

foreach($stationList as $station) {
  echo $station->getFrequency() . '</br>';
}

?>
