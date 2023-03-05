<?php

//The input is a string str of digits. Cut the string into chunks (a chunk here is a substring of the initial string) of size sz (ignore the last chunk if its size is less than sz).
//
//If a chunk represents an integer such as the sum of the cubes of its digits is divisible by 2, reverse that chunk; otherwise rotate it to the left by one position. Put together these modified chunks and return the result as a string.
//
//If
//
//sz is <= 0 or if str is empty return ""
//sz is greater (>) than the length of str it is impossible to take a chunk of size sz hence return "".
//Examples:
//revrot("123456987654", 6) --> "234561876549"
//revrot("123456987653", 6) --> "234561356789"
//revrot("66443875", 4) --> "44668753"
//revrot("66443875", 8) --> "64438756"
//revrot("664438769", 8) --> "67834466"
//revrot("123456779", 8) --> "23456771"
//revrot("", 8) --> ""
//revrot("123456779", 0) --> ""
//revrot("563000655734469485", 4) --> "0365065073456944"
//Example of a string rotated to the left by one position:
//s = "123456" gives "234561".


function revRot($s, $sz) {

    //This one might be a bit tricky. I will try to explain it as best as I can.
    //First I create a condition that says that if the size of the chunk is less than or equal to 0 or if the size of the chunk is greater than the length of the string, then return an empty string.
    //Then I create a variable $chunks and i split the string into chunks of size $sz.
    //Then I create a variable $result and set it to an empty string.
    //Then I create a foreach loop that will loop through the chunks.
    //Then I create a condition that says that if the length of the chunk is equal to the size of the chunk, then do the following:
    //1. Create a variable $sum and set it to 0.
    //2. Create a foreach loop that will loop through the chunk.
    //3. Create a condition that says that if the sum of the cubes of the digits of the chunk is divisible by 2, then reverse the chunk and push it to the $result variable.
    //4. Create a condition that says that if the sum of the cubes of the digits of the chunk is not divisible by 2, then rotate the chunk to the left by one position and push it to the $result variable.
    //5. Return the $result variable.

    if($sz <= 0 || $sz > strlen($s)) return "";
    $chunks = str_split($s, $sz);
    $result = "";

    foreach($chunks as $chunk) {
        if(strlen($chunk) === $sz) {
            $sum = 0;
            foreach(str_split($chunk) as $num) {
                $sum += $num * $num * $num;
            }
            $result .= $sum % 2 == 0 ? strrev($chunk) : substr($chunk, 1) . substr($chunk, 0, 1);
        }
    }

    return $result;
}