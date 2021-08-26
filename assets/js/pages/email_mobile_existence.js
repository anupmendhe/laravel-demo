$("#email").on("blur",function(){
  if($(this).val()!=''){
  	$.ajax({
      type: "get",
      url: email_existence_url,
      data:{'email':$(this).val()},
      success: function(data){
      		
        if(data=="error")
        {
          $("#err_email").text('This email is already in use.'); 
          $('#email').val('');
        }
        else
        {
          $("#err_email").text(''); 
        }
      }
   });	
  }	
   
})

$("#mobile_no").on("blur",function(){
	if($(this).val()!=''){
		$.ajax({
	      type: "get",
	      url: mobile_existence_url,
	      data:{'mobile':$(this).val()},
	      success: function(data){
	        if(data=="error")
	        {
	          $("#err_mobile").text('This mobile is already in use.'); 
            $('#mobile_no').val('');
	        }
	        else
	        {
	          $("#err_mobile").text(''); 
	        }
	      }
	   });
	}	
})

$("#user_name").on("blur",function(){

  if($(this).val()!=''){
    $.ajax({
        type: "get",
        url: username_existence_url,
        data:{'user_name':$(this).val()},
        success: function(data){
          if(data=="error")
          {
            $("#err_user_name").text('This username is already in use.'); 
            $('#user_name').val('');
          }
          else
          {
            $("#err_user_name").text(''); 
          }
        }
     });
  } 
})


$("#mobile_no").on("keyup",function(){
  $("#err_mobile").text(''); 
});

$("#email").on("keyup",function(){
  $("#err_email").text(''); 
});

$("#user_name").on("keyup",function(){
  $("#err_user_name").text(''); 
});