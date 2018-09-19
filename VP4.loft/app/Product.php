<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    public function create($name,$category,$price,$photo,$description){
        $this->name = $name;
        $this->category=$category;
        $this->price=$price;
        $this->photo=$photo;
        $this->description = $description;
        $this->save();
    }
}
