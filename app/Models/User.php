<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //Table Name
    protected $table = 'user';

    //Prefix
    protected $prefix = 'u';

    //Primary key
    protected  $primaryKey = 'u_id';

    //Fillable use for create or update purpose 
    protected $fillable=['u_name','u_email','u_password','u_country','u_profilepic','u_otp','u_otpdate'];

    //Set to false to prevent laravel auto add timestamp field to our table
    public $timestamps = false;

    //Use by laravel to insert /update the datetime
    // const CREATED_AT = 'mbr_createdon';
    // const UPDATED_AT = 'mbr_modifyon';

    //Roles Status
    // const STATUS_ACTIVE = 1;
    // const STATUS_INACTIVE = 0;

     //Pagination
    const PAGINATION_NUMBER = 0; //0 means no limit
}
