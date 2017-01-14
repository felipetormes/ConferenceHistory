<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Institution;

class Department extends Model
{
    protected $fillable = ['department_name'];
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function Institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
