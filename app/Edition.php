<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Conference;

class Edition extends Model
{
    protected $fillable = ['edition_name', 'host_city', 'host_country', 'initial_date', 'final_date'];
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function conferences()
    {
        return $this->belongsToMany(Conference::class, 'connection_2s', 'edi_id', 'conf_id');
    }

    public function papers()
    {
        return $this->belongsToMany(Paper::class, 'connection_2s', 'edi_id', 'paper_id');
    }
}
