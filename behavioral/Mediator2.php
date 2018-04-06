<?php

// A general example would be when you talk to someone on your mobile phone,
// there is a network provider sitting between you and them and your
// conversation goes through it instead of being directly sent. In this case
// network provider is mediator.

interface ChatRoomMediator
{
  public function showMessage(User $user, string $message);
}

// Mediator
class ChatRoom implements ChatRoomMediator
{
  public function showMessage(User $user, string $message)
  {
    $time = date('M d, y H:i');
    $sender = $user->getName();

    echo $time . '[' . $sender . ']:' . $message;
    echo '</br>';
  }
}

class User {
  protected $name;
  protected $chatMediator;

  public function __construct(string $name, ChatRoomMediator $chatMediator) {
    $this->name = $name;
    $this->chatMediator = $chatMediator;
  }

  public function getName() {
    return $this->name;
  }

  public function send($message) {
    $this->chatMediator->showMessage($this, $message);
  }
}

$mediator = new ChatRoom();

$john = new User('John Doe', $mediator);
$jane = new User('Jane Doe', $mediator);

$john->send('Hi there!');
$jane->send('Hey!');

// Output will be
// Feb 14, 10:58 [John]: Hi there!
// Feb 14, 10:58 [Jane]: Hey!

?>
