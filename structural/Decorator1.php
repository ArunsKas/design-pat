<?php

interface Book
{
  public function __construct(string $title, string $author, string $contents);

  public function getTitle(): string;

  public function getAuthor(): string;

  public function getContents(): string;
}

class EBook implements Book
{

  public $title;
  public $author;
  public $contents;

  public function __construct(string $title, string $author, string $contents)
  {
    $this->title = $title;
    $this->author = $author;
    $this->contents = $contents;
  }

  public function getTitle(): string
  {
    return $this->title;
  }

  public function getAuthor(): string
  {
    return $this->author;
  }

  public function getContents(): string
  {
    return $this->contents;
  }
}

class PrintBook implements Book
{

  public $eBook;

  public function __construct(string $title, string $author, string $contents)
  {
    $this->eBook = new EBook($title, $author, $contents);
  }

  public function getTitle(): string
  {
    return $this->eBook->getTitle();
  }

  public function getAuthor(): string
  {
    return $this->eBook->getAuthor();
  }

  public function getContents(): string
  {
    return $this->eBook->getContents();
  }

  public function getText(): string
  {
    $contents = $this->eBook->getTitle() . " by " . $this->eBook->getAuthor();
    $contents .= '</br>';
    $contents .= $this->eBook->getContents();

    return $contents;
  }
}

$PHPBook = new EBook("Mastering PHP Design Patterns", "Junade Ali", "Some contents.");

$PHPBook = new PrintBook("Mastering PHP Design Patterns", "Junade Ali", "Some contents.");
echo $PHPBook->getText();

?>
