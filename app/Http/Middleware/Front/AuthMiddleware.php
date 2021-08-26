<?php

namespace App\Http\Middleware\Front;

use App\Models\User;
 

use Closure;
use Sentinel;
use Session;
use Flash;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        $obj_user = Sentinel::check();
        $user_path    =  config('app.project.customer_panel_slug');
        $arr_except[] =  $user_path;
         $arr_except[] =  $user_path.'/auth/google';
        $arr_except[] =  $user_path.'/auth/google/callback';
        $arr_except[] =  $user_path.'/profile';
         		
         if($obj_user!=false)
        { 
            $user = Sentinel::check();
             if($user!=null)
            {
                 
                if($user->inRole(config('app.project.role_slug.customer_role_slug')))
                {  
                    
                     return $next($request);
                }
                else
                {   
                    Sentinel::logout();
                    Session::flush();   
                    Flash::error('Invalid Login credentials');
                    return redirect('/login');
                }   
                    
            }
            else{

                Sentinel::logout();
                Session::flush();
                Flash::error('Session expired');
                return redirect('/login');
            }
             
        }
          else
        {
            Sentinel::logout();
            return redirect('/login');
        }
      
        return $next($request);
    }
}
