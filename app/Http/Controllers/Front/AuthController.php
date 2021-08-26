<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmailTemplateModel;  
 
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Validator;
use Flash;
use Sentinel;
use Session;
use Mail;
use Socialite;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->User = new User();
        $this->arr_view_data      = [];
        $this->module_title       = "Front";
        $this->module_view_folder = "front.auth";
        $this->customer_panel_slug    = config('app.project.customer_panel_slug');
        $this->module_url_path    = url($this->customer_panel_slug);
    }

    public function login()
    {
         
        
        $this->arr_view_data['page_title']       = "login";
         $this->arr_view_data['customer_panel_slug']  = $this->customer_panel_slug;  
        $this->arr_view_data['module_url_path']  = $this->module_url_path;  
        return view($this->module_view_folder.'.login',$this->arr_view_data);
    }
     public function redirectToGoogle()
    {
       return  Socialite::driver('google')->redirect();
           
    }
    
    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
             
     
            $finduser = $this->User->where('google_id', $user->id)->first();
     
            if($finduser){
                
             $obj_authentication = false;
             $obj_authentication = Sentinel::authenticate($credentials);
 
             if($obj_authentication!=false)

            {
                 
                  return redirect('/profile');

//                if(Sentinel::check() == true){
//                    
//                    return redirect('/profile');
//                }
//            
//                else
//                {
//                    Session::flash('error','Not Sufficient Privileges');
//                    return redirect()->back();
//
//                }
             }
          
     
            }else
            {
                
        $arr_data = [];
       
         
        $arr_data['first_name']      = $user->name;   
        $arr_data['email']      = $user->email;   
        $arr_data['password']   = "1234"; 
        $arr_data['google_id']   = $user->id;
        $arr_data['register_via']   = "Google";
                
                 
         $obj_user = Sentinel::registerAndActivate($arr_data);
          
         $credentials = [

                            'email'    =>  $user->email,

                            'password' => "1234",

                       ];      
                
                
        if($obj_user) {
            
            $role = Sentinel::findRoleBySlug('customer');
            $obj_user->roles()->attach($role);
            $obj_authentication = false;
             $obj_authentication = Sentinel::authenticate($credentials);
            
            
 
             if($obj_authentication!=false)

            {

                if(Sentinel::check() == true){
                    
                    return redirect('/profile');
                }
            
                else
                {
                    Session::flash('error','Not Sufficient Privileges');
                    return redirect()->back();

                }
             }
                
            }
      
        }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

 

    
    public function process_login(Request $request)

    {
 
        $validator = Validator::make($request->all(), [

            'email'    => 'required|max:255',
            'password' => 'required',
        ]);
   
        if ($validator->fails()) 
        {
            Session::flash('error','Fill Required Fields');
            return redirect('/login')
                      ->withErrors($validator)
                      ->withInput($request->all());
        }
 
         $credentials = [

                            'email'    => $request->input('email'),

                            'password' => $request->input('password'),

                       ];
                     
                   $email = $request->input('email');
 
        try 

        {

            $obj_authentication = false;

            $obj_authentication = Sentinel::authenticate($credentials);
 
             if($obj_authentication!=false)

            {

                if(Sentinel::check() == true){
                    
                    return redirect('/profile');
                }
            
                else
                {
                    Session::flash('error','Not Sufficient Privileges');
                    return redirect()->back();

                }
             }
            
            else

            {

                Session::flash('error','Invalid Login Credential');
                return redirect()->back();

            }
       
        } 

        catch(\Exception $e)

        {

            Flash::error($e->getMessage());

            return redirect()->back();

        }

        Session::flash('error','Something went wrong ! Please try again !');
        return redirect()->back();

    }
 
    public function signup()
    {

        $this->arr_view_data['page_title']       = "signup";
        $this->arr_view_data['module_url_path']  = $this->module_url_path; 
 
        return view($this->module_view_folder.'.signup',$this->arr_view_data);
    }

    public function register(Request $request)
    {
        
        $arr_rules = [];

        $arr_rules['first_name']      = 'required';
        $arr_rules['last_name']       = 'required';
        $arr_rules['email']           = 'email';
        $arr_rules['password']        = 'required';
        $arr_rules['conf_password']   = 'required|same:password';
        $arr_rules['address']         = 'required';
  
		$validator = Validator::make($request->all(),$arr_rules);
        if ($validator->fails()) 
        {
        	Session::flash('error','Fill required Fields');
            return redirect('/signup')
                      ->withErrors($validator)
                      ->withInput($request->all());
        }   

        if($request->input('email'))
        {
            
            $email = $request->input('email');
            $check_email = $this->User->where('email',$email)->first();
            if(isset($check_email) && !empty($check_email)){
                Flash::error('This email is already in use');
                return redirect()->back()->withInput($request->all());            
            }

        } 
		
    
        $arr_data = [];
        $arr_data['first_name'] = trim($request->first_name);
        $arr_data['last_name']  = trim($request->last_name);
        $arr_data['email']      = trim($request->email);
        $arr_data['password']   = trim($request->password);
        $arr_data['address']   = trim($request->password);
        $obj_user = Sentinel::registerAndActivate($arr_data);
 
        if($obj_user)
        {
           
            $role = Sentinel::findRoleBySlug('customer');
            $obj_user->roles()->attach($role);
            
            $arr_mail_data = $this->built_mail_data($arr_data); 
            $result = $this->send_mail($arr_mail_data);

            

            if($result){
                $role = Sentinel::findRoleBySlug('customer');
                $obj_user->roles()->attach($role);
                Flash::success($this->module_title.' Created Successfully');   
                
            }
            else{
                Flash::success($this->module_title.' Created Successfully');   
            }
             
            
          
        }
        else
        {
            Flash::error('Problem Occurred, While Creating '.$this->module_title);
        }
        return redirect()->back();    
         
    }

    
     
    public function built_mail_data($arr_data){

        if(isset($arr_data) && sizeof($arr_data)>0)
        {
            $arr_built_content = [
                                  'FIRST_NAME'   => $arr_data['first_name'],
                                  'EMAIL'        => $arr_data['email'],
                                  'PASSWORD'     => $arr_data['password'],
                                  'PROJECT_NAME' => config('app.project.name'),
                                  'ROLE'         => 'Customer'];

            $arr_mail_data                      = [];
           // $arr_mail_data['email_template_id'] = '9';
            $arr_mail_data['arr_built_content'] = $arr_built_content;
            $arr_mail_data['user']              = $arr_data;
            
            return $arr_mail_data;
        }
        return FALSE;
    }



    public function send_mail($arr_mail_data = FALSE)
	{

 		try
		{
			if(isset($arr_mail_data) && sizeof($arr_mail_data)>0)
			{
				$arr_email_template = [];
				
				$obj_email_template = new EmailTemplateModel();

				$obj_email_template = $obj_email_template
											->where('template_name','User Registration')
											->first();
                                            
				
				if($obj_email_template)
		      	{
		        	$arr_email_template = $obj_email_template->toArray();
		        	$user               = $arr_mail_data['user'];
		        	
		        	if(isset($arr_email_template['template_html']))
		        	{
			        	$content = $arr_email_template['template_html'];
			        	
			        	if(isset($arr_mail_data['arr_built_content']) && sizeof($arr_mail_data['arr_built_content'])>0)
			        	{
			        		foreach($arr_mail_data['arr_built_content'] as $key => $data)
			        		{
			        			$content = str_replace("##".$key."##",$data,$content);
                               
			        		}
			        	}
			    		
			        	$content = view('admin.email.general',compact('content'))->render();
                        
			        	$content = html_entity_decode($content);
                        
			        	
			        	if(isset($user['email']) && $user['email']!=''){
			        		$send_mail = Mail::send(array(),array(), function($message) use($user,$arr_email_template,$content){
					        	$name = isset($user['first_name']) ? $user['first_name']:"";
						        $message->from($arr_email_template['template_from_mail'], $arr_email_template['template_from']);

						        //$message->to('tecigen@zsero.com', $name )
						        $message->to($user['email'], $name)
						          ->subject($arr_email_template['template_subject'])
						          ->setBody($content, 'text/html');
					        });
			        		
			        	//	return $send_mail;
			                    return true;
			        	}
			        	return false;
			        	
			        }
		        }
		    }
		    return false;
		}    
		catch(\Exception $e) 
        {
            return false;
        }
	}

    
 
    
    public function logout(Request $request)
    {
        
        $user = \Sentinel::check();
         Sentinel::logout();
        Session::flush();
        Session::flash('Logout Successfully!');
          return redirect(url(config('app.project.customer_panel_slug').'/login'));
    }

     
     
    

    
}
