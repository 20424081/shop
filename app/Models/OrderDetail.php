<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class OrderDetail extends Model
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
        'order_id',
        'product_info_id',
        'quantity',
        'cost',
        'discout_value'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'order_id'             => 'integer',
        'product_info_id'      => 'integer',
        'quantity'             => 'integer',
        'cost'                 => 'double',
        'discout_value'        => 'double',
    ];

    /**
     * Accessory validation rules
     */
    public $rules = array(
        'order_id'           => 'required|integer|exists:orders,id',
        'product_info_id'    => 'required|integer|exists:product_infos,id',
        'quantity'           => 'required|integer|min:0',
        'cost'               => 'required|numeric|min:0',
        'discout_value'      => 'numeric|min:0',

    );

    protected $searchable = [];

    public function order()
    {
        return $this->belongsTo(Category::class);
    }
}
