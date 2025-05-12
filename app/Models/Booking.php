<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    public function space(){
        return $this->belongTo(Space::class);
    }

    public function user(){
        return $this->belongTo(User::class);
    }
}
