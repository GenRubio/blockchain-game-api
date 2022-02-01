<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTransport extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'user_transports';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'user_fleet_id',
        'transport_id',
        'live',
    ];
    // protected $hidden = [];
    // protected $dates = [];

    public static function boot()
    {
        parent::boot();
        self::created(function ($userTransport) {
           $userTransport->update([
               'live' => $userTransport->transport->live
           ]);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function fleet(){
        return $this->hasOne(UserFleet::class, 'id', 'user_fleet_id');
    }

    public function transport(){
        return $this->hasOne(Transport::class, 'id', 'transport_id');
    }

    public function characters(){
        return $this->hasMany(UserCharacter::class, 'user_transport_id', 'id');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
