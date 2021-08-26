
@extends('admin.layout.master')    
@section('main_content')
 

<!-- BEGIN Main Content -->

<!-- Content area -->
<div class="content">
	<div class="panel panel-flat">
		@include('admin.layout._operation_status')
		{{-- @include('admin.layout._multi_lang_tab') --}}	
		<div class="">
		<form class="form-horizontal" id="frm_add_driver" name="frm_add_driver" enctype="multipart/form-data" action="{{$module_url_path}}/store" method="post">

{{csrf_field()}}

<fieldset class="content-group">	

	<div class="row">
		<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">
				<label class="control-label" for="first_name">First Name <i class="red">*</i></label>								
				<input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" data-rule-maxlength="255" data-rule-pattern="^[a-zA-Z -]*$" data-rule-minlength="3" data-rule-required='true' value="{{old('first_name')}}" autocomplete="false">
				<span class="error">{{ $errors->first('first_name') }} </span>								
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">
				<label class="control-label" for="last_name">Last Name <i class="red">*</i></label>								
				<input type="text" name="last_name" data-rule-pattern="^[a-zA-Z -]*$" data-rule-minlength="3"  id="last_name" class="form-control" placeholder="Last Name" data-rule-maxlength="255" data-rule-required='true' value="{{old('last_name')}}" autocomplete="false">
				<span class="error">{{ $errors->first('last_name') }} </span>								
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">
				<label class="control-label" for="email">Email <i class="red">*</i></label>								
				<input type="text" name="email" id="email" class="form-control" placeholder="Email" data-rule-maxlength="255" data-rule-required='true' data-rule-email="true" value="{{old('email')}}" autocomplete="false">
				<span class="error" id="err_email">{{ $errors->first('email') }} </span>								
			</div>
		</div>
		  
		<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">
				<label class="control-label" for="password">Password <i class="red">*</i></label>								
				<input type="password" name="password" id="password" class="form-control" placeholder="Password" data-rule-maxlength="30" data-rule-minlength="6" data-rule-required='true' value="{{old('password')}}" autocomplete="false" data-rule-pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^])(?=.*\d).*" data-msg-pattern="Password must contain at least (1) lowercase, (1) uppercase, (1) special character, (1) letter.">
				<span class="error">{{ $errors->first('password') }} </span>								
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">
				<label class="control-label" for="conf_password">Confirm Password <i class="red">*</i></label>								
				<input type="password" data-rule-minlength="6" name="conf_password" id="conf_password" class="form-control" placeholder="Re-enter Password" data-rule-maxlength="30" data-rule-required='true' data-rule-equalTo="#password" data-msg-equalTo="Please enter correct confirmation password" value="{{old('conf_password')}}" autocomplete="false">
				<span class="error">{{ $errors->first('conf_password') }} </span>								
			</div>
		</div>
		 
		<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">

				<label class="control-label" for="address">Address <i class="red">*</i></label>								

				<input type="text"  name="address" id="autocomplete" class="form-control" placeholder="Address" data-rule-maxlength="255" data-rule-required='true' value="{{old('address')}}" autocomplete="false">

				<input type="hidden" name="latitude" id="latitude" />

				<input type="hidden" name="longitude" id="longitude"/>

				<span class="error">{{ $errors->first('address') }} </span>


			</div>
		</div>
	 
	</div>
 
	<div class="form-group">

		<label class="control-label"></label>

		<div class="">

			<button type="submit" class="btn btn-primary">Add</button>

			<a class="btn btn-default" href="{{$module_url_path}}" >Back</a>

		</div>

	</div>

	

</fieldset>

</form>
		</div>
	</div>
</div>

	<script>

	$(document).ready(function(){
		$('#frm_add_category').validate({
			ignore: [],
			highlight: function(element) { },
			errorPlacement: function(error, element) 
			{ 
				var name = $(element).attr("name");
				if (name === "product_type") 
				{
					error.insertAfter($(element).parent().parent());
				} 
				else
				{
					error.insertAfter(element);
				}
			} 
		});
	});

	$(document).on("change",".validate-image", function()
    {        
        var file=this.files;
        validateImage(this.files,33,33,128,128);
        var image = $("#cat_image").val();
		if (image!='') 
		{
		 	$("#err-image").html("");
		}
    });

    $(document).on("click","#remove", function()
    {   
        removeFile();
    });

	</script>

	@endsection


	