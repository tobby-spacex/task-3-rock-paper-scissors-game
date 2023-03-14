<?php

namespace App;

use App\GameTable;
use App\HmacCryptography;
use App\GameRules;

class GameGenerator
{
    private $values;

    private $hmac;

    private $gameRules;
    
    public function __construct(array $values)
    {
        $this->values    = $values;
        $this->hmac      = new HmacCryptography();
        $this->gameRules = new GameRules();
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
        echo "Enter your move: ";
    }

    public function play(): void
    {
        if(count($this->values) < 3) {
            print "Please pass more than 3 arguments to start the game!\n";
            exit;
        } elseif(count($this->values) % 2 == 0) {
            print "According to the rules of the game, you cannot pass an even number of arguments.
            \nPass an odd number of arguments, greater than 3.\nExample: rock, paper, scissors, Spock lizard \n";
            exit;
        }

        while (true) {
            $computerMove = $this->computerMove($this->values);
            $this->hmac->hmacGenerating($computerMove);
            $this->printAvailableMoves();
            $input = trim(fgets(STDIN));
            
            if ($input === '0' || $input === 'exit') {
                exit;
            }
            
            if ($input === '?') {
                GameTable::displayHelpTable($this->values);
                continue;
            }
            
            if (empty($input)) {
                echo "Invalid input. Please try again.\n\n";
                continue;
            }
            
            $selectedValue = $this->values[$input - 1];
            echo "Your move: $selectedValue\n";
            echo "Computer move: " . $computerMove . "\n";
            
            $this->gameRules->gameProtocol($input, $this->values, $computerMove, $selectedValue);
            $this->hmac->hmacKey();
            exit;
        }
    }

    public function computerMove($options): string
    {
        array_unshift($options,"");
        unset($options[0]);

        $randomIndex = array_rand($options);
        
        return $options[$randomIndex]; 
    }
}
