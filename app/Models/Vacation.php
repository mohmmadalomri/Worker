<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    use HasFactory;
    protected $fillable=['employee_name','employee_id','national_number','Job_number',
        'specialization','description','reason','image','start_day','type','end_day'];

    public function user(){
        return $this->belongsTo(User::class,'employee_id','id');
    }
}
