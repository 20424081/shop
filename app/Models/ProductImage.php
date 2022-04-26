<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class ProductImage extends Model
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
        'product_info_id',
        'url_image'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_info_id'  => 'integer'
    ];

    /**
     * Accessory validation rules
     */
    public $rules = array(
        'url_image'          => 'required|min:3|max:255',
        'product_info_id'    => 'required|integer|exists:product_infos,id',

    );

    protected $searchable = [];

    public function product_info()
    {
        return $this->belongsTo(ProductInfo::class);
    }
}
