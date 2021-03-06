<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    function rtn_user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    protected $fillable = ['category_name'];
}
