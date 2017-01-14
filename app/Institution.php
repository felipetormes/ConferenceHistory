<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
use App\Author;
use App\Paper;

class Institution extends Model
{
    protected $fillable = ['institution_name', 'institution_country'];

    public function department()
    {
        return $this->hasMany(Department::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'institutions_has_authors', 'institution_id', 'author_id');
    }
}
