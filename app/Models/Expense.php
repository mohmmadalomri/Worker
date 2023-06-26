<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable=['employee_id','name','description'
        ,'purpose','end_day','value','start_day'];

    public function user(){
        return $this->belongsTo(User::class,'employee_id','id');
    }

}
