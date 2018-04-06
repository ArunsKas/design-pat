<?php

// A generic example would be you ordering food at a restaurant. You (i.e.
// Client) ask the waiter // (i.e. Invoker) to bring some food (i.e. Command)
// and waiter simply forwards the request to Chef (i.e. Receiver) who has the
// knowledge of what and how to cook. Another example would be you (i.e. Client)
// switching on (i.e. Command) the television (i.e. Receiver) using a remote
// control (Invoker).

// Allows you to encapsulate actions in objects. The key idea behind this
// pattern is to provide the means to decouple client from receiver.

// Receiver
class Bulb
{
  public function turnOn()
  {
    echo "Bulb has been lit";
  }

  public function turnOff()
  {
    echo "Darkness!";
  }
}

interface Command
{
  public function execute();
  public function undo();
  public function redo();
}

// Command
class TurnOn implements Command
{
  protected $bulb;

  public function __construct(Bulb $bulb)
  {
    $this->bulb = $bulb;
  }

  public function execute()
  {
    $this->bulb->turnOn();
  }

  public function undo()
  {
    $this->bulb->turnOff();
  }

  public function redo()
  {
    $this->execute();
  }
}

class TurnOff implements Command
{
  protected $bulb;

  public function __construct(Bulb $bulb)
  {
    $this->bulb = $bulb;
  }

  public function execute()
  {
    $this->bulb->turnOff();
  }

  public function undo()
  {
    $this->bulb->turnOn();
  }

  public function redo()
  {
    $this->execute();
  }
}

// Invoker
class RemoteControl
{
  public function submit(Command $command)
  {
    $command->execute();
  }
}

$bulb = new Bulb();

$turnOn = new TurnOn($bulb);
$turnOff = new TurnOff($bulb);

$remote = new RemoteControl();
$remote->submit($turnOn); // Bulb has been lit!
$remote->submit($turnOff); // Darkness!

?>
