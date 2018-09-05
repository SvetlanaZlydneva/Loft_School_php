<?php

namespace App\Fakers;

use App\Models\File;
use Faker\Factory;

class FakerFiles
{
    protected $faker;
    protected $file;

    public function initFaker()
    {
        for ($f = 0; $f < 5; $f++) {
            $this->faker = Factory::create();
            $this->file = new File();
            $this->file->user = $this->faker->randomElement($array = array(1, 2, 3));
            $this->file->fileName = $this->faker->randomElement($array = array(
                '53782.jpg',
                'maxresdefault.jpg',
                'tmb_145037_6611.jpg'
            ));
            $this->file->save();
        }
    }
}
