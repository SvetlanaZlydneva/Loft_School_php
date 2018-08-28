<?php

namespace CarInterface\CarRacing;

interface CarRacing
{
    public function __construct();

    public function costCarRacing($km, $min, $age);
}
