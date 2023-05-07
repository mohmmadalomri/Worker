<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'customer_id', 'product_id', 'description',
        'image', 'grope_id', 'supervisor_id', 'price', 'total_price',
        'user_id', 'began_date', 'end_date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }


}
