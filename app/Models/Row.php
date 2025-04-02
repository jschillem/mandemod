<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Row extends Model
{
    /**
     * Get the rack that the row belongs to.
     *
     * @return BelongsTo<Rack>
     */
    public function rack(): BelongsTo
    {
        return $this->belongsTo(Rack::class);
    }

    /**
     * Get the pivot of all modules installed in the row, which
     * contains which rack and position of the module in the row.
     *
     * @return HasMany<RackedModule>
     */
    public function rackedModules(): HasMany
    {
        return $this->hasMany(RackedModule::class);
    }

    /**
     * Get all of the modules that are installed in the row.
     *
     * @return BelongsToMany<Module>
     */
    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'module_rack')
            ->withPivot('row_id', 'position_hp')
            ->withTimestamps();
    }
}
