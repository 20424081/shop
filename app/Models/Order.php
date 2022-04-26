<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Order extends Model
{
    //
    use ValidatingTrait;
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'total_price',
        'total_quantity',
        'delivery_address',
        'receive_date',
        'promise_date',
        'status',
        'notes'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'customer_id'          => 'integer',
        'total_price'          => 'double',
        'total_quantity'       => 'integer',
        'receive_date'         => 'date',
        'promise_date'         => 'date',
        'status'               => 'integer',
        'order_time'           => 'datetime'
    ];


    /**
     * Accessory validation rules
     */
    public $rules = array(
        'customer_id'           => 'required|integer|exists:users,id',
        'total_price'           => 'required|numeric|min:0',
        'total_quantity'        => 'required|integer|min:0',
        'receive_date'          => 'date',
        'promise_date'          => 'date',
        'status'                => 'required|integer|min:0',
        'order_time'            => 'date'
    );

    protected $searchable = [];

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }
}
