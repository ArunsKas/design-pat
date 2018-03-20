<?php 

class Person
{
    public $employed;
 
    public $gender;
 
    const GENDER_MALE   = "Male";
 
    const GENDER_FEMALE = "Female";
 
}

interface PersonBuilderInterface
{
    public function setGender();
    public function setEmployed();
    public function getResult();
}

class EmployedMaleBuilder implements PersonBuilderInterface
{
    private $person;
 
    public function __construct()
    {
        $this->person = new Person();
    }
 
    public function setGender()
    {
        $this->person->gender = Person::GENDER_MALE;
    }
 
    public function setEmployed()
    {
        $this->person->employed = true;
    }
 
    public function getResult()
    {
        return $this->person;
    }
}

class UnemployedMaleBuilder implements PersonBuilderInterface
{
    private $person;
 
    public function __construct()
    {
        $this->person = new Person();
    }
 
 
    public function setGender()
    {
        $this->person->gender = Person::GENDER_MALE;
    }
 
    public function setEmployed()
    {
        $this->person->employed = false;
    }
 
    public function getResult()
    {
        return $this->person;
    }
}

class EmployedFemaleBuilder implements PersonBuilderInterface
{
    private $person;
 
    public function __construct()
    {
        $this->person = new Person();
    }
 
    public function setGender()
    {
        $this->person->gender = Person::GENDER_FEMALE;
    }
 
    public function setEmployed()
    {
        $this->person->employed = true;
    }
 
    public function getResult()
    {
        return $this->person;
    }
}

class UnemployedFemaleBuilder implements PersonBuilderInterface
{
    private $person;
 
    public function __construct()
    {
        $this->person = new Person();
    }
 
    public function setGender()
    {
        $this->person->gender = Person::GENDER_FEMALE;
    }
 
    public function setEmployed()
    {
        $this->person->employed = false;
    }
 
    public function getResult()
    {
        return $this->person;
    }
}

class PersonDirector
{
    public function build(PersonBuilderInterface $builder)
    {
        $builder->setGender();
        $builder->setEmployed();
 
        return $builder->getResult();
    }
}

$director                = new PersonDirector();
$employedMaleBuilder     = new EmployedMaleBuilder();
$unemployedMaleBuilder   = new UnemployedMaleBuilder();
$employedFemaleBuilder   = new EmployedFemaleBuilder();
$unemployedFemaleBuilder = new UnemployedFemaleBuilder();

$employedMale     = $director->build($employedMaleBuilder);
var_dump($employedMale);
echo '</br>';
$unemployedMale   = $director->build($unemployedMaleBuilder);
var_dump($unemployedMale);
echo '</br>';
$employedFemale   = $director->build($employedFemaleBuilder);
var_dump($employedFemale);
echo '</br>';
$unemployedFemale = $director->build($unemployedFemaleBuilder);
var_dump($unemployedFemale);
echo '</br>';

?>