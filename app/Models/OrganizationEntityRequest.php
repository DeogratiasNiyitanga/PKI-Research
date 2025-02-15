<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationEntityRequest extends Model
{
    protected $fillable = [
        'organization_id'
    ];

    public function organizations()
    {
        return $this->hasMany(OrganizationEntity::class);
    }
}
