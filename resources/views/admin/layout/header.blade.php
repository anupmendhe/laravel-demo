    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ isset($module_title)?$module_title:"" }} - {{ ucwords(config('app.project.name')) }}</title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/assets/css/custom.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/assets/css/sweetalert.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/assets/css/icons/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
         <link href="{{url('/')}}/assets/css/fontawesome-v5.7.2-pro.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/front/css/intlTelInput.css">
        <link rel="stylesheet" href="{{url('/')}}/assets/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/chef/css/jquery-ui.css"/>
        <!-- /global stylesheets -->
        <script src="{{url('/')}}/assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="{{url('/')}}/assets/js/pages/image_validation.js"></script>
        <script type="text/javascript" src="{{url('/')}}/assets/js/pages/multiple_image_upload.js"></script>
        <link rel="shortcut icon" type="image/png" href="{{ url('/assets/images/fav_icon.png') }}"/>
        <script type="text/javascript" src="{{url('/')}}/assets/js/core/libraries/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css"/>
        <script src="{{url('/')}}/chef/js/jquery-ui.js"></script>
        <style type="text/css">
        .dataTables_length{
            float: left;
            padding-top: 10px;
        }
        .dataTables_info{
            padding: 15px!important;
        }
        td {
            padding: 5px 20px!important;
        }
        .filled-in{    width: 16px;
            height: 16px;

        }

        .dataTables_paginate {
            margin: 20px!important;
            
        }
.navbar-brand{padding: 1px 20px;}
        .navbar-brand > img {

        height: auto;
        }
        .dataTables_filter {
            margin: 0;
        }
        .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
            padding: 5px 20px!important;
        }
        .btn-file
        {
            margin-top: 5px;
            height: 32px;
        }
    </style>

    </head>
    
    <body class="pace-done">
        <!-- Main navbar -->
        @php
        $admin_path = config('app.project.admin_panel_slug');
        @endphp
        <div class="navbar navbar-inverse">
            <div class="navbar-header">
                <a style="color:black;" class="navbar-brand" href="{{url('/')}}/admin/dashboard">
                      Company Logo
                 </a>
                 <ul class="nav navbar-nav visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                    <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
            </div>

             <div class="navbar-collapse collapse" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li><a class="sidebar-control sidebar-main-toggle hidden-xs" title="Menu Minimise/Maximise "><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
                
                <ul class="nav navbar-nav head-inname">
                      <h4>Super Admin </h4>
                </ul>
 
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown head-noti">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fal fa-bell" aria-hidden="true"></i>
                        <span class="visible-xs-inline-block position-right">Notifications</span>
                         <span class="badge bg-warning-400">
                         </span>
                     </a>
                     <div class="dropdown-menu dropdown-content width-350">
                    
                        <div class="dropdown-content-footer">
                            <a href="{{url('/')}}/{{config('app.project.admin_panel_slug')}}/notifications" data-popup="tooltip" title="All Notifications"><i class="icon-menu display-block"></i></a>
                        </div>
                    </div>
                </li>
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
             
            
                         <span>{{isset($shared_admin_details['first_name'])?$shared_admin_details['first_name']:''}}</span>
                        <i class="caret"></i>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-right">
<!--                        <li><a href="{{url('admin/change_password')}}"><i class="icon-key"></i> Change Password</a></li>-->
                        <li class="divider"></li>
                        <li><a href="{{ url('admin/logout') }}"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
         
        <!-- /main navbar -->