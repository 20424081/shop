<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class ProductInfo extends Model
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
        'product_id',
        'size',
        'quantity',
        'color'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_id'  => 'integer',
        'size'        => 'integer',
        'quantity'    => 'integer',
    ];

    /**
     * Accessory validation rules
     */
    public $rules = array(
        'product_id'    => 'required|integer|exists:products,id',
        'size'          => 'required|integer|min:0',
        'quantity'      => 'required|integer|min:0',
        'color'         => 'required|min:7|max:10|regex:/(^#(?:[0-9a-fA-F]{3}){1,2}$)/u',
    );

    protected $searchable = [];

    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
