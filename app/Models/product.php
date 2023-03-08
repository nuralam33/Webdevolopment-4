<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class,);
    }
    
}
