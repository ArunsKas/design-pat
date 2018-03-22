<?php

// An example with errors :) at
// https://phpenthusiast.com/blog/the-adpater-design-pattern-in-php
// works only with modifications

// The adapter pattern recommends using an adapter class to translate the
// interface of the new class to the interface of the existing class that
// we are used to use. We use the adapter pattern when two classes or more do
// essentially the same job, but have different names for their methods.

interface PayZilla {
  function addItem($itemName);
  function addPrice($itemPrice);
}

class PayWithPayZilla implements PayZilla {

  function addItem($itemName)
  {
    var_dump("1 item added: " . $itemName);
    echo '</br>';
  }

  function addPrice($itemPrice)
  {
    var_dump("1 item added to total with the price of: " . $itemPrice);
    echo '</br>';
  }
}

class PayKal {
  function addOneItem($name)
  {
    var_dump("1 item added: " . $name);
    echo '</br>';
  }

  function addPriceToTotal($price)
  {
    var_dump("1 item added to total with the price of: " . $price);
    echo '</br>';
  }

  // Unique method
  function addItemAndPrice($name, $price)
  {
    $this->addOneItem($name);
    $this->addPriceToTotal($price);
  }
}

class Customer {
  private $pay;

  function __construct($pay)
  {
    $this->pay = $pay;
  }

  function buy($itemName, $itemPrice)
  {
    $this->pay->addItem($itemName);
    $this->pay->addPrice($itemPrice);
  }
}

// The adapter implements the original class
class PayKal2PayZillaAdapter implements PayZilla {

  // The adapter holds a reference to the new class.
  private $payObj;

  // In order to hold a reference, we need to pass the new
  //   class's object throught the constructor.
  function __construct($payObj)
  {
    $this->payObj = $payObj;
  }

// The name of the methods is that of the old class.
  // The code within the methods uses the code of the new class.
  function addItem($itemName)
  {
    $this->payObj->addOneItem($itemName);
  }

  function addPrice($itemPrice)
  {
    $this->payObj->addPriceToTotal($itemPrice);
  }

}

$pay = new PayWithPayZilla();
$customer = new Customer($pay);
$customer->buy("lollipop", 2);

//  a fatal error if not used adapter
// $pay = new PayKal();
// $customer = new Customer($pay);
// $customer->buy("lollipop", 2);

$payKal = new PayKal();
$pay = new PayKal2PayZillaAdapter($payKal);
$customer = new Customer($pay);
$customer->buy("lollipop", 2);

?>
