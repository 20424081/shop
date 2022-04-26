<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Category extends Model
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
        'category_name',
        'parent_id',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'parent_id'           => 'integer'
    ];

    /**
     * Accessory validation rules
     */
    public $rules = array(
        'category_name'       => 'required|min:3|max:255',
        'parent_id'           => 'integer|exists:categories,id',
    );

    protected $searchable = [
        'category_name'
    ];

    public function parent_category()
    {
        return $this->belongsTo(Category::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
