<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'type' //inside OR outside
    ];

    public function sub_categories()
    {
        return $this->belongsToMany(Subcategory::class);
    }

    public function institutions()
    {
        return $this->hasMany(Institution::class);
    }
}
