<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualEntityRequest extends Model
{
    protected $fillable = [
        'applicant_id',
        'expiration_id',
        'status'
    ];

    public function individuals()
    {
        return $this->hasMany(IndividualEntity::class);
    }

    public function expiration()
    {
        return $this->belongsTo(CertificateExpiration::class);
    }
}
