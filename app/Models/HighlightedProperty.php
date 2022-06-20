<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighlightedProperty extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the property that owns the highlighted property.
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

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
