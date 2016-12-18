<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Institution;
use App\Paper;

class Author extends Model
{
    protected $fillable = ['first_name', 'middle_name', 'last_name'];
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function institutions()
    {
        return $this->belongsToMany(Institution::class, 'connection_1s', 'author_id', 'inst_id');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'connection_1s', 'author_id', 'depart_id');
    }
}
