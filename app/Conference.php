<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Edition;

class Conference extends Model
{
    protected $fillable = ['conference_name'];
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function editions()
    {
        return $this->belongsToMany(Edition::class, 'connection_2s', 'conf_id', 'edi_id');
    }

    public function papers()
    {
        return $this->belongsToMany(Paper::class, 'connection_2s', 'conf_id', 'paper_id');
    }
}
