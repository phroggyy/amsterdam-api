<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Wp_post extends Model {

    protected $table = 'wp_posts';
	protected $guarded = [
        'id'
    ];

}
