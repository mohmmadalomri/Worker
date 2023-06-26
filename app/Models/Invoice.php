<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $guarded = [];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'invoice_order', 'invoice_id', 'order_id');
    }

    public function project()
    {
        return $this->hasMany(Project::class, 'id', 'project_id');
    }
}
