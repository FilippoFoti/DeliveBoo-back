<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'address', 'phone', 'image', 'vat_number'];

    public function dishes() {
        return $this->hasMany(Dishe::class);
    }

    public function types() {
        return $this->belongsToMany(Type::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    
    }
}
