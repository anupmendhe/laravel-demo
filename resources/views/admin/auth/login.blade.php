<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ isset($page_title)?$page_title:"" }} - {{ config('app.project.name') }}</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{url('/')}}/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{{url('/')}}/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="{{url('/')}}/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="{{url('/')}}/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="{{url('/')}}/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{url('/')}}/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="{{url('/')}}/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="{{url('/')}}/assets/js/pages/jquery.validate.min.js"></script>
	<script type="text/javascript" src="{{url('/')}}/assets/js/pages/additional-methods.min.js"></script>

	<script type="text/javascript" src="{{url('/')}}/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{url('/')}}/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{url('/')}}/assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="{{url('/')}}/assets/js/core/app.js"></script>
	<script type="text/javascript" src="{{url('/')}}/assets/js/pages/login.js"></script>
	<link rel="shortcut icon" type="image/png" href="{{ url('/web_admin/assets/images/fav_icon.png') }}"/>
</head>

<body class="login-container login-cover">
	<style type="text/css">
		.error_class
		{
			color:red;
		}
		.alert {
			margin: 24px!important;
		}
		.close-btn
		{
			position: relative;
			top: -5px!important;
			right: -15px!important;
			color: inherit;
		}
	</style>
	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content pb-20">
					<!-- Tabbed form -->
					<div class="tabbable panel login-form width-400">
						
                        add here status
                        
						<div class="tab-content panel-body">
							<div class="tab-pane fade in active" id="basic-tab1">
								<form action="{{url($admin_panel_slug.'/process_login')}}" id="frm_login" method="post"  class="form-validate">
									{{csrf_field()}}
									<div class="text-center">
 										<h5 class="content-group">Login to your account</h5>
                                        @include('admin.layout._operation_status')
									</div>

									<div class="form-group has-feedback has-feedback-left">
										<input type="text" class="form-control" autofocus="true" placeholder="Email address" name="email" id="email" value="{{isset($_COOKIE['remember_me_email']) && !empty($_COOKIE['remember_me_email']) ? $_COOKIE['remember_me_email']:''}}">
										<div class="form-control-feedback">
											<i class="icon-user text-muted"> </i>
										</div>
										<span class="error_class" style="color:red;">{{ $errors->first('email') }} </span>
									</div>

									<div class="form-group has-feedback has-feedback-left">
										<div class="hide-password-icon" onClick="togglePassword();" id="icon"></div>
										<input type="password" class="form-control" placeholder="Password" name="password" id="password" required="required" minlength="6" data-rule-maxlength="16" value="{{isset($_COOKIE['remember_me_password']) && !empty($_COOKIE['remember_me_password']) ? $_COOKIE['remember_me_password']:''}}">
										<div class="form-control-feedback">
											<i class="icon-lock2 text-muted"></i>
										</div>
										<span class="error_class" style="color:red;">{{ $errors->first('password') }} </span>
									</div>

									<div class="form-group login-options">
										{{-- {{dump($_COOKIE['remember_me_email'])}} --}}
										<div class="row">
											<div class="col-sm-6">
												<label class="checkbox-inline">
													<input type="checkbox" class="styled" @if(!empty($_COOKIE['remember_me_email'])) ? checked : '' @endif name="remember_me" id="remember_me">
													Remember me
												</label>
											</div>

											<div class="col-sm-6 text-right">
												<a href="{{url('/')}}/admin/forgot_password">Forgot password?</a>
											</div>
										</div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
									</div>
								</form>

								<div class="content-divider text-muted form-group"><span>{{config('app.project.name')}}</span></div>
								
							</div>
						</div>
					</div>
					<!-- /tabbed form -->
					<!-- Footer -->
					<div class="footer text-muted text-center">
						Copyright &copy; {{date('Y')}}
					</div>
					<!-- /footer -->
				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	 

</body>
</html>
