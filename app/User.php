<?php

namespace App;

use App\Traits\ScopeModel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use Notifiable, ScopeModel;

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

    /**
     * Mutator password
     *
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Get list of resource
     *
     * @return mixed
     */
    public static function getList()
    {
        return static::descendingOrder()->where('id',1)->get();
    }

    /**
     * Relationship with role
     *
     * @return BelongsToMany
     */
    public function userRoles()
    {
        return $this->belongsToMany('App\Role', 'user_roles', 'user_id');
    }

    /**
     * Store user into storage
     *
     * @param array $data
     * @return mixed
     */
    public static function createNew(array $data)
    {
        $user = static::create($data);
        $user->userRoles()->attach($data['roles']);

        return $user->fresh('userRoles');
    }


    public static function edit(array $data)
    {
        return tap(static::findOrFail($data['id']), function($query) use ($data) {
            $query->userRoles()->sync($data['roles']);
        })->with('userRoles');
    }


}
