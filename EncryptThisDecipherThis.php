<?php

// Deciper This!

//You are given a secret message you need to decipher. Here are the things you need to know to decipher it:
//
//For each word:
//
//the second and the last letter is switched (e.g. Hello becomes Holle)
//the first letter is replaced by its character code (e.g. H becomes 72)
//Note: there are no special characters used, only letters and spaces
//
//Examples
//
//decipherThis('72olle 103doo 100ya'); // 'Hello good day'
//decipherThis('82yade 115te 103o'); // 'Ready set go'




function decipherThis($str){
    // We know that $str is a string only letters and spaces
    // First we need to explode the string into an array
    // Then we need to loop through the array
    // We need to filter the array to get the numbers only and then we need to convert the numbers to letter
    // Then we replace word in array with the new word - first letter is replaced by its character code (e.g. H becomes 72) using chr() function, then we add last letter then we add the middle part of the word and add second letter
    // If the word contains only 2 letters then we dont add the middle part of the word ( because for example go will result in goo) if the word contains only 1 letter then we only use the chr() function
    // Then we need to implode the array back into a string

    $arr = explode(' ', $str);

    foreach ($arr as $key => $value) {
        $charCode = filter_var($arr[$key], FILTER_SANITIZE_NUMBER_INT);
        $charLen = strlen($charCode);
        if(strlen($arr[$key]) - $charLen >= 2) {
            $arr[$key] = chr($charCode) . substr($arr[$key], -1, 1) . substr($arr[$key], $charLen+1, -1) . substr($arr[$key], strlen($charCode), 1);
        } elseif (strlen($arr[$key]) - $charLen >= 1) {
            $arr[$key] = chr($charCode) . substr($arr[$key], -1, 1) . substr($arr[$key], $charLen+1, -1);
        } else {
            $arr[$key] = chr($charCode);
        }
    }

    return implode(' ', $arr);
}


// Cleanest solution I found:

function decipherThis($str) {
    return preg_replace_callback("/(\d+)([^ ]*)/", function ($m) {
        return chr($m[1]) . (strlen($m[2]) < 2 ? $m[2] : substr($m[2], -1) . substr($m[2], 1, -1) . $m[2][0]);
    }, $str);
}




// Encrypt this!

//Acknowledgments:
//I thank yvonne-liu for the idea and for the example tests :)
//
//Description:
//Encrypt this!
//
//You want to create secret messages which can be deciphered by the Decipher this! (https://www.codewars.com/kata/decipher-this) kata. Here are the conditions:
//
//Your message is a string containing space separated words.
//You need to encrypt each word in the message using the following rules:
//The first letter must be converted to its ASCII code.
//The second letter must be switched with the last letter
//Keepin' it simple: There are no special characters in the input.
//Examples:
//encryptThis("Hello") === "72olle"
//encryptThis("good") === "103doo"
//encryptThis("hello world") === "104olle 119drlo"




function encryptThis($text): string
{
    // Doing decryption first and then encryption later is easier
    // We need to explode the string into an array
    // Then we need to loop through the array
    // First letter needs to be converted to its ASCII code using ord() function
    // Then we need to check if the word contains more than 2 letters
    // If the word contains more than 2 letters then we need to add the last letter then we need to add the middle part of the word and then we need to add the second letter

    $arr = explode(' ', $text);

    foreach ($arr as $key => $value) {
        $arr[$key] = ord($arr[$key][0]) . (strlen($arr[$key]) > 2 ? substr($arr[$key], -1) . substr($arr[$key], 2, -1) . substr($arr[$key], 1, 1) : substr($arr[$key], 1));
    }

    return implode(' ', $arr);
}









