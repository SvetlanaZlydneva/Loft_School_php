<?php

namespace Src\AbstractClassCarRent;

use Src\InterfaceCareRent\CareRent;

abstract class CarRent implements CareRent
{
    protected $priceKm;
    protected $priceMin;

    abstract public function __construct();

    public function priceCalculation()
    {
        // TODO: Implement priceCalculation() method.
    }

    public function ageDetermination()
    {
        // TODO: Implement ageDetermination() method.
    }

    public function tariffInitialization($rates)
    {
        switch (rates) {
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
                $this->setPriceMin(1000);
                break;
            case 'student':
                $this->setPriceKm(4);
                $this->setPriceMin(1);
                break;
        }
        return [$this->priceKm, $this->priceMin];
    }

    protected function setPriceKm($priceKm)
    {
        $this->priceKm = $priceKm;
    }

    protected function setPriceMin($priceMin)
    {
        $this->priceMin = $priceMin;
    }
}
