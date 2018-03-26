<?php

interface Messenger
{
  public function send($body);
}

class InstantMessenger implements Messenger
{
  public function send($body)
  {
    echo "InstantMessenger: " . $body;
  }
}

class SMS implements Messenger
{
  public function send($body)
  {
    echo "SMS: " . $body;
  }
}

interface Transmitter
{
  public function setSender(Messenger $sender);

  public function send($body);
}

abstract class Device implements Transmitter
{
  protected $sender;

  public function setSender(Messenger $sender)
  {
    $this->sender = $sender;
  }
}

class Phone extends Device
{
  public function send($body)
  {
    $body .= "\n\n Sent from a phone.";

    return $this->sender->send($body);
  }
}

class Tablet extends Device
{
  public function send($body)
  {
    $body .= "\n\n Sent from a Tablet.";

    return $this->sender->send($body);
  }
}

$phone = new Phone();
$phone->setSender(new SMS());

$phone->send("Hello there!");



?>
