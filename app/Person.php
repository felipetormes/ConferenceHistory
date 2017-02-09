<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Institution;
use App\Paper;

class Person extends Model
{
    protected $fillable = ['first_name', 'middle_name', 'last_name'];
    public $timestamps = false;

    public function institutions()
    {
        return $this->belongsToMany(Institution::class, 'authors', 'person_id', 'institution_id');
    }

    public function papers()
    {
        return $this->belongsToMany(Paper::class, 'authors', 'person_id', 'paper_id');
    }
}
