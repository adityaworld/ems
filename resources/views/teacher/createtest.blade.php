@extends('layouts.admin')

@section('content')
<div>
	<section id="multiple-column-form">
		<div class="row match-height">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">{{ $title }}</h4>
					</div>
					<div class="card-content">
						<div class="card-body">

							@if (count($errors) > 0)
							<div class = "alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
								{{ $error }}</br>
								@endforeach
							</ul>
						</div>
						@endif
						@if (Session::has('msg'))
						<div class = "alert alert-success">
							<ul>
								{{ 	Session::get("msg")  }}
							</ul>
						</div>
						@endif
						<form class="form" method="post" action="{{ url('/teacher/savetest') }}" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12 col-12">
									<div class="form-group">
										@csrf
									

										<label for="first-name-column">Exam Name</label>
										<input type="text" id="first-name-column" class="form-control" placeholder="Exam Name" name="exam_name" value="{{ old('exam_name') }}">
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="form-group">
										<label for="last-name-column">Description</label>
										<textarea name="description"  class="form-control">{{ old('description') }}</textarea>
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="form-group">
										<label for="city-column">Total Marks</label>
										<input type="number" id="total_marks" class="form-control" placeholder="Total Marks" name="total_marks" value="{{ old('total_marks') }}"> 
									</div>
								</div>



	<div class="col-md-6 col-12">
									<div class="form-group">
										<label for="city-column">Pass Marks</label>
										<input type="number" id="pass_marks" class="form-control" placeholder="Total Marks" name="pass_marks" value="{{ old('pass_marks') }}"> 
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="form-group">
										<label for="city-column">Eatch Questions Marks</label>
										<input type="number" id="eatch_questions_marks" class="form-control" placeholder="Eatch Questions Marks" name="eatch_questions_marks" value="{{ old('eatch_questions_marks') }}"> 
									</div>
								</div>

									<div class="col-md-6 col-12">
									<div class="form-group">
										<label for="city-column">Duration (In Minutes)</label>
										<input type="number" id="duration" class="form-control" placeholder="Duration" name="duration" value="{{ old('duration') }}"> 
									</div>
								</div>

								<div class="col-md-6 col-12">
									<div class="form-group">
										<label for="country-floating">Subject</label>

										<select  class="form-control" name="subject_id">
											@foreach($subject as $value)
											<option value="{{$value->id}}">{{$value->subject_name}}</option>
											@endforeach

										</select>
									</div>
								</div>
								
						
							

								<div class="col-md-6 col-12">
									<div class="form-group">
										<label for="country-floating">Thumbnail</label>
										<input type="file" name="photo" class="basic-filepond">
									</div>
								</div>

		


<div class="col-12 d-flex justify-content-end">
	<input type="submit" class="btn btn-primary me-1 mb-1" value="Create Test" >
	<button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>


</div>


<script src="{{ url('/admin/') }}/vendors/choices.js/choices.min.js"></script>
@endsection