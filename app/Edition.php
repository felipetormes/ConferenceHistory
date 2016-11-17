<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Conference;

class Edition extends Model
{
    protected $fillable = ['edition', 'host_city', 'host_country', 'year'];
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function Conference()
    {
        return $this->belongsTo(Conference::class);
    }
}
