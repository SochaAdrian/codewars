<?php

// Build Tower
//Build a pyramid-shaped tower, as an array/list of strings, given a positive integer number of floors. A tower block is represented with "*" character.
//
//For example, a tower with 3 floors looks like this:
//
//[
//  "  *  ",
//  " *** ",
//  "*****"
//]
//And a tower with 6 floors looks like this:
//
//[
//  "     *     ",
//  "    ***    ",
//  "   *****   ",
//  "  *******  ",
//  " ********* ",
//  "***********"
//]


function tower_builder(int $n): array {
    // In this code I create an empty array and then I use a for loop to add the number of floors to the array.
    // Algorithm for the number of floors:
    // 1. I create a variable $i and set it to 1.
    // 2. I create a condition that says that as long as $i is less than or equal to $n, the loop will continue.
    // 3. I create a variable $tower and set it to an empty array.
    // 4. I use the str_repeat() function to repeat the string and push it to array.
    // String is created by using the str_repeat() function to repeat the string
    // First repeat blank spaces and then repeat the * and then repeat the blank spaces.
    // $n - $i is used to create the blank spaces before the * and after. ( 3-1 = 2, 3-2 = 1, 3-3 = 0)
    // $i * 2 - 1 is used to create the *. The -1 is used to create the odd number of *. ( 2-1 = 1, 4-1 = 3, 6-1 = 5, 8-1 = 7, 10-1 = 9 ...)
    // If we take $n = 3, then in 0/1 iteration we will have 2 blank spaces, 1 * and 2 blank spaces. In 2nd iteration we will have 1 blank space, 3 * and 1 blank space. In 3rd iteration we will have 0 blank spaces, 5 * and 0 blank spaces.

    $tower = [];
    for ($i = 1; $i <= $n; $i++) {
        $tower[] = str_repeat(' ', $n - $i) . str_repeat('*', $i * 2 - 1) . str_repeat(' ', $n - $i);
    }
    return $tower;

}