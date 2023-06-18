<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable=['company_id','customer_id','title',
        'date','remaining_amount',
        'order_id','value','discount','tax','total','massage','amount','project_id'
    ];
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function company(){
        return $this->belongsTo(User::class,'company_id','id');
    }

    public function order(){
        return $this->belongsToMany(Order::class,'invoice_order','invoice_id','order_id');
    }

    public function project(){
        return $this->hasMany(Project::class,'id','project_id');
    }
}
