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

    public function editions()
    {
        return $this->belongsTo(Edition::class);
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'paper_has_keywords', 'paper_id', 'keyword_id');
    }
}
