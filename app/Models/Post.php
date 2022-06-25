<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Post extends Model
{
    
    
     use HasApiTokens, HasFactory, Notifiable;

    //Table Name
    protected $table = 'post';

    //Prefix
    protected $prefix = 'p';

    //Primary key
    protected  $primaryKey = 'p_id';

    //Fillable use for create or update purpose 
    protected $fillable=['p_name','p_userid','p_content','p_createdtime','p_image1','p_category','p_video','p_status'];

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

    public function PostedByUser()
    {
        return $this->hasOne('App\Models\User','u_id','p_userid');
    }

    public function Category()
    {
        return $this->hasOne('App\Models\CategoryBanner','c_id','p_category');
    }
    public function PostRating()
    {
        return $this->hasOne('App\Models\Rating','r_postid','p_id');
    }

    public function Comment()
    {
        return $this->hasOne('App\Models\Comment','cm_postid','p_id');
    }
}
