<?php

// Class Adapter

class ATM
{
  private $balance;

  public function __construct(float $balance)
  {
    $this->balance = $balance;
  }

  public function withdraw(float $amount): float
  {
    if ($this->reduceBalance($amount) === true) {
      return $amount;
    } else {
      throw new Exception("Couldn't withdraw money.");
    }
  }

  protected function reduceBalance(float $amount): bool
  {
    if ($amount >= $this->balance) {
      return false;
    }

    $this->balance = ($this->balance - $amount);
    return true;
  }

  public function getBalance(): float
  {
    return $this->balance;
  }
}

class ATMWithPhoneTopUp extends ATM
{
  public function getTopUp(float $amount, int $time): string
  {
    if ($this->reduceBalance($amount) === true) {
      return $this->generateTopUpCode($amount, $time);
    } else {
      throw new Exception("Couldn't withdraw money.");
    }
  }

  private function generateTopUpCode(float $amount, int $time): string
  {
    return $amount . $time . rand(0, 10000);
  }
}

$atm = new ATM(500.00);
$atm->withdraw(50);
echo $atm->getBalance();
echo "</br>";

$adaptedATM = new ATMWithPhoneTopUp(500.00);
echo "Top-up code: " . $adaptedATM->getTopUp(50, time());
echo "</br>";
echo $adaptedATM->getBalance();

?>
