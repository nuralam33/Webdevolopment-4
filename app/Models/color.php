<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    use HasFactory;

    protected $guarded = [
        'name',
        'color',
        'status'
    ];
public function category()
{
    return $this->belongsTo(Category::class);
}
}
