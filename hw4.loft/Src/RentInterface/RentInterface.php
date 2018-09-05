<?php

namespace Src\RentInterface;

interface Rent
{
    public function getDataForCalculation($km, $hours, $age);
}
