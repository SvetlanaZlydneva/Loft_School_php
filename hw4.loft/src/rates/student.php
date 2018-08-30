<?php

namespace Src\Rates;

use Src\AddServices\GpsService;
use Src\BaseClass\CarRent;

class Student extends CarRent
{
    protected $rateName = 'student';
    protected $rentPrice;
    protected $ageFactor;
    use GpsService;

    public function getDataForCalculation($km, $hours, $age, $gps = null)
    {
        if (parent::verificationRateData($km, $hours, $age)) {
            $this->rentPrice = parent::baseCostRent($this->rateName, $km, $hours);
            $this->ageFactor = parent::ageFactor($age, $this->rateName);
            if ($this->ageFactor != 1) {
                if ($this->ageFactor == 0.1) {
                    $this->rentPrice += $this->rentPrice * $this->ageFactor;
                }
                if ($gps == 'on') {
                    $this->rentPrice += $this->getGps($hours);
                }
            } else {
                $this->rentPrice = 'Driver age not allowed!';
            }
        } else {
            $this->rentPrice = 'Error: data entered incorrectly!';
        }
        echo parent::displayResult($this->rateName, $this->rentPrice, $km, $hours * 60, $age, $this->ageFactor, $gps);
    }
}
