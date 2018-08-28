<?php

namespace src\InterfaceClass;

interface CareRent
{
    public function priceCalculation();
    public function ageDetermination();
    public function tariffInitialization($rates);
}
