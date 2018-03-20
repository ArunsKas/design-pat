<?php

class Student
{
  public $name;
  public $year;
  public $grade;

  public function setName(string $name)
  {
    $this->name = $name;
  }

  public function setYear(int $year)
  {
    $this->year = $year;
  }

  public function setGrade(string $grade)
  {
    $this->grade = $grade;
  }

}

$prototypeStudent = new Student();
$prototypeStudent->setName('Dave');
$prototypeStudent->setYear(2);
$prototypeStudent->setGrade('A*');

var_dump($prototypeStudent);
echo '</br>';

$theLesserChild = clone $prototypeStudent;
$theLesserChild->setName('Mike');
$theLesserChild->setGrade('B');

var_dump($theLesserChild);
echo '</br>';

$theChildProdigy = clone $prototypeStudent;
$theChildProdigy->setName('Bob');
$theChildProdigy->setYear(3);
$theChildProdigy->setGrade('A');

var_dump($theChildProdigy);
echo '</br>';

// by using anonymous functions, otherwise known as closures, we can actually add extra methods dynamically to this object
// define an anonymous function for our object
$theChildProdigy->danceSkills = "Outstanding";
$theChildProdigy->dance = function (string $style) {
  return "Dancing $style style.";
};

echo '<pre>';
var_dump($theChildProdigy);
echo '</pre>';
echo '</br>';
var_dump($theChildProdigy->dance->__invoke('Pogo'));
echo '</br>';

?>