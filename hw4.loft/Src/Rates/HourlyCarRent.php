<?php

namespace Src\Rates;

use Src\Traits\GpsService;
use Src\Traits\ExtraDriverService;
use Src\CarRent;

//(если количество часов !=int округление в большую сторону)
class HourlyCarRent extends CarRent
{
    protected $rateName = 'hourly';
    protected $rentPrice;
    protected $ageFactor;
    protected $ratioYoungDriver = 0.1;
    use GpsService, ExtraDriverService;

    public function getDataForCalculation($km, $hours, $age, $gps = null, $driver = null)
    {
        if (parent::verificationRateData($km, $hours, $age)) {
            $this->rentPrice = parent::baseCostRent($this->rateName, $km, ceil($hours));
            $this->ageFactor = parent::ageFactor($age);
            if ($this->ageFactor == $this->ratioYoungDriver) {
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
