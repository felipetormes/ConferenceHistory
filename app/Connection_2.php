<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection_2 extends Model
{
    public function connection_1s()
    {
        return $this->belongsToMany(Connection_1::class, 'connection_3s', 'connect_2_id', 'connect_1_id');
    }
}
