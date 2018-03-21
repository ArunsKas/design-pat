<?php

  abstract class AnimalAbstract
  {
  	protected $species;

  	public function getSpecies() {
  		return $this->species;
  	}
  }

  class Cat extends AnimalAbstract
  {
  	protected $species = 'cat';
  }

  class Dog extends AnimalAbstract
  {
  	protected $species = 'dog';
  }

  class Pig extends AnimalAbstract
  {
  	protected $species = 'pig';
  }

  class Chicken extends AnimalAbstract
  {
  	protected $species = 'chicken';
  }

  class Zebra extends AnimalAbstract
  {
  	protected $species = 'zebra';
  }

  class Giraffe extends AnimalAbstract
  {
  	protected $species = 'giraffe';
  }

  /**
  *  all factories should implement this interface
  */
  interface AnimalFactoryInterface
  {
  	public static function factory($animal);
  }

  /**
  * this should be used to create all animals which are pets
  */
  class PetAnimalFactory implements AnimalFactoryInterface
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
  				throw new Exception("Pet animal factory could not create animal of species '" . $animal . "'", 1000);
  				break;
  		}
  		return $obj;
  	}
  }

  /**
  * this should be used to create all animals which are farm animals
  */
  class FarmAnimalFactory implements AnimalFactoryInterface
  {
  	public static function factory($animal)
  	{
  		switch ($animal) {
  			case 'pig':
  				$obj = new Pig();
  				break;
  			case 'chicken':
  				$obj = new Chicken();
  				break;
  			default:
  				throw new Exception("Farm animal factory could not create animal of species '" . $animal . "'", 1000);
  				break;
  		}
  		return $obj;
  	}
  }

  /**
  * this should be used to create all animals which are safari animals
  */
  class SafariAnimalFactory implements AnimalFactoryInterface
  {
  	public static function factory($animal)
  	{
  		switch ($animal) {
  			case 'zebra':
  				$obj = new Zebra();
  				break;
  			case 'giraffe':
  				$obj = new Giraffe();
  				break;
  			default:
  				throw new Exception("Safari animal factory could not create animal of species '" . $animal . "'", 1000);
  				break;
  		}
  		return $obj;
  	}
  }

  // ** Factory method
  //
  // Has multiple factories. This is useful if you have a large amount of
  // product classes and want to group them.
  //
  // ** Rules
  //
  // 1. Each factory you create e.g. PetAnimalFactory and FarmAnimalFactory,
  // must implement a factory interface, making them polymorphic.
  // 2. Each product class (here these are the animals) you create must also
  // implement an animal interface, making them polymorphic too.
  // 3. Each factory must have a factory method which will return an animal
  // instance.

  try {
  	$cat = PetAnimalFactory::factory('cat');
  	echo $cat->getSpecies();
  	echo '</br>';

  	$pig = FarmAnimalFactory::factory('pig');
  	echo $pig->getSpecies();
  	echo '</br>';

  	$giraffe = SafariAnimalFactory::factory('giraffe');
  	echo $giraffe->getSpecies();
  	echo '</br>';

  	$petChicken = PetAnimalFactory::factory('chicken');

  } catch(Exception $e){
  	echo $e->getMessage();
  }


?>
