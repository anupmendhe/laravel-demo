@extends('admin.layout.master')    

@section('main_content')

 
<!-- BEGIN Main Content -->



<!-- Content area -->

<div class="content">



		@include('admin.layout._operation_status')

			<div class="panel panel-flat">

				<div class="panel-heading">

					<h5 class="panel-title">Customers</h5>

					<div class="heading-elements">
 
								<a href="{{$module_url_path.'/create'}}" class="btn btn-default btn-rounded show-tooltip" title="Add New"><i class="fal fa-plus"></i></a>

							</li>
 
						</ul>

					</div>

					<div class="clearfix"></div>

				</div>				

				<form name="frm_manage" id="frm_manage" method="POST" class="form-horizontal" action="{{url($module_url_path)}}/multi_action">

					{{ csrf_field() }}

					<input type="hidden" name="multi_action" value="" />

					<div class="table-responsive remove-count">

						<table class="table dataTable no-footer" id="tbl_category">

							<thead>
                                    <tr>
                                                         <th>No</th>

                                                        <th>Full Name</th>

														<th>Email</th>

                                                        <th>Registered via</th>

                                                        <th>Created at</th>

                                                        <th>Action</th>

                                                     </tr>
								 

							</thead>

							<tbody id="filter">

								

							</tbody>

						</table>

					</div>

				</form>

			</div>



			<div class="modal fade view-modals indext-modals" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

			    <div class="modal-dialog" role="document">

			      <div class="modal-content">

			        <div class="modal-header">

			          <h5 class="modal-title" id="exampleModalLabel">Send Push Notification </h5>

			          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

			            <span aria-hidden="true">&times;</span>

			          </button>

			        </div>

			        <div class="modal-body">

			        

			        <form action="{{url('/')}}/send_notification" method="POST" id="notification_frm">



			           {{ csrf_field() }}

			        

				        <div class="review-detais">

				          <div class="boldtxts" id="header_title"></div>

				          <div class="clearfix"></div>

				        </div>



				        <div class="review-detais">

				        <div class="form-group" style="">

				            <div class=" controls" >

				                <textarea data-rule-required="true" rows="5" data-rule-maxlength="500" class="form-control" name="message" id="message"></textarea>

				                <label id="message_error" for="message" class="error" style="color:#a94442"></label>

				          </div>

				        </div>

				          {{-- <div class="clearfix"></div> --}}

				        </div>
  
				        <input type="hidden" name="enc_user_id" id="enc_user_id">

				        <input type="hidden" name="enc_user_type" id="enc_user_type">

				        <input type="hidden" name="notification_type" id="notification_type">



				        </div>

				        <div class="modal-footer">

				          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

				          <button type="button"  id="btn-notification"

				           onclick="send_notification()" class="btn btn-primary" >Send Notification</button>

				        </div>

				        {{-- </form> --}}

			        

			        </form>



			      </div>

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





