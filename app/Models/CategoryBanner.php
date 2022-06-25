<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CategoryBanner extends Model
{
    
    
     use HasApiTokens, HasFactory, Notifiable;

    //Table Name
    protected $table = 'categorybanner';

    //Prefix
    protected $prefix = 'c';

    //Primary key
    protected  $primaryKey = 'c_id';

    //Fillable use for create or update purpose 
    protected $fillable=['c_name','c_content','c_createdtime','c_image1','c_video'];

    //Set to false to prevent laravel auto add timestamp field to our table
    //public $timestamps = false;

    //Use by laravel to insert /update the datetime
    // const CREATED_AT = 'mbr_createdon';
    // const UPDATED_AT = 'mbr_modifyon';

    //Roles Status
    // const STATUS_ACTIVE = 1;
    // const STATUS_INACTIVE = 0;

     //Pagination
    const PAGINATION_NUMBER = 0; //0 means no limit
}
