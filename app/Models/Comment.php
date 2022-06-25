<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Comment extends Model
{
    
    
     use HasApiTokens, HasFactory, Notifiable;

    //Table Name
    protected $table = 'comment';

    //Prefix
    protected $prefix = 'cm';

    //Primary key
    protected  $primaryKey = 'cm_id';

    //Fillable use for create or update purpose 
    protected $fillable=['cm_userid','cm_postid','cm_createdtime','cm_comment','cm_status'];

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

    public function CommentByUser()
    {
        return $this->hasOne('App\Models\User','u_id','cm_userid');
    }

    public function PostRating()
    {
        return $this->hasOne('App\Models\Post','p_id','cm_postid');
    }
}
