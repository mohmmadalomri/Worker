<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salarie extends Model
{
    use HasFactory;
    protected $fillable=[
        'employee_id','start_day','Job_number','employee_name',
        'national_number','section_id','status',
        'deductions','discounts','tax','social_security','net_salary','end_day'
    ];

    public function employee(){
        return $this->belongsTo(User::class,'employee_id','id');
    }
}
