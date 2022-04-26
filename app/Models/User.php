<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Watson\Validating\ValidatingTrait;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use ValidatingTrait;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasPermissionTo($permission, $guardName = '*'): bool
    {
        // Since this method comes from a trait,
        // you cannot simply `parent::hasPermissionTo($permission, '*')`.
        // You'll have to copy the entire body of the method into yours.
        // Just replace '*' with the "guard" name from above.
    }

    protected function getDefaultGuardName(): string
    {
        return '*';
    }
    public $rules = array();

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function activity_histories()
    {
        return $this->hasMany(ActivityHistory::class);
    }
}
