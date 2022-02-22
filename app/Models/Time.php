<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Time extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //name

    protected $fillable = [
        'id', 'shopId', 'workerId', 'date',
        't00h00', 't00h10', 't00h20', 't00h30', 't00h40', 't00h50',
        't01h00', 't01h10', 't01h20', 't01h30', 't01h40', 't01h50',
        't02h00', 't02h10', 't02h20', 't02h30', 't02h40', 't02h50',
        't03h00', 't03h10', 't03h20', 't03h30', 't03h40', 't03h50',
        't04h00', 't04h10', 't04h20', 't04h30', 't04h40', 't04h50',
        't05h00', 't05h10', 't05h20', 't05h30', 't05h40', 't05h50',
        't06h00', 't06h10', 't06h20', 't06h30', 't06h40', 't06h50',
        't07h00', 't07h10', 't07h20', 't07h30', 't07h40', 't07h50',

        't08h00', 't08h10', 't08h20', 't08h30', 't08h40', 't08h50',
        't09h00', 't09h10', 't09h20', 't09h30', 't09h40', 't09h50',
        't10h00', 't10h10', 't10h20', 't10h30', 't10h40', 't10h50',
        't11h00', 't11h10', 't11h20', 't11h30', 't11h40', 't11h50',
        't12h00', 't12h10', 't12h20', 't12h30', 't12h40', 't12h50',
        't13h00', 't13h10', 't13h20', 't13h30', 't13h40', 't13h50',
        't14h00', 't14h10', 't14h20', 't14h30', 't14h40', 't14h50',
        't15h00', 't15h10', 't15h20', 't15h30', 't15h40', 't15h50',

        't16h00', 't16h10', 't16h20', 't16h30', 't16h40', 't16h50',
        't17h00', 't17h10', 't17h20', 't17h30', 't17h40', 't17h50',
        't18h00', 't18h10', 't18h20', 't18h30', 't18h40', 't18h50',
        't19h00', 't19h10', 't19h20', 't19h30', 't19h40', 't19h50',
        't20h00', 't20h10', 't20h20', 't20h30', 't20h40', 't20h50',
        't21h00', 't21h10', 't21h20', 't21h30', 't21h40', 't21h50',
        't22h00', 't22h10', 't22h20', 't22h30', 't22h40', 't22h50',
        't23h00', 't23h10', 't23h20', 't23h30', 't23h40', 't23h50',
        

    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

}