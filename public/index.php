<?php 

require_once __DIR__ . '/../vendor/autoload.php';

use App\GameRules;

$game = new GameRules();

// // Get the arguments passed to the script
$cliArgs = $argv;

$game->parsingCliArguments($cliArgs);

$game->gamePlay($cliArgs);

// function userMove()
// {
    // $options = getopt("n:f:");

    // while (true) {
    //   $input = trim(fgets(STDIN));
    //   if ($input == 'exit') {
    //     exit;
    //   }
    
    //   if ($options['n']) {
    //     echo "Option n set to: " . $options['n'] . "\n";
    //   }
    
    //   if ($options['f']) {
    //     echo "Option f set to: " . $options['f'] . "\n";
    //   }
    
    //   echo "You entered: " . $input . "\n";
//     }
// }

// userMove();