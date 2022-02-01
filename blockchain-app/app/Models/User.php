<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];
    protected $fillable = [
        'metamask'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }

      /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function characters(){
        return $this->hasMany(UserCharacter::class, 'user_id', 'id');
    }

    public function charactersNotInTransport(){
        return$this->hasMany(UserCharacter::class, 'user_id', 'id')->where('user_transport_id', null);
    }

    public function transports(){
        return $this->hasMany(UserTransport::class, 'user_id', 'id');
    }

    public function transportsNotInFleet(){
        return $this->hasMany(UserTransport::class, 'user_id', 'id')->where('user_fleet_id', null);
    }

    public function objects(){
        return $this->hasMany(UserObject::class, 'user_id', 'id');
    }

    public function objectsNotInFleet(){
        return $this->hasMany(UserObject::class, 'user_id', 'id')->where('user_fleet_id', null);
    }

    public function fleets(){
        return $this->hasMany(UserFleet::class, 'user_id', 'id');
    }

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
