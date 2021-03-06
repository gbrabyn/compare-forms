<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PersonExperience extends Model
{
    protected $table = 'PersonExperience';

    public $timestamps = false;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'languages' => 'array',
        'additionalLanguages' => 'array',
        'experience' => 'array',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

}
