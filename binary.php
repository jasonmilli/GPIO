<?php
require 'gpio.php';
$pins = array(17,27,5,6,19);
$leds = array();
foreach ($pins as $pin) {
    $leds[] = new GPIO($pin);
}
for ($i = 0; $i < 100; $i++) {
    foreach ($leds as $j => $led) {
        if ($i % pow(2, $j) == 0) $led->on();
        else $led->off();
    }
    sleep(1);
}
