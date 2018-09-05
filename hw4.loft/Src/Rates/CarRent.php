<?php

namespace Src;

use Src\RentInterface\Rent;

abstract class CarRent implements Rent
{
    protected $priceKm;
    protected $priceMin;

    abstract public function getDataForCalculation($km, $hours, $age);

    protected function baseCostRent($rates, $km, $hour)
    {
        $this->initializationRate($rates);
        $baseCost = ($this->priceKm * $km) + ($this->priceMin * (60 * $hour));
        return $baseCost;
    }

    protected function verificationRateData($km, $hour, $age)
    {
        $resultVerification = false;
        if (!empty($km) && !empty($hour) && !empty($age)) {
            if (is_numeric($km) && is_numeric($hour) && is_numeric($age)) {
                $resultVerification = true;
            }
        }
        return $resultVerification;
    }

    protected function ageFactor($age, $rate = null)
    {
        $ageFactor = 0;
        if ($age >= 18 && $age <= 21) { //+10%
            $ageFactor = 0.1;
        } elseif ($age > 25 && $rate == 'student') {
            $ageFactor = 1;
        } elseif ($age < 18 || $age > 65) {
            $ageFactor = 1;
        }
        return $ageFactor;
    }

    protected function initializationRate($rates)
    {
        switch ($rates) {
            case 'base':
                $this->setPriceKm(10);
                $this->setPriceMin(3);
                break;
            case 'hourly':
                $this->setPriceKm(0);
                $this->setPriceMin(200 / 60);
                break;
            case 'daily':
                $this->setPriceKm(1);
                $this->setPriceMin((1000 / 24) / 60);
                break;
            case 'student':
                $this->setPriceKm(4);
                $this->setPriceMin(1);
                break;
        }
    }

    protected function setPriceKm($priceKm)
    {
        $this->priceKm = $priceKm;
    }

    protected function setPriceMin($priceMin)
    {
        $this->priceMin = $priceMin;
    }

    protected function displayResult(
        $rate,
        $rentPrice,
        $km,
        $hours,
        $age,
        $ageFactor,
        $gps = null,
        $addDriver = null
    ) {
        $displayCondition = "(Rate : {$rate}, {$km} km, {$hours} min (" . ($hours / 60) . " hours), {$age} age";
        $displaySolution = "( ({$km} * {$this->priceKm}) + ({$hours} * " . round($this->priceMin, 2) . ") )";
        if ($ageFactor == 0.1) {
            $displayCondition .= ", 10% young driver";
            $displaySolution .= " * 10% ";
        }
        if ($gps == 'on') {
            $displayCondition .= ", " . ($hours / 60) . " hours gps ";
            $displaySolution .= " + (15 * " . ($hours / 60) . ")";
        }
        if ($addDriver == 'on') {
            $displayCondition .= ", additional driver ";
            $displaySolution .= " + 100";
        }
        if ($ageFactor == 1) {
            $displayCondition .= ") = ";
            $displaySolution .= ") = Driver age not allowed!";
        } else {
            $displayCondition .= ") = ";
            $displaySolution .= ") = {$rentPrice}";
        }
        return $displayCondition . $displaySolution . "<br>";
    }
}
