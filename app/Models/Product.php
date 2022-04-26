<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Product extends Model
{
    //
    use ValidatingTrait;
    use FullTextSearch;

    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name',
        'thumbnail_image',
        'product_company_id',
        'category_id',
        'product_type_id',
        'import_price',
        'price',
        'discount',
        'discount_number',
        'description',
        'total_quantity'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_company_id'   => 'integer',
        'category_id'          => 'integer',
        'product_type_id'      => 'integer',
        'import_price'         => 'double',
        'price'                => 'double',
        'discount'             => 'boolean',
        'discount_number'      => 'double',
        'total_quantity'       => 'integer'
    ];

    /**
     * Accessory validation rules
     */
    public $rules = array(
        'product_name'          => 'required|min:3|max:255',
        'thumbnail_image'       => 'required|max:255',
        'product_company_id'    => 'required|integer|exists:product_companies,id',
        'category_id'           => 'required|integer|exists:categories,id',
        'product_type_id'       => 'required|integer|exists:product_types,id',
        'import_price'          => 'required|numeric|min:0',
        'price'                 => 'required|numeric|min:0',
        'discount'              => 'required|boolean',
        'discount_number'       => 'required|numeric|min:0',
        'total_quantity'        => 'required|integer|min:0'
    );

    protected $searchable = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product_type()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function product_company()
    {
        return $this->belongsTo(ProductCompany::class);
    }

    public function product_infos()
    {
        return $this->hasMany(ProductInfo::class);
    }
}
