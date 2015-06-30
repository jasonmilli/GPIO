<?php
class GPIO {
    private $pin;
    public function __construct($pin) {
        file_put_contents('/sys/class/gpio/export', $pin);
        file_put_contents("/sys/class/gpio/gpio{$pin}/direction", 'out');
        $this->pin = $pin;
    }
    public function __destruct() {
        file_put_contents('/sys/class/gpio/unexport', $this->pin);
    }
    public function on() {
        file_put_contents("/sys/class/gpio/gpio{$this->pin}/value",1);
    }
    public function off() {
        file_put_contents("/sys/class/gpio/gpio{$this->pin}/value",0);
    }
}
