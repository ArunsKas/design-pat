<?php

// https://wiki.php.net/rfc/generators

function squaredNumbers(int $start, int $end): Generator
{
  for ($i = $start; $i <= $end; ++$i) {
    yield $i => pow($i, 2);
  }
}

foreach (squaredNumbers(1, 5) as $key => $number) {
  var_dump([$key, $number]);
  echo '</br>';
}

?>
