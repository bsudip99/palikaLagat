<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'province',
        'district',
        'palika',
        'office_address',
        'phone',
        'email',
        'branch_head_name',
        'branch_head_name_in_english',
        'branch_head_position',
        'branch_head_position_in_english',
        'branch_head_phone',
        'branch_head_signature',
        'branch_stamp',
        'branch_stamp_english',
        'status'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function institutions()
    {
        return $this->hasMany(Institution::class);
    }
}
