<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    public static $percentage = array(
        'sell-profit'=>'required|numeric',
        'buy-profit'=>'required|numeric'
    );
    public static $paymentmethods = array(
        'title'=>'required',
        'description'=>'required',
        'hours'=>'required|numeric'
    );
}
