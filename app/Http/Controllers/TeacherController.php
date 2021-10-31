<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Models\Subject;
use App\Models\Question;
use App\Models\UserExam;
use App\Models\Exam;
use DB;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    
        public function index(){
          $title = "All Examination";
          $details = DB::table('exams')
          ->select('exams.*','subjects.subject_name as subjectsname')
          ->join('subjects', 'exams.subject_id', '=', 'subjects.id')
          ->orderby('exams.id','DESC')
          ->paginate(25);
          return view('teacher.alltest', compact('title','details'));

        }
        public function addtest(){
                $title = "Create Test";
                $subject = Subject::get();
                return view('teacher.createtest', compact('title','subject'));

        }
        public function savetest(Request $request){
                $picname = "";
                $this->validate($request, [
                 'exam_name' => 'required|min:3',
                 'description' => 'required|min:10',
                 'total_marks' => 'required|numeric|min:2',
                 'pass_marks' => 'required|numeric|min:1',
                 'eatch_questions_marks' => 'required|numeric|min:1',
                 'duration' => 'required|numeric|min:2',
                 'photo' => 'mimes:jpg,jpeg,png|max:1024',
                 'subject_id'=>'required'
               ],[   
                 'photo.mimes' => 'Thumbnail picture must be a file of type: jpg, jpeg, png.',
                 'photo.max'  => 'Thumbnail picture size must be less than 1 Mb.',
                 'exam_name.required' => 'Examination Name is Required',
                 'exam_name.min' => 'Examination Name At least 3 carrectes',
                 'total_marks.required' => 'Total marks is Required',
                 'total_marks.numeric' => 'Total marks mustbe numeric',
                 'total_marks.min' => 'Total marks at least 2 carrectes',
                 'pass_marks.required' => 'Pass marks is Required',
                 'pass_marks.numeric' => 'Pass marks mustbe numeric',
                 'pass_marks.min' => 'Pass marks at least 1 carrectes',
                 'subject_id.required'=>'Examination Subject is required'
               
               ]);
               
                if($request->file()) {
                 $picname = Str::uuid().'.'.$request->file('photo')->extension(); 
                 $request->file('photo')->move(public_path('test'), $picname);
               }
               
               $user = Exam::create([
                 'exam_name' => $request->exam_name,
                 'description' => $request->description,
                 'total_marks' => $request->total_marks,
                 'pass_marks' => $request->pass_marks,
                 'duration' => $request->duration,
                 'thumbnail' => $picname,
                 'eatch_questions_marks' => $request->eatch_questions_marks,
                 'user_id' => auth()->user()->id,
                 'subject_id' => $request->subject_id
               
               ]);
               return Redirect::back()->with('success', 'Examination Added Succssfully.');

        }
        public function edittest(){


        }
        public function updatetest(){


        }
        public function deletetest(){


        }


            

        public function addquestion($id){
          $title = "Add Question";
          $examdata =  Exam::findOrFail($id);
          return view('teacher.addquestion', compact('title','examdata'));

        }
        public function savequestion(Request $request,$id){
          $examdata =  Exam::findOrFail($id);
          if($examdata){
              $this->validate($request, [
               'question' => 'required',
               'optionone' => 'required',
               'optiontwo' => 'required',
               'optionthree' => 'required',
               'optionfour' => 'required',
               'correctanswer' => 'required|numeric|max:4',
           ],[   
               'optionone.required' => 'Option one is required.',
               'optiontwo.required'  => 'Option two is required.',
               'optionthree.required' => 'Option three is required',
               'optionfour.required' => 'Option four is required',
               'correctanswer.required' => 'Correct answer is required',
               'correctanswer.numeric' => 'Correct answer must be numeric',
               'correctanswer.min' => 'please select proper correct answer',
         
           ]);
         
              $data = Exam::where('id',$id)->get();
              $addquestion = Question::create([
                 'question' => trim($request->question),
                 'option_one' => trim($request->optionone),
                 'option_two'	 => trim($request->optiontwo),
                 'option_three'	 => trim($request->optionthree),
                 'option_four'	 => trim($request->optionfour),
                 'correct_answer' => trim($request->correctanswer),
                 'exam_id' => $id,
             ]);
         
              return Redirect::back()->with('success', 'New Question Added To '.$examdata['exam_name'].' Succssfully.');

        }
      }

      public function getquestionswithtestdetails($id =0){
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
       
       $alldata['testdetails'] = $testdata;
       $alldata['allquestions'] = $questiondata;
      //  dd($testdata);
       
       $title = $testdata[0]['name']. "Exam";
       return view('teacher.allquestions', compact('title','alldata'));
       
       }else{
           return Redirect::back()->with('err', 'Test not found.');
       
       }
       
       
       }else{
           return Redirect::back()->with('err', 'Data not found.');
       
       }
       }

        public function editquestion($id =0){
          if($id != 0){
            $qdata = Question::where('id',$id)->get();
            $title = "Edit Question";
            return view('teacher.editquestion', compact('title','qdata'));
          
          }else{
              return Redirect::back()->with('err', 'Unauthorized access.');
          }

        }
        public function updatequestion(Request $request,$id){
          $this->validate($request, [
            'question' => 'required',
            'optionone' => 'required',
            'optiontwo' => 'required',
            'optionthree' => 'required',
            'optionfour' => 'required',
            'correctanswer' => 'required|numeric|max:4',
        ],[   
            'optionone.required' => 'Option one is required.',
            'optiontwo.required'  => 'Option two is required.',
            'optionthree.required' => 'Option three is required',
            'optionfour.required' => 'Option four is required',
            'correctanswer.required' => 'Correct answer is required',
            'correctanswer.numeric' => 'Correct answer must be numeric',
            'correctanswer.min' => 'please select proper correct answer',

        ]);

        $questionf = Question::where('id',$id)->get();
        if(!$questionf->isEmpty()){
            $editabledata =  Question::findOrFail($id);
            $editabledata->question = trim($request->question);
            $editabledata->option_one = trim($request->optionone);
            $editabledata->option_two     = trim($request->optiontwo);
            $editabledata->option_three   = trim($request->optionthree);
            $editabledata->option_four    = trim($request->optionfour);
            $editabledata->correct_answer = trim($request->correctanswer);
            $editabledata->save();

            return Redirect::back()->with('success', 'Question Updated Succssfully.');
        }else{
         return Redirect::back()->with('err', 'Question not found.');
     }

        }
        public function deletequestion($id){
          DB::table('questions')->where('id',$id)->delete();
          return Redirect::back()->with('msg', 'Question Deleted Succssfully.');

        }

}
