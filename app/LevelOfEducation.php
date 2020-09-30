<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelOfEducation extends Model
{
    protected $fillable = [
        'name', 
        'created_at', 
        'updated_at'
    ];

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
