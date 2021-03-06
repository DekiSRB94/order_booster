<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Client extends Model
{
	 use SearchableTrait;

	  protected $searchable = [
        'columns' => [
            'phone' => 1,         
        ]
    ];

    protected $fillable = [
        'address', 'phone', 'flat_number', 'floor', 'intercom', 'user_id',
    ];
}
