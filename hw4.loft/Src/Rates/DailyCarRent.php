<?php

namespace Src\Rates;

use Src\Traits\GpsService;
use Src\Traits\ExtraDriverService;
use Src\CarRent;

class DailyCarRent extends CarRent
{
    protected $rateName = 'daily';
    protected $rentPrice;
    protected $ageFactor;
    protected $ratioYoungDriver = 0.1;
    protected $hoursInDay = 24;
    protected $halfAnHour = 30;
    use GpsService, ExtraDriverService;

    public function getDataForCalculation($km, $hours, $age, $gps = null, $driver = null)
    {
        if (parent::verificationRateData($km, $hours, $age)) {
            //если отстаток от деления == сутки и минуты указанные после суток... больше и равно 30
            // или указанные часы меньше чем сутки
            if ($hours % $this->hoursInDay == 0
                && explode('.', $hours)[1] >= $this->halfAnHour
                || $hours < $this->hoursInDay) {
                //округляем в большую сторону до 24ч/48ч и тд
                $hours = (ceil($hours / $this->hoursInDay)) * $this->hoursInDay;
            } else {
                $hours = (floor($hours / $this->hoursInDay)) * $this->hoursInDay;//округляем в меньшую сторону
            }
            $this->rentPrice = parent::baseCostRent($this->rateName, $km, $hours);
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
            $hours * 60,
            $age,
            $this->ageFactor,
            $gps,
            $driver
        );
    }
}
