<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class ActivityHistory extends Model
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
        'user_id',
        'type',
        'action',
        'execution_time'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id'           => 'integer',
        'execution_time'    => 'datetime'
    ];

    /**
     * Accessory validation rules
     */
    public $rules = array(
        'user_id'             => 'integer|exists:users,id',
        'type'                => 'required|min:1|max:20',
        'action'              => 'required|min:1|max:255',
        'execution_time'      => 'required|datetime'
    );

    protected $searchable = [
        'category_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
