<?php

namespace Codosia\InfyomSettings\models;

use Eloquent as Model;

/**
 * Class Settings
 * @package Codosia\InfyomSettings
 * @version January 7, 2020, 12:59 pm UTC
 *
 * @property string name
 * @property string key
 * @property string type
 * @property string value
 */
class Settings extends Model
{

    public $table = 'settings';



    public $fillable = [
        'name',
        'key',
        'type',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'key' => 'string',
        'type' => 'string',
        'value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:2|max:100',
        'key' => 'required|min:2|max:100|regex:/^\S*$/u',
        'type' => 'required',
        'value' => 'nullable'
    ];

    
}
