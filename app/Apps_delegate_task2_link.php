<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Apps_delegate_task2_link extends Model {

    protected $table = 'apps_delegate_task2_links';

	protected $guarded = [
        'id'
    ];

    public function committee(){
        return $this->belongsTo('App\Apps_delegate_task2_committee', 'committee');
    }

}
