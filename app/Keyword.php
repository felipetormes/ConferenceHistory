<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = ['keyword'];
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function papers()
    {
        return $this->belongsToMany(Paper::class, 'paper_has_keywords', 'keyword_id', 'paper_id');
    }
}
