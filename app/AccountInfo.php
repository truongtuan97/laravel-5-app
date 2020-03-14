<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountInfo extends Model
{
    protected $table = 'account_infos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plain_password', 'customer_id'
    ];
}
