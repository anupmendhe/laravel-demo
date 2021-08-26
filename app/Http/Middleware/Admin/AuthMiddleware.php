<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;

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
    public function handle(Request $request, Closure $next)
    {
        
        $obj_user = Sentinel::check();
         
        
        if($obj_user!=false)
        { 
             $super_admin_details = $obj_user->toArray();
            view()->share('shared_admin_details',$super_admin_details);
                         
            $user = Sentinel::check();
            
            if($user!=null)
            {
                 
                if($user->inRole(config('app.project.role_slug.admin_role_slug')))
                {   
                   
                    return $next($request);
                }
                else
                {   
                    Sentinel::logout();
                    Session::flush();   
                    Flash::error('Invalid Login credentials');
                    return redirect(url(config('app.project.admin_panel_slug').'/login'));
                }   
                    
            }
            else{

                Sentinel::logout();
                Session::flush();
                Flash::error('Session expired');
                return redirect(url(config('app.project.admin_panel_slug').'/login'));
            }
            if(Session::has('domain')){
                return $next($request);    
            }
            else{
                return redirect(url(config('app.project.admin_panel_slug').'/domain'));
            }
            
        }
        else
        {
            Sentinel::logout();
            return redirect(config('app.project.admin_panel_slug'));
        }
        return $next($request);
    }
}
