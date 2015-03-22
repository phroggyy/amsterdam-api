<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Apps_delegate_task2_committee extends Model {

    protected $table = 'apps_delegate_task2_committees';

    protected $guarded = [
        'id'
    ];

    public function links(){
        return $this->hasMany('App\Apps_delegate_task2_link', 'committee');
    }

}