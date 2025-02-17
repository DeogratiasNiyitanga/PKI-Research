<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationEntityRequest extends Model
{
    protected $fillable = [
        'organization_id',
        'expiration_id',
        'status'
    ];

    public function organizations()
    {
        return $this->hasMany(OrganizationEntity::class);
    }

    public function expiration()
    {
        return $this->belongsTo(CertificateExpiration::class);
    }
}
