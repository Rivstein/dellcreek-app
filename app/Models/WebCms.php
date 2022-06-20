<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebCms extends Model
{
    use HasFactory;

    /**
     * Enable mass assignment
     */

    protected $guarded = [];

    /**
     * Get user who updated this staff.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
