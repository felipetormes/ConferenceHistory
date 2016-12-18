<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection_1 extends Model
{
    public function connection_2s()
    {
        return $this->belongsToMany(Connection_2::class, 'connection_3s', 'connect_1_id', 'connect_2_id');
    }
}
