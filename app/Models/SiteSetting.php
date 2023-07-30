<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiscal_year'
    ];

    public function category_types()
    {
        return $this->belongsToMany(CategoryType::class);
    }

    public function rate_site_setting()
    {
        return $this->hasOne(RateSiteSetting::class);
    }
}
