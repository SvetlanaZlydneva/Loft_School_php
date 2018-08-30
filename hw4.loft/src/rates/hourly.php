<?php

namespace Src\Rates;

use Src\AddServices\GpsService;
use Src\AddServices\AdditionalDriver;
use Src\BaseClass\CarRent;

//(если количество часов !=int округление в большую сторону)
class Hourly extends CarRent
{
    protected $rateName = 'hourly';
    protected $rentPrice;
    protected $ageFactor;
    use GpsService, AdditionalDriver;

    public function getDataForCalculation($km, $hours, $age, $gps = null, $driver = null)
    {
        if (parent::verificationRateData($km, $hours, $age)) {
            $this->rentPrice = parent::baseCostRent($this->rateName, $km, ceil($hours));
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
            ceil($hours) * 60,
            $age,
            $this->ageFactor,
            $gps,
            $driver
        );
    }
}
