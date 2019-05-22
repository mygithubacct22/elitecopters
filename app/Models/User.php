<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User
    extends Authenticatable
    implements JWTSubject
{
    use Notifiable;

### CONSTANTS

    const ROLE_BOOKER = 'BOOKER';
    const ROLE_BOOKEE = 'BOOKEE';
    const ROLES = [
        self::ROLE_BOOKER => 'Booker',
        self::ROLE_BOOKEE => 'Bookee',
    ];

### FIELDS

    protected $collection = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'contact_no',
        'password',
        'bankname',
        'bankacctno'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'role' => self::ROLE_BOOKER,
    ];

### RELATIONSHIPS

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'booker_id', '_id');
    }

    public function reservedBookings()
    {
        return $this->hasMany(Booking::class, 'bookee_id', '_id');
    }

    public function canceledBookings()
    {
        return $this->hasMany(Booking::class, 'canceler_id', '_id');
    }

### METHODS

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
