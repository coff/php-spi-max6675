#!/usr/bin/php
<?php

namespace Coff\Examples;

use Coff\Max6675\Max6675DataSource;

include (__DIR__ . '/../vendor/autoload.php');

$dataSource = new Max6675DataSource($busNumber = 0, $cableSelect = 1, $speedHz = 4300000);

$dataSource->init();

while (true) {
    try {
        echo $dataSource->update()->getValue()."      \r";
    } catch (\Exception $e) {
        echo $e->getMessage() . "\r";
    }
    sleep(1);
}
