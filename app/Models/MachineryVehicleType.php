<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineryVehicleType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function machinery_vehicle_registration()
    {
        return $this->hasMany(MachineryVehicleRegistration::class);
    }
}
