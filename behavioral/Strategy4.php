<?php

// interface to commit the classes that generate coupons:
// 1. to add downturn discount
// 2. to add stock discount
interface carCouponGenerator {
  function addSeasonDiscount();
  function addStockDiscount();
}

// implements the interface for BMW.
class bmwCouponGenerator implements carCouponGenerator {
  private $discount = 0;
  private $isHighSeason = false;
  private $bigStock = true;

  public function addSeasonDiscount()
  {
    if(!$this->isHighSeason) return $this->discount += 5;

    return $this->discount +=0;
  }

  public function addStockDiscount()
  {
    if($this->bigStock) return $this->discount += 7;

    return $this->discount +=0;
  }
}

// implements the interface for Mercedes.
class mercedesCouponGenerator implements carCouponGenerator {
  private $discount = 0;
  private $isHighSeason = false;
  private $bigStock = true;

  public function addSeasonDiscount()
  {
    if(!$this->isHighSeason) return $this->discount += 4;

    return $this->discount +=0;
  }

  public function addStockDiscount()
  {
    if($this->bigStock) return $this->discount += 10;

    return $this->discount +=0;
  }
}

// The client class generates coupon from the object of choice.
class couponGenerator {
  private $carCoupon;

  // Get only objects that belong to the interface.
  public function __construct(carCouponGenerator $carCoupon)
  {
    $this->carCoupon = $carCoupon;
  }

  // Use the object's methods to generate the coupon.
  public function getCoupon()
  {
    $discount = $this->carCoupon->addSeasonDiscount();
    $discount = $this->carCoupon->addStockDiscount();

    return $coupon = "Get {$discount}% off the price of your new car.";
  }
}

// Create object from the alternative classes.
function couponObjectGenerator($car)
{
  if($car == "bmw")
  {
    $carObj = new bmwCouponGenerator;
  }
  else if($car == "mercedes")
  {
    $carObj = new mercedesCouponGenerator;
  }

  return $carObj;
}

// Test the code.
$car = "bmw";
$carObj = couponObjectGenerator($car);
$couponGenerator = new couponGenerator($carObj);
echo $couponGenerator->getCoupon();

echo "<hr />";

$car = "mercedes";
$carObj = couponObjectGenerator($car);
$couponGenerator = new couponGenerator($carObj);
echo $couponGenerator->getCoupon();





?>
