@extends('layouts.admin')
@section('content')
<div>

  <style type="text/css">
    fieldset {
  border: 0;
  margin: 2rem 0;
}

fieldset legend {
  font-weight: 700;
}

.answer__item {
    background-color: #f6f6f6;
    display: block;
    position: relative;
    cursor: pointer;
    padding: 0.75rem 1.25rem;
   margin: 0.25rem 0;
}

/* Hide Radio Buttons and Submit Button */
input[type="radio"], button {
  display: none;
}

/* Any correct answer on any answered question, highlight in light green */
:valid .answer__item--is-correct {     background-color: rgb(28 183 32 / 93%);
    color: #fff; }

/* Show any extra explanatory text */
.answer__reveal-text { display: none; }
:valid .answer__reveal-text { display: block }

/* Any chosen answer, highlight in red */
:checked + .answer__item { color: #ffffff; background-color: #c70000 }

/* Any correctly chosen answer, highlight in bright green */
:checked + .answer__item--is-correct { background-color: #3db540; }

/* Show the icon for the selected answer */
:checked + .answer__item .answer__icon { display: inline-block }


/* prevent chosing another answer once chosen */
:valid { -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none }
:valid + .answer__item { pointer-events: none }

/* keep track of score */
form { counter-reset: quiz-score }
:checked + .answer__item--is-correct { counter-increment: quiz-score }
.score:after { content: counter(quiz-score) "/" attr(data-question-count) }

/* show score once quiz has been completed */
.message { display: none; }
form:valid .message { display: block }
  </style>
	<div class="row" id="basic-table">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Show {{ $title }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @if (Session::has('msg'))
                        <div class = "alert alert-success">
                            <ul>
                                {{  Session::get("msg")  }}
                            </ul>
                        </div>
                        @endif
                        @if (Session::has('err'))
                        <div class = "alert alert-danger">
                            <ul>
                                {{  Session::get("err")  }}
                            </ul>
                        </div>
                        @endif
                        <div >
@php 
$qurl = url('questions')
@endphp
<div class="row">

  <div class="col-md-12 col-sm-12 ">
                            <div class="card m-3">
      <div class="card-content">
                                    <img class="card-img-top img-fluid cover" src="{{ $alldata['testdetails'][0]->thumbnail }}" alt="Card image cap" style="width: 200px" >
                                    <div class="card-body m-2">
                                        <h4 class="card-title">{{ $alldata['testdetails'][0]->exam_name }}</h4>
                                        <p class="card-text">
                                          {{ $alldata['testdetails'][0]['description'] }}
                                        </p>

                                        <div class="bg-info  p-4 rounded">
                                          <p class="text-white">
                                         Total Marks : {{ $alldata['testdetails'][0]['total_marks'] }}
                                        <br>
                                          Pass Masks : {{ $alldata['testdetails'][0]['pass_marks'] }}
                                        <br>
                                         Duration : {{ $alldata['testdetails'][0]['duration'] }} munites
                                         <br>
                                         Questions added : {{ count($alldata['allquestions']) }}
                                        </p>
                                        </div>
                                        
                                        <!-- <button class="btn btn-primary block">Update now</button> -->
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <a class="btn btn-warning btn-block"  href="{{ url('/teacher/addquestion') }}/{{$alldata['testdetails'][0]->id}}">ADD question <i class="fa fa-question" aria-hidden="true"></i></a>
    </div>





    <div class="col-md-12 col-sm-12">
    @foreach($alldata['allquestions'] as $value)



  <fieldset>
    <legend>{!! $value->question !!}</legend>
    <div class="answers">
      <div class="answer" >
        <input type="radio"  id="answer-0-1" value="1" required>
        <label for="answer-0-1"  @if($value->correct_answer == "1")  class="answer__item answer__item--is-correct rounded" @else class="answer__item"  @endif>
                   {!! $value->option_one !!}
        </label>
      </div>
      <div class="answer" >
        <input type="radio"  id="answer-0-2" value="2" required>
        <label for="answer-0-2"  @if($value->correct_answer == "2")  class="answer__item answer__item--is-correct rounded" @else class="answer__item"  @endif>
                   {!! $value->option_two !!}
                    </label>
      </div>
      <div class="answer" >
        <input type="radio"  id="answer-0-3" value="3" required>
        <label for="answer-0-3"  @if($value->correct_answer == "3")  class="answer__item answer__item--is-correct rounded" @else class="answer__item"  @endif>
                  {!! $value->option_three !!}
                </label>
      </div>
      <div class="answer">
        <input type="radio"  id="answer-0-4" value="4" required>
        <label for="answer-0-4"  @if($value->correct_answer == "4")  class="answer__item answer__item--is-correct rounded" @else class="answer__item"  @endif>
                   {!! $value->option_four !!}
        </label>
      </div>
    </div>
  </fieldset>

   <div class="float-right">
                    <a href="{{ url('/teacher/editquestion') }}/{{$value->id}}" class="badge bg-primary" >
                                          <i class="bi bi-pencil-square"></i></a>
                    <a href="{{ url('/teacher/deletequestion') }}/{{$value->id}}" onclick="return confirm('Are you sure you want to delete this question?');" class="badge bg-danger"><i class="bi bi-trash"></i></a>
                                   
                 </div>  
                                  @endforeach
                      </div>
                    
               </div>
           </div>
       </div>
   </div>
</div>
</div>
</div>






<!--primary theme Modal -->
<div class="modal fade text-left" id="primary" tabindex="-1"
role="dialog" aria-labelledby="myModalLabel160"
aria-hidden="true">
<div class="modal-dialog  modal-lg  modal-dialog-centered modal-dialog-scrollable"
role="document">
<div class="modal-content">
    <div class="modal-header bg-primary">
        <h5 class="modal-title white" id="myModalLabel160">
            User Name
        </h5>
        <button type="button" class="close"
        data-bs-dismiss="modal" aria-label="Close">
        <i data-feather="x"></i>
    </button>
</div>
<div class="modal-body">
    Tart lemon drops macaroon oat cake chocolate toffee
    chocolate
    bar icing. Pudding jelly beans
    carrot cake pastry gummies cheesecake lollipop. I
    love cookie
    lollipop cake I love sweet
    gummi
    bears cupcake dessert.
</div>
<div class="modal-footer">
    <button type="button"
    class="btn btn-light-secondary"
    data-bs-dismiss="modal">
    <i class="bx bx-x d-block d-sm-none"></i>
    <span class="d-none d-sm-block">Close</span>
</button>
<button type="button" class="btn btn-primary ml-1"
data-bs-dismiss="modal">
<i class="bx bx-check d-block d-sm-none"></i>
<span class="d-none d-sm-block">Edit</span>
</button>
</div>
</div>
</div>
</div>

<script type="text/javascript">
   function getdata(id,name){
        $('#myModalLabel160').html(name);

         $.ajax({
           type: "GET",
           url: "{{ url('/admin/getuseralldata/')}}",
           data: {user:id}, 
           success: function(res)
           {
               alert(res); 
           }
         });


    }

</script>

@endsection