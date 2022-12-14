<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumni_form';

    protected $fillable = ['major', 'name', 'gender', 'graduation', 'employer', 'job_title', 'job_description', 'email', 'telephone', 'degrees', 'university', 'employment', 'membership', 'conferences', 'activities', 'connected', 'importance_1', 'importance_2', 'importance_3', 'importance_4', 'importance_5', 'importance_6', 'attainment_1', 'attainment_2', 'attainment_3', 'attainment_4', 'attainment_5', 'attainment_6', 'questions_1', 'questions_2', 'questions_3', 'questions_4', 'questions_5', 'questions_6', 'questions_7', 'programs', 'performance', 'training_course', 'experience_1', 'experience_2', 'experience_3', 'technical_1', 'technical_2', 'technical_3', 'improvements_1', 'improvements_2', 'improvements_3', 'employment_status', 'employer_classification'];
}
