@extends('admin.layout.master')    

@section('main_content')

 
<!-- BEGIN Main Content -->



<!-- Content area -->

<div class="content">
 
		@include('admin.layout._operation_status')

			<div class="panel panel-flat">

				<div class="panel-heading">

					<h5 class="panel-title">Manage Vendor</h5>

					<div class="heading-elements">
 
						<ul class="icons-list">
                         <li>
 								<a href="{{$module_url_path.'/create'}}" class="btn btn-default btn-rounded show-tooltip" title="Add New"><i class="fal fa-plus"></i></a>

							</li>
 						</ul>
 					</div>

					<div class="clearfix"></div>

				</div>				
 
					<div class="table-responsive remove-count">

						<table class="table dataTable no-footer" id="tbl_category">

							<thead>
                                    <tr> 
                                                         <th>No</th>
                                                         <th>Full Name</th>
 														<th>Store Name</th>
                                                         <th>Email</th>
                                                        <th>registered via</th>
                                                         <th>Created at</th>
                                                         <th>Action</th>
                                                      </tr>
 							</thead>

							<tbody id="filter">
 
							</tbody>

						</table>

					</div>

				 

			</div>
 
<script type="text/javascript">
$(function() {
    var table = $(".dataTable").DataTable({
        "bDestroy" : true,
        "bStateSave": false,
        "bSearchable":true,
        "processing": true,
        "serverSide": false,
        "searchDelay": 350,
        "autoWidth": false,
        "bFilter": true,
        "bLengthChange": true,
        //"pageLength": 1,
        ajax: {
            url: "{{ $module_url_path}}/load_data",
            data: function(d) {
                //d['column_filter[customer_id]'] = $("input[name='customer_id']").val()
            }
        },
   
        
        columns: [
            {data : 'sr_no',"orderable":false,"searchable":false,name:'sr_no'},
            {data : 'fullname',"orderable":true,"searchable":true,name:'fullname'},
            {data : 'store_name',"orderable":true,"searchable":true,name:'store_name'},
            {data : 'email',"orderable":true,"searchable":true,name:'email'},
            {data : 'register_via',"orderable":true,"searchable":true,name:'register_via'},
			{data : 'created_at',"orderable":true,"searchable":true,name:'created_at'},
			{data : 'actions',"orderable":true,"searchable":true,name:'actions'},
			
        ],
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 1 ] }
        ],
        "aaSorting": [[2, 'asc']],

    });
   
    $('#searchbar').on( 'keyup change', function() {    
        if(this.value == ''){
            $('.table-search-section input').val(' ').trigger('change');
            $('.table-search-section input').val('');
            table.search('').columns().search('').draw();
            $(".cust_comp_change").prop('checked',false);
            getauthStatus('all');
        }else{
            table.search( this.value ).draw();
        } 
    });    
});
</script>
  
 @endsection





