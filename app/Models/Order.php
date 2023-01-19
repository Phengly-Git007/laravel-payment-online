<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['name','email','phone','address1','address2','city','country',
                           'user_id','total_price', 'pincode','message','tracking_number','status'];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

}
