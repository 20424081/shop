<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;
use Watson\Validating\ValidatingTrait;

class Role extends SpatieRole
{
    use ValidatingTrait;
    protected $guarded = [];
    protected $guard_name = 'web';
    /**
     * Accessory validation rules
     */
    public $rules = array();
    //
}
