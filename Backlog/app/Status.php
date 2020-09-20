<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 

class Status extends Model
{
   /**
     * Get the sprints record associated with the status.
     */
    public function sprints()
    {
        return $this->hasMany('App\Sprint');
    }
}
