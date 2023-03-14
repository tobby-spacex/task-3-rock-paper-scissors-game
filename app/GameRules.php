<?php 

declare(strict_types = 1);

namespace App;

class GameRules
{
    public function parsingCliArguments($cliArgs): void
    {
        array_shift($cliArgs);
    
        if(count($cliArgs) >=3 && count($cliArgs) % 2 != 0 ) {
            $commands = 1;
            echo 'Avilable moves:' . "\n";
    
            foreach ($cliArgs as $arg) {
                echo $commands .' - '. $arg . "\n";
                $commands++;
            }
        
            echo '0 - exit' . "\n";
            echo '? - help' . "\n";
            echo 'Enter your move: ';
            return;
        }
    
          echo 'Wrong input arguments';
    }

    public function gamePlay($values)
    {
        // $values = array('1', '2', '3', '4', '5', '6', '7', '8', '9');

        array_shift($values);
        array_unshift($values,"");
        unset($values[0]);

        // $selectedValue = '5';
        $inputValue = trim(fgets(STDIN));
        $userMove   = $values[$inputValue];

        echo "Your move: ". $userMove . "\n";

        $selectedIndex = array_search($inputValue, $values);

        $leftGroup = array();
        $rightGroup = array();

        for ($i = 1; $i <= count($values); $i++) { 
            $valueIndex = ($selectedIndex + $i - 1) % count($values) + 1;
            if ($i <= floor(count($values) / 2)) {
              $leftGroup[] = $values[$valueIndex];
            } else {
              $rightGroup[] = $values[$valueIndex];
            }
        }

        echo "Left group: " . implode(", ", $leftGroup) . "\n";
        echo "Right group: " . implode(", ", $rightGroup) . "\n";

        while(true) {
            if ($inputValue == 'exit') {
              exit;
            }
        }
    }
}