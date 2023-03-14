<?php

namespace App;

class GameGenerator
{
    private $values;
    
    public function __construct(array $values)
    {
        $this->values = $values;
    }
    
    public function printAvailableMoves(): void
    {
        $commands = 1;
        echo "Available moves:\n";
    
        foreach ($this->values as $value) {
            echo "$commands - $value\n";
            $commands++;
        }
        
        echo "0 - exit\n";
        echo "? - help\n";
    }

    public function play(): void
    {
        while (true) {
            $this->printAvailableMoves();
            $input = trim(fgets(STDIN));
            
            if ($input === '0' || $input === 'exit') {
                exit;
            }
            
            if ($input === '?') {
                $this->printAvailableMoves();
                continue;
            }
            
            if (!isset($this->values[$input - 1])) {
                echo "Invalid input. Please try again.\n";
                continue;
            }
            
            $selectedValue = $this->values[$input - 1];
            echo "Your move: $selectedValue\n";
            
            $index = $input - 1;
            $leftGroup = [];
            $rightGroup = [];
            
            for ($i = 1; $i < count($this->values); $i++) {
                $valueIndex = ($index - $i + count($this->values)) % count($this->values);
                $value = $this->values[$valueIndex];
                if ($i <= floor(count($this->values) / 2)) {
                    array_unshift($leftGroup, $value);
                } else {
                    array_unshift($rightGroup, $value);
                }
            }
            
            echo "Left group: " . implode(", ", $leftGroup) . "\n";
            echo "Right group: " . implode(", ", $rightGroup) . "\n";
        }
    }
}
