<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Space extends Model
{   
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'description',
        'location',
        'images',
        'price_per_hour',
        'from_date',
        'to_date',
    ]


    // Define relationships
    public function category(){
        return $this->belongTo(Category::class);
    }

    public function user(){
        return $this->belongTo(User::class);
    }

}

