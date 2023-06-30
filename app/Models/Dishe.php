<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishe extends Model
{
    use HasFactory;

    public function restaurants() {
        return $this->belongsTo(Restaurant::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class);
    }
}
