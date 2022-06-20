<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get user who created this staff.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
