<?php



namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplateModel;  
use App\Models\User;


use Validator;

use Flash;

use DataTables;

use Session;
use Sentinel;
use Mail;

 

class CustomerController extends Controller

{

 
    public function __construct()

	{

		$this->arr_view_data           	     = [];

		$this->module_title       		     = "Customers";

		$this->module_view_folder 		     = "admin.customer";
 
		$this->admin_panel_slug   		     = config('app.project.admin_panel_slug');

		$this->admin_url_path     		     = url(config('app.project.admin_panel_slug'));

//		$this->cat_image_base_img_path       = base_path().config('app.project.img_path.cat_images');
        $this->User      =   new User();

 
		$this->module_url_path    		     = $this->admin_url_path."/customer";

	}



	public function index()

	{

		$this->arr_view_data['page_title']           = "Manage customers";
 
 
 
		$this->arr_view_data['admin_panel_slug']     = $this->admin_panel_slug;

		$this->arr_view_data['module_url_path']      = $this->module_url_path;



		return view($this->module_view_folder.'.index',$this->arr_view_data);

	}



	public function create()

	{
 
		$this->arr_view_data['module_title']         = $this->module_title;

		$this->arr_view_data['sub_module_icon']      = 'fa fa-plus';
  
		$this->arr_view_data['admin_panel_slug']     = $this->admin_panel_slug;

		$this->arr_view_data['module_url_path']      = $this->module_url_path;



		return view($this->module_view_folder.'.create',$this->arr_view_data);

	}



    public function store(Request $request){

		$arr_rules = [];

		$arr_rules['first_name']      = 'required|min:3|regex:/^[a-zA-Z -]*$/';
		$arr_rules['last_name']       = 'required|min:3|regex:/^[a-zA-Z -]*$/';
		$arr_rules['email']           = 'required|email|unique:users,email';
		$arr_rules['password']        = 'required|min:3|max:30';
		$arr_rules['contact_number']  = 'required|min:8|max:16|unique:users,mobile_no';
		$arr_rules['address']         = 'required';
 
        $arr_rules = [];
 
		$validator = Validator::make($request->all(),$arr_rules);


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
           
   
            $arr_mail_data = $this->built_mail_data($arr_data); 
            $result = $this->send_mail($arr_mail_data);

            $role = Sentinel::findRoleBySlug('customer');
            $obj_user->roles()->attach($role);

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
            Flash::error('Problem Occurred, While Creating '.str_singular($this->module_title));
        }
        return redirect($this->module_url_path);
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


 



	public function edit($enc_id)

	{

		$id = base64_decode($enc_id);



		if(!is_numeric($id))

		{

			Flash::error('Something went wrong please try again');

			return redirect()->back();

		}



		$obj_category = $this->BaseModel->with('get_category')->where('id',$id)->where('domain',Session::get('domain'))->first();

		if(isset($obj_category) && $obj_category!=null)

		{

			$this->arr_view_data['category']	=	$obj_category->toArray();

		}

		else

		{

			Flash::error('Something went wrong please try again');

			return redirect()->back();	

		}



		$this->arr_view_data['arr_lang']			 = $this->LanguageService->get_all_language();

		$this->arr_view_data['edit_mode']       	 = TRUE;

		$this->arr_view_data['page_title']		     = "Edit ".$this->module_title;

		$this->arr_view_data['module_title']         = $this->module_title;

		$this->arr_view_data['sub_module_icon']      = 'fa fa-edit';

		$this->arr_view_data['parent_module_icon']   = "icon-home2";

		$this->arr_view_data['parent_module_title']  = "Dashboard";

		$this->arr_view_data['parent_module_url']    = $this->admin_url_path.'/dashboard';

		$this->arr_view_data['module_icon']          = $this->module_icon;

		$this->arr_view_data['admin_panel_slug']     = $this->admin_panel_slug;

		$this->arr_view_data['module_url_path']      = $this->module_url_path;

		$this->arr_view_data['enc_id']		         = $enc_id;



		return view($this->module_view_folder.'.edit',$this->arr_view_data);

	}



	public function update(Request $request,$enc_id)

	{

		$arr_data = [];

		$id = base64_decode($enc_id);



		if(!is_numeric($id))

		{

			Flash::error('Something went wrong please try again');

			return redirect()->back();

		}



		$arr_lang	=	$this->LanguageService->get_all_language();



		foreach ($arr_lang as $key => $lang) {

			$arr_rules['category_'.$lang['locale']] = 'required';

		}

 

        $message['required']	= 'This field is required';

        $validator = Validator::make($request->all(),$arr_rules,$message);



        if($validator->fails())

        {	

            return redirect()->back()->withErrors($validator)->withInput($request->all());

        }



        $slug =  strslug($request->category_en);



        $does_exists = $this->BaseModel

        					->where('slug','=',trim($slug))

        					->where('domain',Session::get('domain'))

        					->where('id','<>',$id)

                            ->count();



        if($does_exists>0)

        {

            Flash::error(str_singular($this->module_title).' already exists');

            return redirect()->back();

        }

        

        $category    =  $this->BaseModel->where('id',$id)->first();

        if($category)

        {

                if(sizeof($arr_lang) > 0 )

                {  

                    foreach ($arr_lang as $lang) 

                    {            

                        $category_name   = $request->input('category_'.$lang['locale']);

                        

                        if(isset($category_name) && $category_name != '')

                        {  

                            $translation 		  = $category->translateOrNew($lang['locale']);

                            $translation->name    = trim($category_name);

                            $translation->save();

                            

                            Flash::success($this->module_title .' updated successfully');

                        }

                    }

                } 

                else

                {

                    Flash::error('Problem occured while updating '.$this->module_title);

                }

        }



        return redirect($this->module_url_path);

	}
    
    
    
    
    public function load_data(Request $request)
      { 
        $role = Sentinel::findRoleById(3);

        $userCustomer = $role->users()->with('roles')->get();
 
          
         $login_user = Sentinel::check();
        
        $chk =Sentinel::getUser()->inRole('customer');
        
     
 
        
         $login_user_id = $login_user->id; 
          
         $query = $this->User;   
        
         
         $obj_request_data =  $query->get();
        
         $json_result   = DataTables::of($userCustomer)->make(true);
         $build_result  = $json_result->getData();
 
         if(isset($build_result->data) && sizeof($build_result->data)>0)
         {
           foreach ($build_result->data as $key => $data) 
           {  
                           
            $fullname = ucfirst($data->first_name)." ".ucfirst($data->last_name);
            
            //dd($data);

            $id = $data->id ? $data->id : ''; 
            $edit = url('/')."admin/customer/edit/".$id;
                $actions ="<a class='btn btn-default btn-rounded show-tooltip'   href='". $edit ."' ><i class='fal fa-edit'></i></a>
                <a class='btn btn-default btn-rounded show-tooltip'   href='".url('/')."'/admin/customer/delete/'". $id ."'  ><i class='fal fa-delete'></i></a>";
                             
                            


              $id = isset($data->id)? $data->id :'';
              $pickup_date      = isset($data->pickup_date)? $data->pickup_date :'';          
               $i = $key+1;
               $build_result->data[$key]->sr_no               = $i;
               $build_result->data[$key]->fullname                = $fullname;
               $build_result->data[$key]->email                = $data->email;
               $build_result->data[$key]->register_via                = $data->register_via;
               $build_result->data[$key]->created_at                = date("Y-m-d",strtotime($data->created_at));
               $build_result->data[$key]->actions                = $actions;
                
                
           }
            return response()->json($build_result);
          }else{
              return response()->json($build_result);
          }
        
    
      } 

	



}

