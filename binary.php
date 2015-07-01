<?php
require 'gpio.php';
$pins = array(17,4,27,22,19);
$leds = array();
foreach ($pins as $pin) {
    $leds[] = new GPIO($pin);
}
for ($i = 0; $i < 50; $i++) {
    foreach ($leds as $j => $led) {
        if ($i % pow(2, $j + 1) > pow(2,$j) || $i % pow(2,$j + 1) == 0) $led->on();
        else $led->off();
    }
    sleep(1);
}
