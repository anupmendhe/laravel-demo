<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;

use Flash;

use Sentinel;

//use Reminder;

//use URL;

use Session;


class AuthController extends Controller
{
    public function __construct(){
        
        $this->arr_view_data      = [];

        $this->module_title       = "Admin";

        $this->module_view_folder = "admin.auth";

        $this->admin_panel_slug   = config('app.project.admin_panel_slug');

        $this->module_url_path    = url($this->admin_panel_slug);

    }
    
    
        public function login()
    {
        $this->arr_view_data['page_title']       = $this->module_title." Login";
        $this->arr_view_data['module_title']     = $this->module_title." Login";
        $this->arr_view_data['admin_panel_slug']     = $this->admin_panel_slug;

//        if(\URL::previous()==$this->module_url_path.'/change_password')
//        {
//            Flash::success("Success! Your password has been changed!");    
//        }

        return view($this->module_view_folder.'.login',$this->arr_view_data);
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
            return redirect(config('app.project.admin_panel_slug').'/login')
                      ->withErrors($validator)
                      ->withInput($request->all());
        }
 
        $remember_me = $request->input('remember_me');

        $credentials = [

                            'email'    => $request->input('email'),

                            'password' => $request->input('password'),

                       ];
                     
                   $email = $request->input('email');
//                   $userStatus  = Sentinel::findByCredentials(['email' => $email]);
//                dd($userStatus);
//                   $status = $userStatus['is_active'];
//            if($status == 0 && $email !='admin@renteem.com')
//            {
//                Flash::error('Your Account is Blocked');
//                return redirect()->back();
//            }


        try 

        {

            $obj_authentication = false;

            $obj_authentication = Sentinel::authenticate($credentials);
 
             if($obj_authentication!=false)

            {

                if(Sentinel::check() == true){
                    
                    return redirect(config('app.project.admin_panel_slug').'/dashboard');
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
    
        public function logout()

    {

        Sentinel::logout();

        return redirect(url($this->admin_panel_slug));

    }
    
    
    
    
}
