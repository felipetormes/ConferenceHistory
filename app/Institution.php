<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
use App\Author;
use App\Paper;

class Institution extends Model
{
    protected $fillable = ['institution_name', 'institution_country'];
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'connection_1s', 'inst_id', 'depart_id');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'connection_1s', 'inst_id', 'author_id');
    }
}
