<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;
    protected $fillable=['name','description','image','customer_id'];


    public function coustomer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }


}
