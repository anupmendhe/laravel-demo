<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
use App\Models\User;
 
use Illuminate\Support\Facades\DB;
  
use Validator;
use Flash;
use Sentinel;
use Session;

class ProfileController extends Controller
{
    public function __construct(){
        $this->arr_view_data      = [];
         $this->User        = new User;
        $this->module_title       = "profile";
        $this->module_view_folder = "front.dashboard";
        $this->customer_panel_slug    = config('app.project.customer_panel_slug');
        $this->module_url_path    = url(config('app.project.customer_panel_slug')).'/profile';
     }

    public function index()
    {
        $user = Sentinel::getUser();
        if($user)
        {
             if($user)
            {
                $this->arr_view_data['details']             = $user->toArray();
                 
            }
 
            $this->arr_view_data['user']             = $user->toArray();
            $this->arr_view_data['page_title']       = "profile";
             $this->arr_view_data['enc_id']           = base64_encode($user->id);
             $this->arr_view_data['module_url_path']        = $this->module_url_path;
            return view($this->module_view_folder.'.profile',$this->arr_view_data);
        }

    }
 

    public function update_profile(Request $request,$enc_id)
    {
//        dd($request->all());
        $email   = $request->input('email');
        $mobile  = $request->input('mobile_no');
        $id      = base64_decode($enc_id);
        $user    = Sentinel::check();
        $user_id = isset($user->id)?$user->id:'0';
 
            $arr_rules['first_name']   = 'required';
            $arr_rules['last_name']    = 'required';
  
            if($request->has('password') && $request->password!=null)
            {
                $arr_rules['password']     = 'min:4';
             }
 
            $validator = Validator::make($request->all(),$arr_rules);

             if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }

            if($request->has('password') && $request->password!=null)
            {
                $credentials = [];
                $credentials['password'] = $request->input('password');

                try
                {
                    $user = Sentinel::check();
                    if (Sentinel::validateCredentials($user,$credentials))
                    {
                        $new_credentials = [];
                        $new_credentials['password'] = $request->input('new_password');

                        if($request->input('password')==$request->input('new_password'))
                        {
                            Flash::error('Old and new password should not be same.');
                            return redirect()->back();
                        }
                        if(Sentinel::update($user,$new_credentials))
                        {
                            Flash::success('Password Changed Successfully');
                            return redirect()->back();
                        }
                        else
                        {
                            Flash::error('Problem Occurred, While Changing Password');
                            return redirect()->back();
                        }
                    }
                    else
                    {
                        Flash::error('Invalid Old Password');
                        return redirect()->back();
                    }
                }
                catch (\Exception $e)
                {
                    Flash::error($e->getMessage());
                    return redirect()->back();
                }
            }

            $arr_data = [];
            $arr_data['first_name'] = trim($request->first_name);
            $arr_data['last_name']  = trim($request->last_name);
            $arr_data['email']      = trim($request->email);
 
            $user = $this->User->where('id',$id)->update($arr_data);
            if($user)
            {

                Flash::success($this->module_title.' '.'updated_successfully');
                return redirect()->back();
            }
            else
            {
                Flash::error('problem_occured_while_updating'.' '.$this->module_title);
                return redirect()->back();
            }
         
    }

 
 
}
