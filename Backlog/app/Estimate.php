<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    /**
     * Get task for estimate
     */
    public function task()
    {
        return $this->hasOne('App\Backlog');
    }
}
