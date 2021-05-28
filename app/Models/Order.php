<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Models\Country;
use App\Models\State;
use App\Models\City;





class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);  
    }
    
    public function orderCountry()
    {
        return $this->belongsTo(Country::class,'country');
    }

    public function orderProvince()
    {
        return $this->belongsTo(State::class,'province');
    }

    public function orderCity()
    {
        return $this->belongsTo(City::class,'city');
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class);  
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);  
    }

}
