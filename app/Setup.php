<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    public static $percentage = array(
        'sell-profit'=>'required|numeric',
        'buy-profit'=>'required|numeric'
    );
}
