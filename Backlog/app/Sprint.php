<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 

class Sprint extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];


    /**
     * Get the tasks for the blog post.
     */
    public function tasks()
    {
        return $this->hasMany('App\Backlog');
    }

    /**
     * Get the status that owns the comment.
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

} 