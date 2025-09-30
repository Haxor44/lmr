<?php

class Car {
    public $brand;
    public $model;

    public function drive() {
        echo "Driving the $this->brand.";
    }
}