<?php 

/**
 * All animal should extend this abstract animal class
 */
abstract class AnimalAbstract
{
  protected $species;

  public function getSpecies() {
    return $this->species;
  }

}

/**
* used to represent a cat
*/
class Cat extends AnimalAbstract 
{
  protected $species = 'cat';
}

/**
* used to represent a dog
*/
class Dog extends AnimalAbstract
{
  protected $species = 'dog';
}

/**
* This is the factory witch created animal object
*/
class AnimalFactory
{
  public static function factory($animal)
  {
    switch ($animal) {
      case 'cat':
        $obj = new Cat();
        break;
      case 'dog':
        $obj = new Dog();
        break;
      default:
        throw new Exception("Animal factory could not create animal of species '" . $animal . "'", 1000);
        break;
    }
    return $obj;
  }
}

try {
  $cat = AnimalFactory::factory('cat');
  echo $cat->getSpecies();
  echo ' ';

  $dog = AnimalFactory::factory('dog');
  echo $dog->getSpecies();
  echo ' ';

  $hippo = AnimalFactory::factory('hippopotamus'); // This will throw an Exception

} catch (Exception $e) {
  echo $e->getMessage();
}

?>