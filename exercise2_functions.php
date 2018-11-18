<?php

/* 
Surface function
    math: multiply 2 with arr[0] and arr[1] plus
        multiply 2 with arr[1] and arr[2] plus
        multiply 2 with arr[2] and arr[0]
        return the final int
*/ 

function surface_calculation($arr) {
    $result = 0;
    $result += 2 * $arr[0] * $arr[1];
    $result += 2 * $arr[1] * $arr[2];
    $result += 2 * $arr[2] * $arr[0];
    return $result; 
}

/* 
Extra paper function
    find 2 smallest number from the array of 3 ints
    multiply them
    return the final int
*/

function extraPaperCalculation($arr){
    sort($arr);
    $result = $arr[0] * $arr[1];

    return $result;
}

// Add up the two numbers to get the final square feet of paper needed
function calculationForWP($input) {
    //slice each string and put them in an array with explode
    $numbers = explode("x",$input);
    //var_dump($numbers);
    //If i doing math with them, PHP will convert type to int

    return surface_calculation($numbers) + extraPaperCalculation($numbers);
}

// Ribbon to wrap
// add up 2 smallest dimensions and multiply by 2
function ribbonToWrap($arr) {
    sort($arr);
    $result = ($arr[0] + $arr[1]) * 2;
    return $result;
}

// Ribbon for Bow
// multiply dimensions with each other
function ribbonForBow($arr) {
    sort($arr);
    $result = $arr[0]*$arr[1]*$arr[2];
    return $result;
}

function calculationForRib($input) {
    $numbers = explode("x",$input);
    return ribbonForBow($numbers) + ribbonToWrap($numbers);
}

?>