<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperRackedModule
 */
class RackedModule extends Model
{
    protected $table = 'module_rack';

    /**
     * Get the module that is installed in the rack.
     *
     * @return BelongsTo<Module>
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * Get the rack that the module is installed in.
     *
     * @return BelongsTo<Rack>
     */
    public function rack(): BelongsTo
    {
        return $this->belongsTo(Rack::class);
    }

    /**
     * Get the row that the module is installed in.
     *
     * @return BelongsTo<Row>
     */
    public function row(): BelongsTo
    {
        return $this->belongsTo(Row::class);
    }
}
