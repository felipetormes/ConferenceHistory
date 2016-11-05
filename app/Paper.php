<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;
use App\Institution;
use App\Conference;
use App\Keyword;

class Paper extends Model
{
    protected $fillable = ['paper_title'];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'paper_has_authors', 'paper_id', 'author_id');
    }

    public function institutions()
    {
        return $this->belongsToMany(Institution::class, 'paper_has_institutions', 'paper_id', 'institution_id');
    }

    public function conferences()
    {
        return $this->belongsToMany(Conference::class, 'paper_has_conferences', 'paper_id', 'conference_id');
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'paper_has_keywords', 'paper_id', 'keyword_id');
    }
}
