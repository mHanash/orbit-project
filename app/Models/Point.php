<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Point extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    /**
     * Get all of the departFlights for the Point
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departFlights(): HasMany
    {
        return $this->hasMany(Flight::class, 'initial_point_id', 'id');
    }

    /**
     * Get all of the finalFights for the Point
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function finalFights(): HasMany
    {
        return $this->hasMany(Flight::class, 'final_point_id', 'id');
    }
}
