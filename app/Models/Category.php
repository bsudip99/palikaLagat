<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function category_types()
    {
        return $this->hasMany(CategoryType::class);
    }

    public function site_settings()
    {
        return $this->belongsToMany(SiteSetting::class);
    }
}
