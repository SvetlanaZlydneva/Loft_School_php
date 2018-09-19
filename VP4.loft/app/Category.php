<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    public function create($name){
        $this->name = $name;
        $this->description = $name;
        $this->save();
    }

}
