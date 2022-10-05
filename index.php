<?php

use App\ReversePolishNotationCalculator;

require_once __DIR__.'/bootstrap.php';

$calculator = new ReversePolishNotationCalculator;
$result = $calculator->calculate(["3", "5", "+", "7", "2", "-", "*"]);

print_r($result);