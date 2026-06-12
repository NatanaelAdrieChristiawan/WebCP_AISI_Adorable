<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'certificate_name', 'issuing_body', 'certificate_number',
        'valid_from', 'valid_until', 'certificate_file', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_active'   => 'boolean',
        'valid_from'  => 'date',
        'valid_until' => 'date',
    ];
}
