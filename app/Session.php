<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model {
   
    protected $fillable = [
        'sessionid',
        'name',
        'surname',
        'msisdn',
        'mno',
        'type'
    ];
}
