<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Edition;

class Conference extends Model
{
    protected $fillable = ['conference_title', 'acronym'];
    public $timestamps = false;

    public function papers()
    {
        return $this->belongsToMany(Paper::class, 'paper_has_conferences', 'conference_id', 'paper_id');
    }

    public function edition()
    {
        return $this->hasMany(Edition::class);
    }
}
