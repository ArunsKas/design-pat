<?php

interface EmployeeSpecification
{
  public function isSatisfiedBy(StdClass $customer): bool;
}

class EmployeeIsEngineer implements EmployeeSpecification
{
  public function isSatisfiedBy(StdClass $customer): bool
  {
    if ($customer->department === "Engineering") {
      return true;
    }

    return false;
  }
}

$workers['A'] = new StdClass();
$workers['A']->title = "Developer";
$workers['A']->department = "Engineering";
$workers['A']->salary = 50000;

$workers['B'] = new StdClass();
$workers['B']->title = "Data Analyst";
$workers['B']->department = "Engineering";
$workers['B']->salary = 30000;

$workers['C'] = new StdClass();
$workers['C']->title = "Personal Assistant";
$workers['C']->department = "CEO";
$workers['C']->salary = 25000;

$isEngineer = new EmployeeIsEngineer();

foreach ($workers as $id => $worker) {
  if ($isEngineer->isSatisfiedBy($worker)) {
    var_dump($id);
  }
}

?>
