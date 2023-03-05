<?php

//Given a positive number n > 1 find the prime factor decomposition of n. The result will be a string with the following form :
//
// "(p1**n1)(p2**n2)...(pk**nk)"
//with the p(i) in increasing order and n(i) empty if n(i) is 1.
//
//Example: n = 86240 should return "(2**5)(5)(7**2)(11)"

function primeFactors($n){

    // I create an empty array and then I use a while loop to add the prime factors to the array.
    // Algorithm for the prime factors:
    // 1. I create a variable $i and set it to 2. (2 is the first prime number)
    // 2. I create a condition that says that as long as $n is greater than 1, the loop will continue.
    // 3. I create a condition that says that if $n is divisible by $i, then push $i to the array and divide $n by $i.
    // 4. If $n is not divisible by $i, then increment $i by 1.
    // 5. I use the array_count_values() function to count the number of times a value appears in the array.
    // Array will look like this [ 0=>2, 1=>2, 2=>3, 3=>3 ... ].
    // 6. I create a variable $result and set it to an empty string.
    // 7. I use a foreach loop to loop through the array_count_values (counts how many times number appears in array and sets that number as a key) array and create the string.
    // 8. If the value is 1, then I add the number in brackets. If the value is greater than 1, then I add the number in brackets and then add ** and the value.

    $primeFactors = [];
    $i = 2;
    while ($n > 1) {
        if ($n % $i === 0) {
            $primeFactors[] = $i;
            $n /= $i;
        } else {
            $i++;
        }
    }
    $primeFactors = array_count_values($primeFactors);
    $result = '';
    foreach ($primeFactors as $key => $value) {
        if ($value === 1) {
            $result .= "($key)";
        } else {
            $result .= "($key**$value)";
        }
    }
    return $result;
}