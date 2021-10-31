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

<div class="dropdown dropdown-color-icon pb-1">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButtonEmoji" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   <i class="bi bi-plus"></i> Add
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonEmoji" style="margin: 0px;">
                                                    <a class="dropdown-item" href="{{ url('/teacher/addquestion') }}/{{$value->id}}">
                                                        Question</a>
                                                </div>
                                            </div>


                        <a href="{{ url('/teacher/getquestionswithtestdetails/') }}/{{$value->id}}" class="badge bg-info" >
                          <i class="bi bi-eye"  ></i></a>
                          {{-- <a href="{{ url('/admin/test/edittest') }}/{{$value->id}}" class="badge bg-primary" >
                            <i class="bi bi-pencil-square"></i></a> --}}
                          
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