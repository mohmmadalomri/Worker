<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'image', 'name', 'description'];


    public function company()
    {
        return $this->belongsTo(User::class, 'company_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id');

    }
}
