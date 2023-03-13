<?php 

// // Get the arguments passed to the script
$cliArgs = $argv;

function parsingCliArguments($cliArgs): void
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
        return;
    }

      echo 'Wrong input arguments';
}

function userMove()
{
    $options = getopt("n:f:");

    while (true) {
      $input = trim(fgets(STDIN));
      if ($input == 'exit') {
        exit;
      }
    
      if ($options['n']) {
        echo "Option n set to: " . $options['n'] . "\n";
      }
    
      if ($options['f']) {
        echo "Option f set to: " . $options['f'] . "\n";
      }
    
      echo "You entered: " . $input . "\n";
    }
}


parsingCliArguments($cliArgs);

userMove();