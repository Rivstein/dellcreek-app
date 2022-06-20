<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the highlighted for this property.
     */
    public function highlights()
    {
        return $this->hasMany(HighlightedProperty::class);
    }

    /**
     * Get the images for this property.
     */
    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    /**
     * Get users watching this property.
     */
    public function watchers()
    {
        return $this->belongsToMany(User::class, 'property_watch');
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
