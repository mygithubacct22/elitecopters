<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class UnitRental extends Model
{
### CONSTANTS

    const ROUND_TRIP_FEE = 500;

    const HELI_LOCATIONS = [
        'Alabang'  => 'Alabang',
        'Pasay'    => 'Pasay',
        'Ortigas'  => 'Ortigas',
        'Makati'   => 'Makati',
        'Pampanga' => 'Pampanga',
        'Subic'    => 'Olongapo',
        'Naia'     => 'NAIA Terminal',
    ];

### FIELDS

    protected $collection = 'unit_rentals';

### RELATIONSHIPS
    
    public function booking()
    {
        return $this->hasMany(Booking::class, 'unit_rental_id', '_id');
    }

### METHODS

}
