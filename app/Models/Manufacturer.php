<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperManufacturer
 */
class Manufacturer extends Model
{
    /** @use HasFactory<\Database\Factories\ManufacturerFactory> */
    use HasFactory;

    /**
     * Get the modules made by the manufacturer.
     *
     * @return HasMany<Module>
     */
    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }
}
