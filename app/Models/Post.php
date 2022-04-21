<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['post_image','category_id','post_heading','post_description','feature_post'];

    function rtn_post(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    function rtn_user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
