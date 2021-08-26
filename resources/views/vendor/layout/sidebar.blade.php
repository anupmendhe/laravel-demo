
<?php


 ?>
<!-- Page container -->
<div class="page-container">

  <!-- Page content -->
  <div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-main">
      <div class="sidebar-content">
  
          <!-- Main navigation -->
          <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
              <ul class="navigation navigation-main navigation-accordion">

                <!-- Main -->
                 <li class="@if(Request::segment(2) == 'dashboard') active @endif"><a href="{{url('admin/dashboard')}}"><i class="fal fa-home"></i> <span>Dashboard</span></a></li>
 
                <li class="@if(Request::segment(2) == 'customer') active @endif">
                  <a href="{{url('/')}}/admin/customer"><i class="fa fa-money"></i><span>Manage Customers</span></a>
                   
                </li>
                  <li class="@if(Request::segment(2) == 'vendor') active @endif">
                  <a href="{{url('/')}}/admin/vendor"><i class="fa fa-money"></i><span>Manage Vendors</span></a>
                   
                </li>
 
  
        </ul>
      </div>
    </div>

  </div>
</div>
<div class="content-wrapper box-navy_blue">

