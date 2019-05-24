<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes mass assign
     *
     * @var array
     */
    protected $fillable = [
        'description'
    ];

    /**
     * @param array $data
     * @return mixed
     */
    public static function createNew(array $data)
    {
        return static::create($data);
    }
}
