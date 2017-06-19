<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class OrderItems extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="order_items";
    protected $fillable = [
        'order_id',
        'name',
        'price',
        'quantity'
    ];
    protected $updated_at=false;
    protected $created_at=false;
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
}
