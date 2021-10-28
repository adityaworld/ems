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
							<form class="form" method="post" action="{{ url('/teacher/addtest') }}" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12 col-12">
										<div class="form-group">
											@csrf
											<label for="first-name-column">Test Name</label>
											<input type="text" id="first-name-column" class="form-control" placeholder=" Name" name="name" value="{{ old('name') }}">
										</div>
									</div>
						<div class="col-12">
                          
                                <div class="form-group">
                                    <label for="first-name-column">Add Description</label>
                                </div>
                               
                                	<textarea id="editor" name="description">{{ old('description') }}
                                	</textarea>
                                   
                               
                            </div>
                       
								<div class="col-md-6 col-12">
										<div class="form-group">
											<label for="last-name-column">Total Marks</label>
											<input type="number" id="last-name-column" class="form-control" placeholder="Total Marks" name="total_marks" value="{{ old('total_marks') }}">
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="form-group">
											<label for="city-column">Pass Masks</label>
											<input type="text" id="city-column" class="form-control" placeholder="Pass Masks" name="pass_masks" value="{{ old('pass_masks') }}"> 
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="form-group">
											<label for="city-column">Duration</label>
											<input type="number" id="city-column" class="form-control" placeholder="Duration in minutes" name="duration" value="{{ old('duration') }}"> 
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="form-group">
											<label for="country-floating">Test Thumbnail</label>
											<input type="file" name="photo" class="basic-filepond">
										</div>
									</div>
									<div class="col-12 d-flex justify-content-end">
										<input type="submit" class="btn btn-primary me-1 mb-1" value="Add Mock Test">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	   <script src="{{ url('/admin/vendors') }}/ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

</div>
@endsection