<?php

// The abstract parent class.
abstract class Book {
  protected $title;
  protected $content;

  function setTitle($str)
  {
    $this->title = $str;
  }

  function setContent($str)
  {
    $this->content = $str;
  }
}

class Paperback extends Book {

  function printBook()
  {
    var_dump("The book '{$this->title}' was printed.");
  }
}

class Ebook extends Book {

  function generatePdf()
  {
    var_dump("A PDF was generated for the eBook '{$this->title}'.");
  }
}

$paperback = new Paperback;

$paperback->setTitle("The greatest paperback ever");
$paperback->printBook();

$ebook = new Ebook;

$ebook->setTitle("Some ebook title:-)");
$ebook->generatePdf();

?>
