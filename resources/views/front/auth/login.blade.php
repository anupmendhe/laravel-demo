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
          <div class="responsive-menu-hide">                   
            <h2>Login</h2>   
            <div class="login-tagline-section">
                 Please Login to your Account
            </div>  
          </div>     
     
                      <form action="{{url('/')}}/process_login" id="frm_login" method="post"  class="form-validate">
									{{csrf_field()}}
									<div class="text-center">
 										<h5 class="content-group">Login to your account</h5>
                                         @include('front.layout._operation_status')
 									</div>

									<div class="form-group has-feedback has-feedback-left">
										<input type="text" class="form-control" autofocus="true" placeholder="Email address" name="email" id="email"  >
										<div class="form-control-feedback">
											<i class="icon-user text-muted"> </i>
										</div>
										<span class="error_class" style="color:red;">{{ $errors->first('email') }} </span>
									</div>

									<div class="form-group has-feedback has-feedback-left">
										<div class="hide-password-icon" id="icon"></div>
										<input type="password" class="form-control" placeholder="Password" name="password" id="password"   >
										<div class="form-control-feedback">
											<i class="icon-lock2 text-muted"></i>
										</div>
										<span class="error_class" style="color:red;">{{ $errors->first('password') }} </span>
									</div>

									 
									<div class="form-group">
										<button type="submit" class="full-orng-btn sim-button">Login <i class="icon-arrow-right14 position-right"></i></button>
                                         <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-primary sim-button btn-block">
                                  <strong>Login With Google</strong>
                                </a> 
                                        <div class="join-block">                            

                                <h5>Don't have an account? <a href="{{url('/')}}/signup">Sign Up</a></h5>

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

