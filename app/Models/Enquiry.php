<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_name',
        'email',
        'phone',
        'location',
        'inquiry_type',
        'product_or_service_interest',
        'message',
        'status',
        'admin_notes',
        'ip_address',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }
}
