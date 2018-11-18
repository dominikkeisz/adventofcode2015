<?php
$input = file_get_contents('ex1_data.txt');
//$test_input = '()())';

// make an initial floor counter

$floorCounter = 0;

// make an array from the string
$array = str_split($input);
//var_dump($array);

// loop through each item of the array with a simple for loop, so i can keep track of the indexes
// if the current item equals '(' add 1 to the counter
// elseif the current item equals ')' subtract 1 from the counter

$basementEntered = false;

for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] === '(') {
        $floorCounter += 1;
    } elseif ($array[$i] === ')') {
        $floorCounter -= 1;
    } else {
        echo 'Error, the item is not a paranthesis!';
    }

    // if Santa enters basement display the position of the item, but add 1 to it, because array indexing starts at '0'
    // and stop echoing the position

    if($basementEntered === false && $floorCounter === -1) {
        echo 'Santa enters the basement for the first time at the character position: ' . intval($i + 1) . "\n";
        $basementEntered = true;
    }
    
}

// echo out the final int
echo 'The instructions take Santa to floor: ' . $floorCounter . "\n";

?>