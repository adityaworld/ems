<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = ['subject_id','thumbnail','exam_name','description','total_marks','pass_marks','duration','eatch_questions_marks'];
     

}
