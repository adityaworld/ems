<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Models\Subject;
use App\Models\Question;
use App\Models\UserExam;
use App\Models\Exam;
use DB;
class StudentController extends Controller
{
     public function index(){
        $title = "All Examination";
        $details = DB::table('exams')
        ->select('exams.*','subjects.subject_name as subjectsname')
        ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
        ->orderby('exams.id','DESC')
        ->paginate(25);
        return view('student.alltest', compact('title','details'));

      }


      public function give($id){
		$title = "Give Exam";
        if($id != 0){
            $testdata = Exam::where('id',$id)->get();
            if(!$testdata->isEmpty()){
             $questiondata = Question::select('id','question','option_one','option_two','option_three','option_four','correct_answer')->where('exam_id',$id)->get();
             if(!$questiondata->isEmpty()){
              if($testdata[0]['thumbnail']){
               $testdata[0]['thumbnail'] = url('/public/test/').'/'.$testdata[0]['thumbnail'];
           }else{
               $testdata[0]['thumbnail'] = url('/public/admin/images/samples/origami.jpg');
           }
          }
          if(count($questiondata) > 0 ){
            $alldata['testdetails'] = $testdata;
            $alldata['allquestions'] = $questiondata;
            $title = $testdata[0]['name']. "Exam";
            return view('student.exams.give', compact('title','alldata'));
          }else{
            return Redirect::back()->with('err', 'Questions not found.');
          }
          }else{
              return Redirect::back()->with('err', 'Test not found.');
          
          }
          
          
          }else{
              return Redirect::back()->with('err', 'Data not found.');
          
          }
		
		
	}

   
}

