<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'title', 'description', 'customer_id', 'date', 'group_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'company_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}
