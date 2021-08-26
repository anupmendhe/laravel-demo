@extends('front.layout.master')    
@section('main_content')
   <!--Header section end here-->
 @include('front.layout.home_header')  
   <!--Login section start-->  
   <div class="login-section">
    <div class="container">
        <div class="row">
        <div class="col-sm-12 col-md-5 col-lg-6">
            <div class="login-img-box">
                        
            </div>
        </div>
          <div class="col-sm-12 col-md-7 col-lg-6">
        <div class="signup-block">
          <div class="signup-block-login-responsive">  
      
                      <form action="{{url('/')}}/register" method="post"  class="form-validate">
									{{csrf_field()}}
									<div class="text-center">
 										<h5 class="content-group">Signup to your account</h5>
 									</div>

									<div class="form-group has-feedback has-feedback-left">
										<input type="text" class="form-control" autofocus="true" placeholder="First Name" name="first_name" id="first_name"  >
										<div class="form-control-feedback">
											<i class="icon-user text-muted"> </i>
										</div>
										<span class="error_class" style="color:red;">{{ $errors->first('first_name') }} </span>
									</div>
                                    <div class="form-group has-feedback has-feedback-left">
										<input type="text" class="form-control" autofocus="true" placeholder="Last Name" name="last_name" id="last_name"  >
										<div class="form-control-feedback">
											<i class="icon-user text-muted"> </i>
										</div>
										<span class="error_class" style="color:red;">{{ $errors->first('last_name') }} </span>
									</div>
                                     
                                    <div class="form-group has-feedback has-feedback-left">
										<input type="text" class="form-control" autofocus="true" placeholder="Email" name="email" id="email"  >
										<div class="form-control-feedback">
											<i class="icon-user text-muted"> </i>
										</div>
										<span class="error_class" style="color:red;">{{ $errors->first('email') }} </span>
									</div>
                                    <div class="form-group has-feedback has-feedback-left">
										<input type="password" class="form-control" autofocus="true" placeholder="password" name="password" id="password"  >
										<div class="form-control-feedback">
											<i class="icon-user text-muted"> </i>
										</div>
										<span class="error_class" style="color:red;">{{ $errors->first('password') }} </span>
									</div>
                                <div class="form-group has-feedback has-feedback-left">
										<input type="password" class="form-control" autofocus="true" placeholder="confirm password" name="conf_password" id="conf_password"  >
										<div class="form-control-feedback">
											<i class="icon-user text-muted"> </i>
										</div>
										<span class="error_class" style="color:red;">{{ $errors->first('conf_password') }} </span>
									</div>
                          
                                    <div class="form-group has-feedback has-feedback-left">
										<input type="text" class="form-control" autofocus="true" placeholder="Address" name="address" id="address"  >
										<div class="form-control-feedback">
											<i class="icon-user text-muted"> </i>
										</div>
										<span class="error_class" style="color:red;">{{ $errors->first('address') }} </span>
									</div>
									 
 									 
									<div class="form-group">
										<button type="submit" class="full-orng-btn sim-button">Register <i class="icon-arrow-right14 position-right"></i></button>
                                        <div class="join-block">                            

 
                            </div>
									</div>
								</form>
                </div>

                </div>
 
        </div>
 
            </div>

          </div>
 
    </div> 

  
@endsection

