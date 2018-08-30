<?php

namespace Src\AddServices;

trait GpsService
{
    public function getGps($hours)
    {
        if ($hours < 1) {
            $hours = 1;
        }
        return ceil($hours * 15);
    }
}

trait AdditionalDriver
{
    public function getDriver()
    {
        return 100;
    }
}
