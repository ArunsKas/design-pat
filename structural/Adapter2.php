<?php

class Insurance
{
  private $limit;
  private $excess;

  public function __construct(float $limit, float $excess)
  {
    if ($excess >= $limit) {
      throw New Exception('Excess must be less than premium.');
    }

    $this->limit = $limit;
    $this->excess = $excess;
  }

  public function monthlyPremium(): float
  {
    return ($this->limit-$this->excess)/200;
  }

  public function annualPremium(): float
  {
    return $this->monthlyPremium()*11.5;
  }
}

interface MarketCompare
{
  public function __construct(float $limit, float $excess);
  public function getAnnualPremium();
  public function getMonthlyPremium();
}

class InsuranceMarketCompare implements MarketCompare
{
  private $premium;

  public function __construct(float $limit, float $excess)
  {
    $this->premium = new Insurance($limit, $excess);
  }

  public function getAnnualPremium(): float
  {
    return $this->premium->annualPremium();
  }

  public function getMonthlyPremium(): float
  {
    return $this->premium->monthlyPremium();
  }
}

$quote = new Insurance(10000, 250);
echo $quote->monthlyPremium();
echo "</br>";

$quote = new InsuranceMarketCompare(10000, 250);
echo $quote->getMonthlyPremium();
echo "</br>";
echo $quote->getAnnualPremium();



?>
