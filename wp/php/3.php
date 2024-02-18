<?php
// Absolute value
$number1 = -5;
echo "Absolute value of $number1 is " . abs($number1) . "<br>";

// Round
$number2 = 3.7;
echo "Rounded value of $number2 is " . round($number2) . "<br>";

// Ceil (Round fractions up)
$number3 = 4.1;
echo "Ceiling value of $number3 is " . ceil($number3) . "<br>";

// Floor (Round fractions down)
$number4 = 4.9;
echo "Floor value of $number4 is " . floor($number4) . "<br>";

// Minimum
$numbers = array(3, 7, 2, 9, 5);
echo "Minimum value in array is " . min($numbers) . "<br>";

// Maximum
echo "Maximum value in array is " . max($numbers) . "<br>";

// Power
$base = 2;
$exponent = 3;
echo "$base raised to the power of $exponent is " . pow($base, $exponent) . "<br>";

// Square root
$number5 = 16;
echo "Square root of $number5 is " . sqrt($number5) . "<br>";

// Random number between 0 and 1
echo "Random number between 0 and 1: " . rand() . "<br>";

// Random number between a range
echo "Random number between 10 and 20: " . rand(10, 20) . "<br>";
?>
