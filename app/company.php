<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    //
    protected $table = 'company';

    protected $fillable = [
        'company',
        'logo'
    ];
public function user()
{
    return $this->hasMany('user');
}

}
