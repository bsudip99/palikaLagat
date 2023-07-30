<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function institution_operator()
    {
        return $this->hasOne(InstitutionOperator::class);
    }

    public function institution_contact_person()
    {
        return $this->hasOne(InstitutionContactPerson::class);
    }

    public function institution_tax()
    {
        return $this->hasOne(InstitutionTax::class);
    }

    public function institution_license()
    {
        return $this->hasOne(InstitutionLicense::class);
    }

    public function institution_documents()
    {
        return $this->hasMany(InstitutionDocument::class);
    }

    public function institution_machineries()
    {
        return $this->hasOne(InstitutionMachinery::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function labour_certificates()
    {
        return $this->hasOne(LabourCertificate::class);
    }
}
