<?php

namespace Src\Traits;

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
