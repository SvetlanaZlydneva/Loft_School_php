<?php

namespace App\Fakers;

use App\Models\User;
use Faker\Factory;

class FakerUsers
{
    protected $faker;
    protected $user;

    public function initFaker()
    {
        for ($u = 0; $u < 5; $u++) {
            $this->faker = Factory::create();
            $this->user = new User();
            $this->user->name = $this->faker->randomElement($array = array('Petro', 'Marfa', 'Denis'));
            $this->user->email = $this->faker->email;
            $this->user->password = $this->faker->randomElement($array = array(md5(1), md5(2), md5(3)));
            $this->user->age = $this->faker->randomElement($array = array(16, 22, 44, 31));
            $this->user->about = $this->faker->word;
            $this->user->photo = $this->faker->randomElement($array = array(
                'maxresdefault.jpg',
                'Рыжая-девушка-6.jpg',
                'Красивые-арт-рисунки-картинки-подборка-невероятных-и-удивительных-1.jpg'
            ));
            $this->user->save();
        }
    }
}
