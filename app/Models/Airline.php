<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Airline extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'country'
    ];

    /**
     * The airplaneType that belong to the Airline
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function airplaneTypes(): BelongsToMany
    {
        return $this->belongsToMany(AirplaneType::class, 'airline_airplane_types', 'airline_id', 'airplane_type_id');
    }

    /**
     * Get all of the flights for the Airline
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flights(): HasMany
    {
        return $this->hasMany(Flight::class, 'airline_id', 'id');
    }
}
