<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable=['company_id','customer_id','title','date','remaining_amount',
        'order_id','value','discount','tax','total','massage'
    ];
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function company(){
        return $this->belongsTo(User::class,'company_id','id');
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
