
@extends('admin.layout.master')    
@section('main_content')
<!-- Page header -->
@include('admin.layout.breadcrumb')  
<!-- /page header -->

<!-- BEGIN Main Content -->

<!-- Content area -->
<div class="content">
	<div class="panel panel-flat">
		@include('admin.layout._operation_status')
		{{-- @include('admin.layout._multi_lang_tab') --}}	
		<div class="">
			<form class="form-horizontal" id="frm_edit_category" name="frm_edit_category" action="{{$module_url_path}}/update/{{$enc_id}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<fieldset class="content-group">	
					<input type="hidden" name="enc_id" value="{{isset($enc_id) ? $enc_id : '' }}">
					@if(isset($arr_lang) && count($arr_lang)>0)
						<div class="row">
						@foreach($arr_lang as $key => $lang)
							<div class="col-lg-6">
								<?php 
									$name = '';
									if(isset($category) && count($category)>0)
									{
										if($category['get_category'][$key]['locale']==$lang['locale'])
										{
											$name = $category['get_category'][$key]['name'];
										}
									}

								?>
								<div class="form-group">
									<label class="control-label" for="category_{{$lang['locale']}}">Category Name ({{$lang['title']}}) <i class="red">*</i></label>								
									<input type="text" name="category_{{$lang['locale']}}" id="category_{{$lang['locale']}}" class="form-control" placeholder="category ({{$lang['title']}})" data-rule-maxlength="255" data-rule-required='true' value="{{isset($name)?$name:''}}">
									<span class="error">{{ $errors->first('category_'.$lang['locale']) }} </span>								
								</div>
							</div>
						@endforeach
						</div>
					@endif
					
					<div class="form-group">												
						<button type="submit" class="btn btn-primary">Update</button>
						<a class="btn btn-default" href="{{$module_url_path}}" >Back</a>						
					</div>
				</fieldset>
			</form>
		</div>
	</div>

	<script>

		$(document).ready(function(){
			$('#frm_edit_category').validate({
				ignore: [],
				highlight: function(element) { },
				errorPlacement: function(error, element) 
				{ 
					var name = $(element).attr("name");
					if (name === "product_type") 
					{
						error.insertAfter('.error_product_type');
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
		    validateImage(this.files, 33,33,128,128);
		});

		$(document).on("click","#remove", function()
		{   
		    $('.fileupload-preview').attr('src',$('#prev_image_url').val());
		    $("#profile_image").val('');
		    $('#remove').hide();
		});

	</script>

	@endsection


	