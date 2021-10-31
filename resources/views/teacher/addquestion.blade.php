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
						<a class="btn btn-info btn-block m-2"  href="{{ url('/teacher/getquestionswithtestdetails') }}/{{$examdata['id']}}">All Questions  </a>
			<form class="form" method="post" action="{{ url('/teacher/savequestion') }}/{{$examdata['id']}}" enctype="multipart/form-data">
		<div class="row">
								@csrf
								



								<div class="col-lg-12 col-12">
									<div class="form-group">
										<label for="last-name-column">Question</label>
										<textarea name="question"  class="form-control">{{ old('questions') }}</textarea>
									</div>
								</div>
								

									<div class="col-lg-12 col-12">
									<div class="form-group">
										<label for="last-name-column">Option One</label>
										<textarea name="optionone"  class="form-control">{{ old('optionone') }}</textarea>
									</div>
								</div>

									<div class="col-lg-12 col-12">
									<div class="form-group">
										<label for="last-name-column">Option Two</label>
										<textarea name="optiontwo"  class="form-control">{{ old('optiontwo') }}</textarea>
									</div>
								</div>

									<div class="col-lg-12 col-12">
									<div class="form-group">
										<label for="last-name-column">Option Three</label>
										<textarea name="optionthree"  class="form-control">{{ old('optionthree') }}</textarea>
									</div>
								</div>

									<div class="col-lg-12 col-12">
									<div class="form-group">
										<label for="last-name-column">Option Four</label>
										<textarea name="optionfour"  class="form-control">{{ old('optionfour') }}</textarea>
									</div>
								</div>

									<div class="col-lg-12 col-12">


								<div class="col-md-6 col-12">
									<div class="form-group">
										<label for="country-floating">Correct Answer</label>

										<select  class="form-control" name="correctanswer">
											@for($i=1; $i <= 4 ; $i++)
											<option value="{{$i}}">Option {{$i}}</option>
											@endfor

										</select>
									</div>
								</div>

<div class="col-12 d-flex justify-content-end">
	<input type="submit" class="btn btn-primary me-1 mb-1" value="Add Question" >
	<a href="{{ url('/admin/test/getquestionswithtestdetails/') }}/{{$examdata['id']}}" class="btn btn-light-secondary me-1 mb-1">All Question</a>
	<!-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> -->
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