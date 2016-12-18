<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Institution;

class Department extends Model
{
    protected $fillable = ['department_name', 'department_country'];
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function institutions()
    {
        return $this->belongsToMany(Institution::class, 'connection_1s', 'depart_id', 'inst_id');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'connection_1s', 'depart_id', 'author_id');
    }
}
