<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'class', 
        'discipline', 
        'institution', 
        'game_name', 
        'password',
        'knowledge_area',
        'level_of_education_id',
        'evaluator_id', 
        'standard_questionnaire_id', 
        'course', 
        'date', 
        'created_at', 
        'updated_at'
    ];

    public function extraquestions()
    {
        return $this->hasMany(ExtraQuestionnaireItem::class);
    }

    public function evaluator()
    {
        return $this->belongsTo(Evaluator::class);
    }

    public function standardquestionnaire()
    {
        return $this->belongsTo(StandardQuestionnaire::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
