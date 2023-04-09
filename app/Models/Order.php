<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'title','details','notes','date','begin_date','customer_id','company_id',
        'group_id'
    ];


    public function invoice(){
        return $this->hasOne(Invoice::class,'customer_id','id');
    }
}
