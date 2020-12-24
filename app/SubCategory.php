<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function subCategories(){
        return $this->hasMany('App\SubCategory', 'parent_id');
    }
}