function confirm_action(ref,evt,msg)
{
   var msg = msg || false;
  
    evt.preventDefault();  
    swal({
          title: "Are you sure ?",
          text: msg,
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function(isConfirm)
        {
          if(isConfirm==true)
          {
            // swal("Performed!", "Your Action has been performed on that file.", "success");
            window.location = $(ref).attr('href');
          }
        });
}    

function confirm_new_action(ref,evt,msg,title,yes,no)
{
   var msg = msg || false;
    evt.preventDefault();  
    swal({
          title: title,
          text: msg,
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: yes,
          cancelButtonText: no,
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function(isConfirm)
        {
          if(isConfirm==true)
          {
            // swal("Performed!", "Your Action has been performed on that file.", "success");
            window.location = $(ref).attr('href');
          }
        });
}    
  
/*---------- Multi_Action-----------------*/

  function check_multi_action(frm_id,action)
  {
    // var len = $('input[name="'+checked_record+'"]:checked').length;

    var len = $('input[name="checked_record[]"]:checked').length;
    var flag=1;
    var frm_ref = $("#"+frm_id);
   

    if(len<=0)
    {
      swal("Oops..","Please select the record to perform this Action.");
      return false;
    }
    
    if(action=='delete')
    {
      var confirmation_msg = "Do you really want to delete selected record(s) ?";
    }
    else if(action == 'deactivate')
    {
      var confirmation_msg =  "Do you really want to inactivate selected record(s) ?";
    }
    else if(action == 'activate')
    {
      var confirmation_msg =  "Do you really want to activate selected record(s) ?";
    }
    
    swal({
          title: "Are you sure ?",
          text: confirmation_msg,
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm)
        {
          if(isConfirm)
          {
            $('input[name="multi_action"]').val(action);
            $(frm_ref)[0].submit();
          }
          else
          {
           return false;
          }
        }); 
  }


  /*---------- Multi_Action-----------------*/

  function check_new_multi_action(frm_id,action,oops_msg,confirmation_msg,title,yes,no)
  {
    // var len = $('input[name="'+checked_record+'"]:checked').length;
    var len = $('input[name="checked_record[]"]:checked').length;
    var flag=1;
    var frm_ref = $("#"+frm_id);
   

    if(len<=0)
    {
      swal(oops_msg);
      return false;
    }
    
    /*if(action=='delete')
    {
      var confirmation_msg = "Do you really want to delete selected record(s) ?";
    }
    else if(action == 'deactivate')
    {
      var confirmation_msg =  "Do you really want to inactivate selected record(s) ?";
    }
    else if(action == 'activate')
    {
      var confirmation_msg =  "Do you really want to activate selected record(s) ?";
    }*/
    
    swal({
          title: title,
          text: confirmation_msg,
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: yes,
          cancelButtonText: no,
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm)
        {
          if(isConfirm)
          {
            $('input[name="multi_action"]').val(action);
            $(frm_ref)[0].submit();
          }
          else
          {
            return false;
          }
        }); 
  }


  /* This function shows simple alert box for showing information */
  function showAlert(msg,type,confirm_btn_txt)
  {
     
      swal({
        title: "",
        text: msg,
        type: type,
        buttons: ["sdfsf"]
      });
      return false; 
  }





