<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskEmployee extends Model
{
    use HasFactory;
    protected $fillable=['user_id','employee_name','national_number','Job_number',
        'name','description','image','massage'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
