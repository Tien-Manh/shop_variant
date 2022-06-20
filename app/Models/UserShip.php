<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserShip extends Model
{
    use HasFactory;
    protected $table = 'user_ships';
    protected $fillable = ['address', 'user_id', 'is_default'];
}
