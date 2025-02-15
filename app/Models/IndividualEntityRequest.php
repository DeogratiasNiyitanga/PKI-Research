<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualEntityRequest extends Model
{
    protected $fillable = [
        'applicant_id'
    ];

    public function individuals()
    {
        return $this->hasMany(IndividualEntity::class);
    }
}
