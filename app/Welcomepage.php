<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Welcomepage extends Model
{
    //
    protected $fillable = [
        "Whoarewe",
        "Imports",
        "Exports",
        "Image",
        "DescribeProduct",
        "DescribeServices",
    ];
}
