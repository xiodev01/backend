<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=[
        "Name",
        "Category",
        "ActiveImport",
        "ActiveExport",
        "Description", 
    ]; 

    public function Image()
    {
        return $this->hasMany('App\Image'); 
    }
    public function getImageAttribute()
    { 
        return $this->Image()->latest()->first(); 
    }
}
