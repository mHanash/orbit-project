<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirplaneType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'countSeat'
    ];

    /**
     * The airlines that belong to the AirplaneType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function airlines(): BelongsToMany
    {
        return $this->belongsToMany(AirplaneType::class, 'airline_airplane_types', 'airplane_type_id', 'airline_id');
    }

    /**
     * Get all of the flights for the AirplaneType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flights(): HasMany
    {
        return $this->hasMany(Flight::class, 'airplane_type_id', 'id');
    }
}
