
@extends('front.layout.master')    
    <!--Header section end here-->
@section('main_content')
  
<div class="orders-section-main-block">
    <div class="container">
        <div class="orders-profile-info-section">
 
    <div class="orders-profile-info">
        <div class="orders-profile-name">
            {{isset($details['first_name'])?ucfirst($details['first_name']):''}} {{isset($details['last_name'])?ucfirst($details['last_name']):''}}
        </div>
        <div class="orders-profile-contact-number">
            {{isset($details['contact_number'])?'+964 '.$user_details['mobile_no']:''}}
        </div>  
        <div class="orders-profile-email">
             {{isset($details['email'])?$details['email']:''}}
        </div>
        <a class="btn btn-danger" href="{{url('/')}}/logout">logout</a>
         
    </div>                
    <div class="clearfix"></div>
             
</div>
         <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
             <div class="order-profile-left-bar">
                <ul>
                     <li>
                        <a href="{{url('/')}}/profile" class=" @if(Request::segment(2) == 'profile' && Request::segment(3) == '') active @endif"><i class="fas fa-user"></i>My Profile</a>
                    </li>

                </ul>
            </div>
             </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                @include('front.layout._operation_status')
                <form  action="{{url('/')}}/profile/update_profile/{{base64_encode($details['id'])}}" id="frm_profile" method="post">
                    <?php echo csrf_field(); ?>         
                    <div class="order-profile-left-bar order-profile-right-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" placeholder="First Name" name="first_name" value="{{isset($details['first_name'])?ucfirst($details['first_name']):''}}" data-rule-required="true" >
                                    <span class="error">{{ $errors->first('first_name') }} </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" placeholder="Last Name" name="last_name" value="{{isset($details['last_name'])?ucfirst($details['last_name']):''}}" data-rule-required="true" >
                                    <span class="error">{{ $errors->first('last_name') }} </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" placeholder="Email" name="email" value="{{isset($details['email'])?ucfirst($details['email']):''}}" data-rule-email="true" readonly style="background-color:#80808017;" >
                                    <span class="error">{{ $errors->first('email') }} </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" placeholder="Address" name="address" value="{{isset($details['address'])?ucfirst($details['address']):''}}" data-rule-email="true">
                                    <span class="error">{{ $errors->first('address') }} </span>
                                </div>
                            </div>
                           
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group" style="position: relative;">
                                    <label>Old Password</label>
                                    <input type="password" id="password" placeholder="Enter old your password"  name="password" value="{{old('password')}}">
                                    <span class="error">{{ $errors->first('password') }} </span>
                                     
                                </div>
                            </div>
                            
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group" style="position: relative;">
                                    <label>New password</label>
                                    <input type="password" id="password" placeholder="Enter your new password"   name="new_password" value="{{old('new_password')}}">
                                    <span class="error">{{ $errors->first('password') }} </span>
                                     
                                </div>
                            </div>
                            

                             
                        </div>
                        <div class="deliver-here-btn-section profile-form-submit-btn">
                            <button type="submit" class="full-orng-btn sim-button">Submit</button>
                        </div>
                        <div class="clearfix"></div>                        
                    </div> 
                </form>                   
            </div>
        </div>
    </div>
</div>
 
 

@endsection