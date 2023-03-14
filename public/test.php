<?php

$values = array('1', '2', '3', '4', '5', '6', '7', '8', '9');

// define a selected value
$selectedValue = '5';

// find the index of the selected value in the array
$selectedIndex = array_search($selectedValue, $values);

// define an empty array for the left group and right group
$leftGroup = array();
$rightGroup = array();

// iterate through the circular array and add values to the left or right group
for ($i = 0; $i < count($values); $i++) {
  $valueIndex = ($selectedIndex + $i) % count($values);
  if ($i < count($values) / 2) {
    $leftGroup[] = $values[$valueIndex];
  } else {
    $rightGroup[] = $values[$valueIndex];
  }
}

// print the left and right groups
echo "Left group: " . implode(", ", $leftGroup) . "\n";
echo "Right group: " . implode(", ", $rightGroup) . "\n";