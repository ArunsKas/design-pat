<?php

// Imagine you are using some drawing application, you choose the paint brush to
// draw. Now the brush changes its behavior based on the selected color i.e. if
// you have chosen red color it will draw in red, if blue then it will be in
// blue etc.

interface WritingState
{
  public function write(string $words);
}

class UpperCase implements WritingState
{
  public function write(string $words)
  {
    echo strtoupper($words);
    echo '</br>';
  }
}

class LowerCase implements WritingState
{
  public function write(string $words)
  {
    echo strtolower($words);
    echo '</br>';
  }
}

class DefaultText implements WritingState
{
  public function write(string $words)
  {
    echo $words;
    echo '</br>';
  }
}

class TextEditor
{
  protected $state;

  public function __construct(WritingState $state)
  {
    $this->state = $state;
  }

  public function setState(WritingState $state)
  {
    $this->state = $state;
  }

  public function type(string $words)
  {
    $this->state->write($words);
  }
}

$editor = new TextEditor(new DefaultText());

$editor->type('First line');

$editor->setState(new UpperCase());

$editor->type('Second line');
$editor->type('Third line');

$editor->setState(new LowerCase());

$editor->type('Fourth line');
$editor->type('Fifth line');

?>
