<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    public function mainCategories(){
        return $this->hasMany('App\MainCategory', 'parent_id');
    }
}
