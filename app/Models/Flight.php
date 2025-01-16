<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'airline_id',
        'airplane_type_id',
        'number',
        'date',
        'price',
        'status',
        'initial_point_id',
        'final_point_id'
    ];

    /**
     * Get all of the reservations for the Flight
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'flight_id', 'id');
    }

    /**
     * Get the airline that owns the Flight
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function airline(): BelongsTo
    {
        return $this->belongsTo(Airline::class, 'airline_id', 'id');
    }

    /**
     * Get the airplaneType that owns the Flight
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function airplaneType(): BelongsTo
    {
        return $this->belongsTo(AirplaneType::class, 'airplane_type_id', 'id');
    }

    /**
     * Get the initialPoint that owns the Flight
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function initialPoint(): BelongsTo
    {
        return $this->belongsTo(Point::class, 'initial_point_id', 'id');
    }

    /**
     * Get the finalPoint that owns the Flight
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finalPoint(): BelongsTo
    {
        return $this->belongsTo(Point::class, 'final_point_id', 'id');
    }
}
