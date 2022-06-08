<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the highlighted for the property.
     */
    public function highlights()
    {
        return $this->hasMany(HighlightedProperty::class);
    }

    /**
     * Get the images for the property.
     */
    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
}
