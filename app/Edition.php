<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Conference;

class Edition extends Model
{
    protected $fillable = ['edition_name', 'host_city', 'host_country'];
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function papers()
    {
        return $this->hasMany(Paper::class);
    }

    public function conferences()
    {
        return $this->belongsTo(Conference::class);
    }
}
