<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $table = 'employer';

    protected $fillable = ['name', 'company_organization', 'department_division', 'position', 'years_in_position', 'email', 'tel', 'fax', 'organization', 'staff', 'majors', 'evaluated', 'number_of_engineers', 'percentage', 'important_1', 'important_2', 'important_3', 'important_4', 'important_5', 'important_6', 'important_7', 'important_8', 'important_9', 'important_10', 'important_11', 'important_12', 'important_13', 'important_14', 'important_15', 'prepared_1', 'prepared_2', 'prepared_3', 'prepared_4', 'prepared_5', 'prepared_6', 'prepared_7', 'prepared_8', 'prepared_9', 'prepared_10', 'prepared_11', 'prepared_12', 'prepared_13', 'prepared_14', 'prepared_15', 'significant_1', 'significant_2', 'significant_3', 'significant_4', 'significant_5', 'significant_6', 'objectives_important_1', 'objectives_important_2', 'objectives_important_3', 'objectives_important_4', 'objectives_important_5', 'objectives_important_6', 'abilities_knowledge', 'compare_a', 'compare_b', 'necessary', 'specify', 'hiring', 'particular_strengths', 'preparation', 'summary_report', 'participating', 'staff_others', 'organization_others'];

}
