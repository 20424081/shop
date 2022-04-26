<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class ProductType extends Model
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
        'product_type_name'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Accessory validation rules
     */
    public $rules = array(
        'product_type_name'          => 'required|min:3|max:20',
    );

    protected $searchable = [];
}
