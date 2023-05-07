<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'customer_id', 'product_id', 'description',
        'image', 'grope_id', 'admin', 'price', 'total_price',
        'user_id', 'began_date', 'end_date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id', 'customer_id');
    }
}
