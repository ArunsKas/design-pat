<?php

interface RoomInterface
{
  public function getContents();
}

class Bedroom implements RoomInterface
{
  public function getContents()
  {
    return "So you have a bedroom.\n";
  }
}

class Bathroom implements RoomInterface
{
  public function getContents()
  {
    return "So you have a bathroom.\n";
  }
}

abstract class RoomDecoratorAbstract implements RoomInterface
{
  protected $room;
  private   $contentText;

  public function __construct(RoomInterface $room)
  {
    $this->room = $room;
  }

  protected abstract function styleContentText($text);
}

abstract class BathroomDecoratorAbstract extends RoomDecoratorAbstract
{
  protected function styleContentText($text)
  {
    return " # " . $text . "\n";
  }
}

abstract class BedroomDecoratorAbstract extends RoomDecoratorAbstract
{
  protected function styleContentText($text)
  {
    return " # " . $text . "\n";
  }
}

class BedroomPosterDecorator extends BedroomDecoratorAbstract
{
  private $contentText = "There is a mudder fudging poster in it.";

  public function getContents()
  {
    return $this->room->getContents() . $this->styleContentText($this->contentText);
  }
}

class BedroomLampDecorator extends BedroomDecoratorAbstract
{
  private $contentText = "One does not simply have a lamp, without it containing artificial lava.";

  public function getContents()
  {
    return $this->room->getContents() . $this->styleContentText($this->contentText);
  }
}

class BedroomBedDecorator extends BedroomDecoratorAbstract
{
  private $contentText = "You have a bed with a 40,000 spring mattress, 1,000 tog duvet and pillows made of bacon.";

  public function getContents()
  {
    return $this->room->getContents() . $this->styleContentText($this->contentText);
  }
}

class BathroomBogDecorator extends BathroomDecoratorAbstract
{
  private $contentText = "There is a bog to do the business.";

  public function getContents()
  {
    return $this->room->getContents() . $this->styleContentText($this->contentText);
  }
}

class BathroomShowerDecorator extends BathroomDecoratorAbstract
{
  private $contentText = "Look!! A brand new Aqualisa Quartz digital shower. Oooooooo.";

  public function getContents()
  {
    return $this->room->getContents() . $this->styleContentText($this->contentText);
  }
}

class BathroomBasinDecorator extends BathroomDecoratorAbstract
{
  private $contentText = "Diamond taps and it even comes with a plug. Bang for your buck";

  public function getContents()
  {
    return $this->room->getContents() . $this->styleContentText($this->contentText);
  }
}

$bedroom         = new Bedroom();
$posterDecorator = new BedroomPosterDecorator($bedroom);
$lampDecorator   = new BedroomLampDecorator($posterDecorator);
$bedDecorator    = new BedroomBedDecorator($lampDecorator);

// So you have a bedroom.
echo $bedroom->getContents();
echo '</br>';
echo $posterDecorator->getContents();
echo '</br>';
echo $lampDecorator->getContents();
echo '</br>';
echo $bedDecorator->getContents();
echo '</br>';

$bathroom        = new Bathroom();
$bogDecorator    = new BathroomBogDecorator($bathroom);
$showerDecorator = new BathroomShowerDecorator($bogDecorator);
$basinDecorator  = new BathroomBasinDecorator($showerDecorator);

// So you have a bathroom.
echo $bathroom->getContents();
echo '</br>';

// So you have a bathroom.
// # There is a bog to do the business.
echo $bogDecorator->getContents();
echo '</br>';

// So you have a bathroom.
// # There is a bog to do the business.
// # Look!! A brand new Aqualisa Quartz digital shower. Oooooooo.
echo $showerDecorator->getContents();
echo '</br>';

// So you have a bathroom.
// # There is a bog to do the business.
// # Look!! A brand new Aqualisa Quartz digital shower. Oooooooo.
// # Diamond taps and it even comes with a plug. Bang for your buck
echo $basinDecorator->getContents();
echo '</br>';

?>
