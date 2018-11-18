<?php

$str = file_get_contents('ex3_data.txt');

// Split the input into an array
$directions = str_split($str);

// The main House object that has a coordinate position and keep track of its gifts
class House {
    public $x = 0;
    public $y = 0;
    public $gifts = 0;
  
    function __construct($x, $y, $gifts = 1) {
      $this -> x = $x;
      $this -> y = $y;
      $this -> gifts = $gifts;
     }
  
     function isSameHouse($x, $y) {
       if($this -> x == $x && $this -> y == $y)
        return true;
      else
        return false;
     }
  
     function addGift() {
      $this -> gifts +=1;
     }
}

// Declare variables for X and Y coordinates and for gifts
// 1 present at the starting house
$houses = array(new House(0, 0));

// var_dump($houses);


// Point out their starting position
$currentHouseOfSanta = $houses[0];
$currentHouseOfRobo_Santa = $houses[0];

// If its a new house add it to the houses counter or regift if its not
function giveGiftOrMoveOn($x, $y, $person) {
    $foundHouse = false;
    global $houses;
    global $currentHouseOfSanta;
    global $currentHouseOfRobo_Santa;
  
    foreach($houses as $house) {
      if($house->isSameHouse($x, $y)) {
        $house->addGift();
        $foundHouse = $house;
        break;
      }
    }
  
    if($foundHouse == false) {
      $foundHouse = new House($x, $y);
      $houses[] = $foundHouse;
    }
  
    // Move the proper person to his new location
    ${"currentHouseOf" . $person} = $foundHouse;
  
  }

// Decide who is moving next
foreach($directions as $key => $direction) {
  if($key % 2 == 0) {
    $currentHouse = $currentHouseOfSanta;
    $person = "Santa";
  } else {
    $currentHouse = $currentHouseOfRobo_Santa;
    $person = "Robo_Santa";
  }

  // If gets a direction, move according to the proper person
  switch($direction) {
    case ">":
        giveGiftOrMoveOn($currentHouse->x +1, $currentHouse->y, $person);
        break;
    case "<":
        giveGiftOrMoveOn($currentHouse->x -1, $currentHouse->y, $person);
        break;
    case "^":
        giveGiftOrMoveOn($currentHouse->x, $currentHouse->y +1, $person);
        break;
    case "v":
        giveGiftOrMoveOn($currentHouse->x, $currentHouse->y -1, $person);
        break;
    default:
        echo 'Not proper direction given!';
        break;
    }
}

// Print out the result
print "This year " . count($houses) . " houses receive at least one present. \n";

?>
