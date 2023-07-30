<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'site_setting_id',
        'input',
        'type' // listing / archiving
    ];

}
