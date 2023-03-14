<?php

namespace App;

class GameRules
{
    public function gameProtocol($userInput, $inputArgs, $computerMove, $userSelectedValue): void
    {
        $index = $userInput - 1;
        $leftGroup = [];
        $rightGroup = [];
        
        for ($i = 1; $i < count($inputArgs); $i++ ) {
            $valueIndex = ($index - $i + count($inputArgs)) % count($inputArgs);
            $value = $inputArgs[$valueIndex];
            if ($i <= floor(count($inputArgs) / 2)) {
                array_unshift($leftGroup, $value);
            } else {
                array_unshift($rightGroup, $value);
            }
        }
        
        /** For testing the winning path */
        // echo "Left group: " . implode(", ", $leftGroup) . "\n";
        // echo "Right group: " . implode(", ", $rightGroup) . "\n";

        if($userInput) {
            sleep(2);
            if(in_array($computerMove, $rightGroup)) {
                echo "Computer Win\n";
            } elseif($userSelectedValue == $computerMove) {
                echo "Draw :)\n";
            } else {
                echo "You Win\n";
            }
        }
    }
}