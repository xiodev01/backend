<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aboutpage extends Model
{
    //
    protected $fillable = [
        "CompanyDescription",
        "CompanyImage",
        "Mession",
        "Vission",
        "Enviroment",
        "EmployeeProgressNote",
        "OurPeopleNote",
    ];
}
