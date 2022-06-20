<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    
    /**
     * Enable mass assignment
     */

    protected $guarded = [];

    /**
     * Get user who created this staff.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get user who updated this staff.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
