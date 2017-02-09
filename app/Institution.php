<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
use App\Author;
use App\Paper;

class Institution extends Model
{
    protected $fillable = ['institution_name', 'department', 'country'];
    public $timestamps = false;

    public function persons()
    {
        return $this->belongsToMany(Person::class, 'authors', 'institution_id', 'person_id');
    }

    public function papers()
    {
        return $this->belongsToMany(Paper::class, 'authors', 'institution_id', 'paper_id');
    }
}
