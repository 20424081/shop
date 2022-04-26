<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Validating\ValidatingTrait;

class Todo extends Model
{
    use ValidatingTrait;
    use FullTextSearch;
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task',
        'done',
        'user_id'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'done'              => 'boolean',
        'user_id'           => 'integer'
    ];

    /**
     * Accessory validation rules
     */
    public $rules = array(
        'task'              => 'required|min:3|max:255',
        'done'              => 'required|boolean',
        'user_id'           => 'required|integer|exists:users,id',
    );

    protected $searchable = [
        'task'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
