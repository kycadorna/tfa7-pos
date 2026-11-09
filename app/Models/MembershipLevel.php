<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MembershipLevel extends Model
{
    protected $fillable = [
        'level_name',
        'fee',
        'validity_period',
        'benefits',
    ];

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }
}