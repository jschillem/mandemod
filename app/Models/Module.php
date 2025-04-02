<?php

namespace App\Models;

use App\Enums\ModuleFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperModule
 */
class Module extends Model
{
    /** @use HasFactory<\Database\Factories\ModuleFactory> */
    use HasFactory;

    protected function casts()
    {
        return [
            'format' => ModuleFormat::class,
        ];
    }

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
     * Get the categories that the module belongs to.
     *
     * This is a many-to-many relationship through the `category_module` pivot table.
     *
     * @return BelongsToMany<Category>
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_module')
            ->withTimestamps();
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
