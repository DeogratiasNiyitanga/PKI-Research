<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualEntity extends Model
{
    protected $fillable = [
        'applicant_name',
        'national_id',
        'address',
        'mobile_number',
        'email',
        'status'
    ];

    // Scope to get records by status
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function applicationRequests()
    {
        return $this->belongsTo(IndividualEntity::class);
    }
}
