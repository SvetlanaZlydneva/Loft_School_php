<?php

namespace Src\Rates;

use Src\AddServices\GpsService;
use Src\AddServices\AdditionalDriver;
use Src\BaseClass\CarRent;

//(окруление до 24ч / 24,30ч=24ч / 24,31 = округление до 48 часов)
class Daily extends CarRent
{
    protected $rateName = 'daily';
    protected $rentPrice;
    protected $ageFactor;
    use GpsService, AdditionalDriver;

    public function getDataForCalculation($km, $hours, $age, $gps = null, $driver = null)
    {
        if (parent::verificationRateData($km, $hours, $age)) {
            if (($hours * 60) >= 30) {
                if ($hours % 24 == 0 && explode('.', $hours)[1] >= 30 || $hours < 24) {
                    $hours = (ceil($hours / 24)) * 24;
                } else {
                    $hours = (floor($hours / 24)) * 24;
                }
            }
            $this->rentPrice = parent::baseCostRent($this->rateName, $km, $hours);
            $this->ageFactor = parent::ageFactor($age);
            if ($this->ageFactor == 0.1) {
                $this->rentPrice += $this->rentPrice * $this->ageFactor;
            }
            if ($gps == 'on') {
                $this->rentPrice += $this->getGps($hours);
            }
            if ($driver == 'on') {
                $this->rentPrice += $this->getDriver();
            }
        } else {
            $this->rentPrice = 'Error: data entered incorrectly!';
        }
        echo parent::displayResult(
            $this->rateName,
            $this->rentPrice,
            $km,
            $hours * 60,
            $age,
            $this->ageFactor,
            $gps,
            $driver
        );
    }
}
