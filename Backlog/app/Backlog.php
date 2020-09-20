<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backlog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'Title', 'Description','sprint_id'
    ];

 
    /**
     * Get the sprint that owns the task.
     */
    public function sprint()
    {
        return $this->belongsTo('App\Sprint');
    }


    /**
     * Get the estimate for task.
     */
    public function estimate()
    {
        return $this->hasOne('App\Estimate');
    }

}


