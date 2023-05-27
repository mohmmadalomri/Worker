<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'name', 'description', 'image', 'price', 'quantity', 'type'
    ];

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id', 'id');

    }

    public function offer()
    {
        return $this->hasMany(OfferPrice::class, 'product_id', 'id');
    }

    public function project()
    {
        return $this->hasMany(Project::class, 'product_id', 'id');
    }

}
