<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrganizationEntity extends Model
{
    protected $fillable = [
        'organization_name',
        'tin',
        'short_name',
        'md_ceo_name',
        'organization_address',
        'status',
    ];

    // Helper method to find organization by TIN
    public static function findByTin($tin)
    {
        return static::where('tin', $tin)->first();
    }
    public function organizationRequests()
    {
        return $this->belongsTo(OrganizationEntityRequest::class);
    }
}
