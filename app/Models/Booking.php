<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Booking extends Model
{
### CONSTANTS

    const STATUS_PENDING  = 'PENDING';
    const STATUS_BOOKED   = 'BOOKED';
    const STATUS_CANCELED = 'CANCELED';
    const STATUS = [
        self::STATUS_PENDING  => 'Pending',
        self::STATUS_BOOKED   => 'Booked',
        self::STATUS_CANCELED => 'Canceled',
    ];

### FIELDS

    protected $collection = 'bookings';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => self::STATUS_PENDING,
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'booked_date',
        'created_at',
        'updated_at',
        'booked_at',
        'canceled_at',
    ];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    // protected $dateFormat = 'Y-m-d H:i:s';

### RELATIONSHIPS

    public function booker()
    {
        return $this->belongsTo(User::class, 'booker_id', '_id');
    }

    public function bookee()
    {
        return $this->belongsTo(User::class, 'bookee_id', '_id');
    }

    public function canceler()
    {
        return $this->belongsTo(User::class, 'canceler_id', '_id');
    }

    public function unitRental()
    {
        return $this->belongsTo(UnitRental::class, 'unit_rental_id', '_id');
    }

### METHODS

    public function getStatusLabelAttribute()
    {
        return self::STATUS[$this->status] ?? "[{$this->status}]";
    }

    // public function freshTimestamp()
    // {
    //     return new \MongoDB\BSON\UTCDateTime(\Carbon\Carbon::now()->timestamp);
    // }
}
