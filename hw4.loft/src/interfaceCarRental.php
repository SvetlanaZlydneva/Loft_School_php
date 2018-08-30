<?php

namespace Src\InterfaceRental;

interface Rent
{
    public function getDataForCalculation($km, $hours, $age);
}
