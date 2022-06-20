<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Log extends Model
{
    use HasFactory;
    protected $fillable = ['user_name', 'email', 'role', 'modify', 'date'];

    public static function pushLog($type){
        $now = Carbon::now();
        Log::create([
            'user_name' => Auth::user()->user_name,
            'email' => Auth::user()->email,
            'role' => Auth::user()->role,
            'modify' => $type,
            'date' => $now
        ]);
    }
}
