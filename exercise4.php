<?php

// To find coins, we need a hexadecimal, that starts with 00000

// md5(Key + numbers (from 1 to 9)) = MD5 hash starting with 5or 6 zeros and need the lowest number first
// lowest number means we should start from 1 and increment

// Key
$key = 'iwrupvqb';

// Declare a variable to know if it is found
$coin_found = false;

// Declare a variable that will be the number
$number = 1;

//Bruteforce trying means while statement is the one to use
while(!$coin_found) {
    // Hash
    $key_with_numbers = md5("$key$number");

    // Condition
    $firstX_characters = substr($key_with_numbers,0,6);
    if($firstX_characters === '000000') {
        $coin_found = true;
    } else {
        $number++;
    }
}

echo "The number you need following your key is: " . $number . "\n";

?>