<?php
function isPrime($number) {
    // Check if the number is less than 2
    if ($number < 2) {
        return false;
    }
    
    // Loop from 2 to the square root of the number
    for ($i = 2; $i <= sqrt($number); $i++) {
        // If the number is divisible by any number between 2 and its square root, it's not prime
        if ($number % $i == 0) {
            return false;
        }
    }
    
    // If no divisor is found, the number is prime
    return true;
}

// Test the function
$number = 29; // Change this number to test different values
if (isPrime($number)) {
    echo "$number is a prime number.";
} else {
    echo "$number is not a prime number.";
}
?>
