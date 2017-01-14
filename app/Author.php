<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Institution;
use App\Paper;

class Author extends Model
{
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'author_country'];

    public function institutions()
    {
        return $this->belongsToMany(Institution::class, 'institutions_has_authors', 'author_id', 'institution_id');
    }

    public function papers()
    {
        return $this->belongsToMany(Paper::class, 'paper_has_authors', 'author_id', 'paper_id');
    }
}
