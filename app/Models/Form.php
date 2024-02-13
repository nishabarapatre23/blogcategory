<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    public function category(){
        return $this->hasOne(Category::class, 'id','cat_id');
    }

        protected $table = 'forms';
        protected $fillable = [
            'name', 'cname'
        ];
        public function images()
        {
         return $this->hasMany('App\Image', 'forms_id');
        }

}
