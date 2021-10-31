@extends('layouts.admin')
@section('content')
<div>
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
            <div class="table-responsive">
              <table class="table table-lg">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Subjects</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($details as $value)
                 <tr>
                    <td class="text-bold-500">{{ $value->exam_name }}</td>
                    <td>{{ $value->subjectsname }}</td>
                   
                    <td>
                        <a href="{{ url('/student/exams/') }}/{{$value->id}}/give/" class="btn btn-info exambtn"  target="_new" >Attend Exam
                          <i class="bi bi-arrow-bar-right"  ></i></a>
                          
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <div class="d-flex justify-content-end">
                   {!! $details->links() !!}
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>





     <script type="text/javascript">
      $(document).ready(function(){
        $(".exambtn").bind('click',function(e){
          e.preventDefault();
          if(confirm("Are you sure you want to start the exam?")){
            // open a pop up with the url
            var url = $(e.currentTarget).attr('href');
            window.open(url, 'Snopzer', 'width=1500,height=1000,toolbar=0,resizable=0');
          }
        });
      });
    </script>

@endsection