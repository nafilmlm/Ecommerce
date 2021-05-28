<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;


class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_code',
    ];

    protected $table = "countries";

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
  
}