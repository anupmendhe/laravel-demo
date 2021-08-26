
/*$("#email").on("blur",function(){
  var email_pattern   =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
  var email = $(this).val();

  if($(this).val()!=''){
    console.log(email_pattern.test(email));
    if(!email_pattern.test(email))
    { 
      $('#err_email').show();
      $("#err_email").text('Please enter a valid email address.'); 
      flag = 1;
    }
    else
    {
        $.ajax({
            type: "get",
            url: email_existence_url,
            data:{'email':$(this).val()},
            success: function(data){
                    
              if(data=="error")
              {
                $('#err_email').show();
                $("#err_email").text('This email is already in use.'); 
                flag = 1;
              }
              else
              {
                $("#err_email").text(''); 
              }
            }
         });  
    } 
  } 
  else
  {
      $('#err_email').show();
      $("#err_email").text('This field is required.'); 
      flag = 1;
  }
   
});*/

$('#next_form').on('click',function(){

    var flag       = 0;
    var user_name  = $.trim($('#user_name').val());
    var mobile_no  = $.trim($('#mobile_no').val());
    var password   = $.trim($('#password').val());
    var c_password = $.trim($('#c_password').val());
    var code       = $.trim($('#phone').val());
    
    var pass_pattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;

    var mobile_pattern  = /^[0-9]+$/;
    var code_pattern    = /^[0-9\+]+$/;

    if(code!='')
    {
      if(!code_pattern.test(code))
      { 
        $('#err_code').show();
        $("#err_code").text('يرجى إدخال رمز بلد صالح.'); 
        flag = 1;
      }
    }
    else
    {
        $('#err_code').show();
        $("#err_code").text('مطلوب.'); 
        flag = 1;
    }
    if(mobile_no!='')
    {
      if(!mobile_pattern.test(mobile_no))
      { 
        $('#err_mobile').show();
        $("#err_mobile").text('من فضلك أدخل رقما صالحا'); 
        flag = 1;
      }
      else if((mobile_no).length<8)
      {
        $('#err_mobile').show();
        $("#err_mobile").text('يرجى إدخال 8 أحرف على الأقل.');  
        flag = 1;
      }
      else if((mobile_no).length>16)
      {
        $('#err_mobile').show();
        $("#err_mobile").text('الرجاء إدخال ما لا يزيد عن 16 حرفا.');  
        flag = 1;
      }
      else
      {
          $.ajax({
              type: "get",
              url: mobile_existence_url,
              data:{'mobile_no':mobile_no},
              async: false,
              success: function(data){
                if(data=="error")
                {
                  $('#err_mobile').show();
                  $("#err_mobile").text('هذا الهاتف المحمول قيد الاستخدام بالفعل.'); 
                  flag = 1;
                }
                else
                {
                  $("#err_mobile").text(''); 
                }
              }
           });
      }
    } 
    else
    {
        $('#err_mobile').show();
        $("#err_mobile").text('هذه الخانة مطلوبه.'); 
        flag = 1;
    }

    if(user_name!='')
    {
      $.ajax({
          type: "get",
          url: username_existence_url,
          data:{'user_name':user_name},
          async: false,
          success: function(data){
            if(data=="error")
            {
              $("#err_user_name").show();
              $("#err_user_name").text('اسم المستخدم هذا تم استخدامه.');  
              flag = 1; 
            }
            else
            {
              $("#err_user_name").text(''); 
            }
          }
       });
    } 
    else
    {
        $('#err_user_name').show();
        $("#err_user_name").text('هذه الخانة مطلوبه.'); 
        flag = 1;
    }
    

    if(password=='')
    {
      $('#pwd').show();
      $("#pwd").text('هذه الخانة مطلوبه.'); 
      flag = 1;
    }
    else
    {
      if(!pass_pattern.test(password))
      {
        $('#pwd').show();
        $("#pwd").text('يجب أن تحتوي كلمة المرور على (1) أحرف صغيرة ، (1) أحرف كبيرة ، (1) أحرف خاصة.'); 
        flag = 1;   
      }
    }  
    
    if(c_password=='')
    {
      $('#c_pwd').show();
      $("#c_pwd").text('هذه الخانة مطلوبه.'); 
      flag = 1;
    }
    else if(password!=c_password) 
    {
      $('#c_pwd').show();
      $("#c_pwd").text('كلمة المرور وإعادة كتابة كلمة المرور يجب أن تكون نفسها.'); 
      flag = 1;
    }

 /* if(flag==1) 
  {
    return false;
  }*/
  if(flag==0)
  { 
      sendOtp();
      $(this).parent().parent().parent().parent("form").addClass("form-three");
      $(".back-btn-block").removeClass("for-first-form").addClass("for-two-form");
      $('.sin-up-arrow-back').addClass('three-from-back');
      

  }
});

