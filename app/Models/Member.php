<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    protected $fillable = [
        'member_number',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'category',
        'membership_level_id',
        'status',
    ];

    public function membershipLevel(): BelongsTo
    {
        return $this->belongsTo(MembershipLevel::class);
    }
}