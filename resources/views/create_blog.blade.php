@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">Create Blog</div>
				
				<div class="card-body">
					<form id="blogForm" action="{{ url('create-blog') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" class="form-control" placeholder="Enter Blog Title">
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" placeholder="Blog description"></textarea>
						</div>
						<div class="form-group">
							<label>Tags</label>
							<div class="row insert-tag">
								<div class="col-md-8">
									<input type="text" name="tag[]" class="form-control" placeholder="Enter Tag name">	
								</div>
								<div class="col-md-2">	
									<span><button class="btn btn-primary add-tag">+</button></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Image</label>
							<input type="file" name="image" class="form-control" placeholder="Select image">
						</div>

						<input type="submit" name="" class="btn btn-primary" value="Create">
					</form>			
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('endscript')

<script type="text/javascript">
	$(document).ready(function(){
		$('#blogForm').validate({
			rules:{
				title:{
					required:true,
				},
				description:{
					required:true,
				},
				"tag[]":{
					required:true,
				},
				image:{
					required:true,
					accept:"jpg,png,jpeg",
				}
			},
			messages:{
				title:{
					required:"Please Enter Blog name",
				},
				description:{
					required:"Please Enter Description",
				},
				"tag[]":{
					required:"Please Enter Tag",
				},
				image:{
					required:"Please Select Image",
					accept:"Only image type jpg/png/jpeg is allowed",
				}	
			},
			errorElement: 'span',
				errorPlacement: function (error,element){
					error.addClass('invalid-feedback');
					element.closest('.form-group').append(error);
				},
				highlight: function (element,errorClass, validClass){
					$(element).addClass('is-invalid');
				},
				unhighlight: function (element, errorClass, validClass){
					$(element).removeClass('is-invalid');
				}
		});
	});

	$('.add-tag').click(function(e){
		e.preventDefault();
		var html = '<div class="col-md-8 mt-1">\
						<input type="text" name="tag[]" class="form-control" placeholder="Enter Tag name">\
					</div>';
		$('.insert-tag').append(html);
	});
</script>
@endsection