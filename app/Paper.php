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
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function conferences()
    {
        return $this->belongsToMany(Conference::class, 'connection_2s', 'paper_id', 'conf_id');
    }

    public function editions()
    {
        return $this->belongsToMany(Edition::class, 'connection_2s', 'paper_id', 'edi_id');
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'paper_has_keywords', 'paper_id', 'keyword_id');
    }
}