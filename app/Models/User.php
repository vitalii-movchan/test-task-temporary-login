<?php

namespace App\Models;

/**
 * @property int id
 * @property string name
 * @property string phone
 */
class User extends \Illuminate\Foundation\Auth\User
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'name' => 'string',
            'phone' => 'string',
        ];
    }
}
