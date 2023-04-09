<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferPrice extends Model
{
    use HasFactory;
    protected $fillable=[
        'customer_id','company_id','title','product_id','price','discount',
        'tax','message','address'
    ];


    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'company_id','id');
    }
}
