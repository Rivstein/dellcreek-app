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
}
