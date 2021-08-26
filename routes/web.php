<?php

use Illuminate\Support\Facades\Route;
 
 
$web_admin_path =config('app.project.admin_panel_slug');
$web_cust_path =config('app.project.customer_panel_slug');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 

// Route::get('/', function () {
    
//     return Sentinel::registerAndActivate([
//     'email'    => 'mendheanup21@gmail.com',
//     'password' => 'Admin@123',
//         ]);
    
    
    
// });

 Route::get('/', function(){

    return view('front.home');

 });
 
Route::group(array('prefix' => $web_admin_path,'middleware'=>['web']), function ()
{
    
$route_slug = 'admin_';
$module_controller = "App\Http\Controllers\Admin\AuthController@";

Route::get('/',                         ['as' =>$route_slug.'login', 'uses' => $module_controller.'login']);

Route::get('/login', ['as' =>$route_slug.'login', 'uses' => $module_controller.'login']);
    
Route::post('process_login',			['as' =>$route_slug.'validate', 'uses' => $module_controller.'process_login']);
    
    
    
});
//auth_admin


Route::group(array('prefix' => $web_admin_path,'middleware'=>'auth_admin'), function () use($web_admin_path)
{
 
	$route_slug = 'admin_';
     
    $module_controller = "App\Http\Controllers\Admin\AuthController@";
    
    Route::get('logout', ['as' =>$route_slug.'logout', 'uses' => $module_controller.'logout']);
		
	
    $module_controller = "App\Http\Controllers\Admin\DashboardController@";
    
   Route::any('/dashboard',				[	'as' 	=> $route_slug.'index', 	 'uses' => $module_controller.'index']);
    
    
 
    
    Route::group(array('prefix' => 'customer'), function () use($route_slug)
	{
		 
        $module_controller = "App\Http\Controllers\Admin\CustomerController@";
        
        Route::get('/',				  		[	'as' =>$route_slug.'index', 			'uses' => $module_controller.'index']);
         
        Route::get('/load_data',				['as' => $route_slug.'load_data',  'uses' => $module_controller.'load_data']);

 
        Route::get('/create',	    	        ['as' => $route_slug.'create',              'uses' => $module_controller.'create']);
		
		Route::post('/store',				['as' => $route_slug.'store', 		'uses' => $module_controller.'store']);

		Route::get('/edit/{id}',	  		['as' => $route_slug.'edit', 			'uses' => $module_controller.'edit']);

 
		Route::post('/update',	  				['as' => $route_slug.'update', 				'uses' => $module_controller.'update']);

  
		Route::get('/delete/{id}',				['as' => $route_slug.'delete', 				'uses' => $module_controller.'delete']);
       
 	
	});
    
        Route::group(array('prefix' => 'vendor'), function () use($route_slug)
	{
		 
        $module_controller = "App\Http\Controllers\Admin\VendorController@";
        
        Route::get('/',				  		[	'as' =>$route_slug.'index', 			'uses' => $module_controller.'index']);
         
        Route::get('/load_data',				['as' => $route_slug.'load_data',  'uses' => $module_controller.'load_data']);

 
        Route::get('/create',	    	        ['as' => $route_slug.'create',              'uses' => $module_controller.'create']);
		
		Route::post('/store',				['as' => $route_slug.'store', 		'uses' => $module_controller.'store']);

		Route::get('/edit/{id}',	  		['as' => $route_slug.'edit', 			'uses' => $module_controller.'edit']);

 
		Route::post('/update',	  				['as' => $route_slug.'update', 				'uses' => $module_controller.'update']);

  
		Route::get('/delete/{id}',				['as' => $route_slug.'delete', 				'uses' => $module_controller.'delete']);
       
 	
	}); 
});


Route::group(array('prefix' => $web_cust_path,'middleware'=>['web']), function ()
{
 
    $module_controller = "App\Http\Controllers\Front\AuthController@";
     
    Route::get('/login', [ 	'as'	=>	'', 'uses'	=>	$module_controller.'login']);
  
	Route::post('/process_login', [ 	'as'	=>	'', 'uses'	=>	$module_controller.'process_login']);
 
	Route::any('/logout', [	'as'	=>	'logout', 'uses'	=>	$module_controller.'logout']);
 
	Route::get('/signup', [ 	'as'	=>	'signup', 'uses'	=>	$module_controller.'signup']);
	Route::any('/register', [ 	'as'	=>	'register', 'uses'	=>	$module_controller.'register']);
      
													
    Route::get('auth/google', [	'as' 	=>	'',
															'uses' 	=>	$module_controller.'redirectToGoogle']); 
    Route::get('auth/google/callback', [	'as' 	=>	'',
															'uses' 	=>	$module_controller.'handleGoogleCallback']);
});

 

Route::group(['prefix' => config('app.project.customer_panel_slug'),'middleware' => ['Front','web']], function ()
{
 
	Route::group(array('prefix' => 'profile'), function ()
	{
		$route_slug        = "profile_";
		$module_controller = "App\Http\Controllers\Front\ProfileController@";

		Route::get('/',             					[	'as' 	=>	'',
															'uses' 	=>	$module_controller.'index']);

		Route::post('/update_profile/{id}',             [	'as' 	=>	'',
															'uses' 	=>	$module_controller.'update_profile']);
        
       
           
        
        
            

      
	});
  
});






 



 

 
