<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Watson\Validating\ValidatingTrait;

class Permission extends SpatiePermission
{
    //
    use ValidatingTrait;
    // protected $guard_name = '*';
    /**
     * Accessory validation rules
     */
    public $rules = array();
    //
}
