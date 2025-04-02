<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperRack
 */
class Rack extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function rows(): HasMany
    {
        return $this->hasMany(Row::class);
    }

    /**
     *  Get the pivot of all modules installed in the rack, which
     *  contains which row and position of the module in the rack.
     *
     * @return HasMany<RackedModule>
     */
    public function rackedModules(): HasMany
    {
        return $this->hasMany(RackedModule::class);
    }

    /**
     * Get the modules that are installed in the rack.
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
