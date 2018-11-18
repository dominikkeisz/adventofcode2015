<?php

    //Make a final result of wrapping paper variable and a final result of ribbon
    $finalResultOfWrappingPaper = 0;
    $finalResultOfRibbon = 0;

    //Slice the input into strings containing 3 numbers with Xs
    $data = file_get_contents('ex2_data.txt');
    $pieces = explode("\n", $data);


    //Loop through every strings with calculation function and add results to final result
    include_once 'exercise2_functions.php';

    foreach($pieces as $present) {
        $finalResultOfWrappingPaper += calculationForWP($present);
        $finalResultOfRibbon += calculationForRib($present);
    }

    //Echo out final result
    echo "Total square feet of wrapping paper needed: $finalResultOfWrappingPaper \n";
    echo "Total square feet of ribbon needed: $finalResultOfRibbon \n";

?>