<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    /** @use HasFactory<\Database\Factories\ModuleFactory> */
    use HasFactory;

    /**
     * Get the manufacturer that created the module.
     *
     * @return BelongsTo<Manufacturer>
     */
    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }

    /**
     * Get the pivot of all racks that the module is installed in,
     * which contains the row and position of the module in the rack.
     *
     * @return HasMany<RackedModule>
     */
    public function racked(): HasMany
    {
        return $this->hasMany(RackedModule::class);
    }

    /**
     * Get all of the racks that the module is installed in.
     *
     * @return BelongsToMany<Rack>
     */
    public function racks(): BelongsToMany
    {
        return $this->belongsToMany(Rack::class, 'module_rack')
            ->withPivot('row_id', 'position_hp')
            ->withTimestamps();
    }
}
