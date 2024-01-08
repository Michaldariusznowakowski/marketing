<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['imie', 'nazwisko', 'adres', 'email', 'produkty', 'suma', 'unique_order_access_key', 'status'];
    protected $casts = ['produkty' => 'json'];
}
