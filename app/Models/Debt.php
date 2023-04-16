<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    protected $fillable = ['employee_name', 'employee_id', 'Job_number', 'national_number',
        'description', 'specialization', 'image', 'date','value'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}
