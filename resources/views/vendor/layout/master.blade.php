<!-- HEader -->        
@include('admin.layout.header')    
        
<!-- BEGIN Sidebar -->
@include('admin.layout.sidebar')
<!-- END Sidebar -->

<!-- BEGIN Content -->
 <div id="main-content">
    @yield('main_content')
</div> 
    <!-- END Main Content -->

<!-- Footer -->        
@include('admin.layout.footer')    
                
              