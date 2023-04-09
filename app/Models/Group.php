<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'image', 'name', 'description', 'admin'
    ];

    public function task()
    {
        return $this->hasMany(Task::class, 'group_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id', 'id');
    }
}
