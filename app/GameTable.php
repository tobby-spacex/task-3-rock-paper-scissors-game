<?php

declare(strict_types=1);

namespace App;

use LucidFrame\Console\ConsoleTable;

class GameTable
{
    public static function displayHelpTable(array $moveOptions): void
    {
        $options = $moveOptions;
        $table = new ConsoleTable();
        $table->setHeaders(array_merge(array(''), $options));
    
        $numOptions = count($options);
        for ($i = 0; $i < $numOptions; $i++) {
            $row = array($options[$i]);
            for ($j = 0; $j < $numOptions; $j++) {
                if ($i == $j) {
                    $cellValue = 'Draw';
                } else {
                    $distance = ($j - $i + $numOptions) % $numOptions;
                    if ($distance <= ($numOptions - 1) / 2) {
                        $cellValue = 'Win';
                    } else {
                        $cellValue = 'Lose';
                    }
                }
                $row[] = $cellValue;
            }
            $table->addRow($row);
        }
    

        $table
            ->setPadding(2)
            ->showAllBorders()
            ->display();
    }
}