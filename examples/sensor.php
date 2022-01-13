#!/usr/bin/php
<?php

namespace Coff\Examples;

use Coff\Max6675\Max6675DataSource;
use Volantus\Pigpio\SPI\SpiDevice;

include (__DIR__ . '/../vendor/autoload.php');

$dataSource = new Max6675DataSource();
//$busNumber = 0, $cableSelect = 1, $speedHz = 4300000);

use Volantus\Pigpio\Client;
use Volantus\Pigpio\SPI\RegularSpiDevice;

$client = new Client();
$device = new RegularSpiDevice($client, 1, 32000);
$device->open();

$dataSource->setSpiDevice($device);

while (true) {
    try {
        echo $dataSource->update()->getValue()."      \r";
    } catch (\Exception $e) {
        echo "----\r";
       // echo $e->getMessage() . "\r";
    }
    sleep(1);
}
