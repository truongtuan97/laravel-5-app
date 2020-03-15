<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountInfo extends Model
{
    protected $table = 'Account_Info';
    protected $dateFormat = 'Y-m-d H:i:s';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cAccName','cSecPassWord','cPassWord','iClientID','dLoginDate','dLogoutDate',
        'nExtPoint','nExtPoint1','nExtPoint2','nExtPoint3','nExtPoint4','nExtPoint5','nExtPoint6','nExtPoint7',
        'nUserIP','nUserIPPort','nFeeType','bParentalControl','bIsBanned','bIsUseOTP','iOTPSessionLifeTime','iServiceFlag','plainpassword','email','phone' 
    ];
}
