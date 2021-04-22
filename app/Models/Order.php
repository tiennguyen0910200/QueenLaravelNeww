<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = ['user_id', 'vendor_id', 'username', 'phone_number', 'address', 'order_time', 'quantity_mam', 'note'];

    public function user(){
        return $this->hasOne("App\User","id","user_id");
    }

    public function vendor(){
        return $this->hasOne("App\Vendor","id","vendor_id");
    }
}
