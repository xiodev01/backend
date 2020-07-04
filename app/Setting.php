<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = [
        "companyName",
        "companyLogo",
        "companyEmail",
        "companyPhone",
        "companyAddress",
        "companyWorkingTime",
        "Email",
        "Password",
        "FacebookLink",
        "InstagramLink",
        "GoogleLink",
    ];  
}
