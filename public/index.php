<?php 

require_once __DIR__ . '/../vendor/autoload.php';

use App\GameGenerator;

$cliArgs = $argv;
array_shift($cliArgs);
$game = new GameGenerator($cliArgs);

$game->play();
