<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateExpiration extends Model
{
    protected $fillable = ['certificate_duration', 'status'];

    public function individualEntityRequests()
    {
        return $this->hasMany(IndividualEntityRequest::class);
    }

    public function organizationEntityRequests()
    {
        return $this->hasMany(OrganizationEntityRequest::class);
    }
}
