<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function dishes()
    {
        return $this->belongsToMany(Dishe::class);
    }
    protected $fillable = [
        'customer_name',
        'customer_lastname',
        'email',
        'phone',
        'address',
        'date',
        'total_price',
        'payment_status',
    ];
}
