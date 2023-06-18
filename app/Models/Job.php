<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable=['title','Instructions','work','product_id','subtotal',
        'schedule','group_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

}
