<?php

namespace App;

use App\Traits\ScopeModel;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use ScopeModel;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes mass assign
     *
     * @var array
     */
    protected $fillable = [
        'role_name'
    ];

    /**
     * Get list
     *
     * @return mixed
     */
    public static function getList()
    {
        return static::descendingOrder()->get();
    }

    /**
     * Update resource
     *
     * @param array $data
     * @return mixed
     */
    public static function edit(array $data)
    {
        return tap(static::findOrFail($data['id']), function($role) use ($data){
            $role->update($data);
        });

        // return tap(static::findOrFail($data['id']))->update($data);
    }

}