/*$('#first_name').on('blur',function(){

  if($(this).val()!=''){
      var pattern = /^[a-zA-Z \-]+$/;
      if(!pattern.test($(this).val()))
      {
        $('#err_first_name').show();
        $('#err_first_name').text('الرجاء إدخال صيغة صالحة.');
        flag = 1;
      }
  }
  else
  {
      $('#err_first_name').show();
      $('#err_first_name').text('This field is required.');
      flag = 1;
  }
            
})

$('#last_name').on('blur',function(){
  
  if($(this).val()!=''){
      var pattern = /^[a-zA-Z \-]+$/;
      if(!pattern.test($(this).val()))
      {
        $('#err_last_name').show();
        $('#err_last_name').text('Please enter a valid format.');
        flag = 1;
      }
  }
  else
  {
      $('#err_last_name').show();
      $('#err_last_name').text('This field is required.');
      flag = 1;
  }
            
})*/

 
$('#next').on('click',function(){
          var flag = 0;
          var first_name = $.trim($('#first_name').val());
          var last_name  = $.trim($('#last_name').val());
          var email      = $.trim($('#email').val());
          var address    = $.trim($('#autocomplete').val());
          var gender     = $.trim($('#gender').val());

          $('#err_first_name').empty();
          $('#err_last_name').empty();
          $('#err_email').empty();
          $('#err_mobile').empty();
          $('#err_gender').empty();

          if(first_name=='')
          {
            $('#err_first_name').css('display','block');
            $('#err_first_name').text('هذه الخانة مطلوبه.');
            flag = 1;
          }
          else
          {
            var pattern = /^[a-zA-Z \-]+$/;
            if(pattern.test(first_name)==false)
            {
              $('#err_first_name').css('display','block');
              $('#err_first_name').text('الرجاء إدخال صيغة صالحة.');
              flag = 1;
            }
          }

          if(last_name=='')
          {
            $('#err_last_name').css('display','block');
            $('#err_last_name').text('هذه الخانة مطلوبه.');
            flag = 1;
          }
          else
          {
            var pattern = /^[a-zA-Z \-]+$/;
            if(pattern.test(last_name)==false)
            {
              $('#err_last_name').css('display','block');
              $('#err_last_name').text('الرجاء إدخال صيغة صالحة.');
              flag = 1;
            }
          }

          if(address=='')
          {
            $('#err_address').css('display','block');
            $('#err_address').text('هذه الخانة مطلوبه.');
            flag = 1;
          }
          
          if(gender=='')
          {
             $('#err_gender').css('display','block');
             $('#err_gender').text('هذه الخانة مطلوبه.');
              flag = 1;
          }

          if(email=='')
          {
            $('#err_email').css('display','block');
            $('#err_email').text('هذه الخانة مطلوبه.');
            flag = 1;
          }
          else
          {
            var pattern =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if(pattern.test(email)==false)
            {
              $("#err_email").css('display','block');
              $('#err_email').text('من فضلك أدخل بريد أليكترونى صحيح.');
              flag = 1;
            }
            else
            {
              $.ajax({
                  type:"get",
                  url: email_existence_url,
                  data:{'email':email},
                  async: false,
                  success: function(data){
                    if(data=="error")
                    {
                      $("#err_email").css('display','block');
                      $("#err_email").text('هذا البريد استخدم من قبل.'); 
                      flag = 1;
                    }
                    /*else
                    {
                      $("#err_email").text('');
                      flag = 0;
                    }*/  
                  }
               });
            }
          }
        if(flag==0)
        { 
             $(this).parent().parent().parent().parent("form").addClass("form-next");
             $(this).parent().parent().parent().parent("form").find(".sign-up-circle-two").addClass("active");
             $(this).parent().parent().parent().parent("form").find(".sign-up-circle-one").removeClass("active");
             $(this).parent().parent().parent().parent("form").addClass(".sin-up-arrow-back"); 
        }
});

$('.sin-up-arrow-back.two-arr').click(function(){
      $(this).parent().parent().parent("form").removeClass("form-next");
});
$('.sin-up-arrow-back.three-arr').click(function(){
      $(this).parent().parent().parent("form").removeClass("form-three");
});


      
/*$("#mobile_no").on("keyup",function(){
  $("#err_mobile").text(''); 
});

$("#email").on("keyup",function(){
  $("#err_email").text(''); 
});

$("#user_name").on("keyup",function(){
  $("#err_user_name").text(''); 
});*/