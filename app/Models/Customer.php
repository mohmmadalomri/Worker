<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=[
        'company_id','first_name','last_name','company_name','phone','email','website',
        'facebook_link','tweeter_link','youtube_link','linkedin_link','instgram_link',
        'address_1','address_2','town','interrupt','zipcode','country'

    ];
    public function user(){
        return $this->belongsTo(User::class,'company_id','id');
    }



    public function invoice(){
        return$this->hasOne(Invoice::class,'customer_id','id');
    }
    public function task(){
        return $this->hasMany(Task::class,'customer_id','id');
    }

    public function offer(){
        return $this->hasOne(OfferPrice::class,'customer_id','id');
    }
}
