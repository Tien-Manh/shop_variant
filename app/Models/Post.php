<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function cates(){
        return $this->belongsToMany(Cate::class, PostCate::class, 'post_id', 'cate_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'added_by');
    }
}
