

function valid_entry()
{
  var contact_name       = $('#contact_name').val();
  var contact_arn_No     = $('#contact_arn_No').val();
  var cal_option     = $('#cal_option').val();
  var contact_email      = $('#contact_email').val();
  var contact_mobile     = $('#contact_mobile').val();
  var contact_city       = $('#contact_city').val();
  var contact_message    = $('#contact_message').val();
  var con_cap            = $('#con_cap').val();
  var contact_hidden_captch            = $('#contact_hidden_captch').val();
  var error_log          = '';
  
  if(contact_name=='')
  {
    $('#contact_name').css({"border":"1px solid #f00", "background-color":"#f0000026"});
        $('#contact_name_msg').html('Please Enter Name');
    error_log+='Please Enter Name';
  }
  else
  {
  var RegExpression = /^[a-zA-Z\s]*$/;
  if (RegExpression.test($('#contact_name').val()))
  {
    $('#contact_name').css('border','');
    $('#contact_name_msg').html('');
  }
else
    {
      $('#contact_name').css({"border":"1px solid #f00", "background-color":"#f0000026"});
        $('#contact_name_msg').html('Please Enter Valid Name');
      error_log+='Please Enter Name Valid Name';
          }
  }

  

  if(contact_arn_No=='')
  {
    $('#contact_arn_No').css({"border":"1px solid #f00", "background-color":"#f0000026"});
      $('#contact_arn_No_msg').html('Please Enter Arn No');
    error_log+='Please Enter Arn No'; 
  }
  else
  {
    if(!isNaN($('#contact_arn_No').val()))
{
  $('#contact_arn_No').css("border", "");
              $('#contact_arn_No_msg').html('');
    }
    else
    {
      $('#contact_arn_No').css({"border":"1px solid #f00", "background-color":"#f0000026"});
        $('#contact_arn_No_msg').html('Please Enter Valid Arn No');
      error_log+='Please Enter Valid Arn No';
}

if($('#contact_arn_No').val().match(/[^0-9]/g)){
$('#contact_arn_No').css("border", "");
              $('#contact_arn_No_msg').html('');
}
else{
  $('#contact_arn_No').css({"border":"1px solid #f00", "background-color":"#f0000026"});
  $('#contact_arn_No_msg').html('Please Enter Valid Arn No');
error_log+='Please Enter Valid Arn No';
}
  }



  let productOption = $('#cal_option').find(":selected").text();
  console.log(productOption);

  if (productOption == 'Select Product') {
    $('#cal_option').css({"border":"1px solid #f00", "background-color":"#f0000026"});
    $('#cal_option_msg').html('Please select any product');
    error_log+='Please Enter Name';
  }
  else if(productOption != 'Select Product') {
    $('#cal_option').css({"border":"", "background-color":""});
    $('#cal_option_msg').html('');
  }



  if(contact_email=='')
  {
    $('#contact_email').css({"border":"1px solid #f00", "background-color":"#f0000026"});
      $('#contact_email_msg').html('Please Enter Email');
    error_log+='Please Enter Email';
  }
  else
  {
    var RegExpression_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    
    if(RegExpression_email.test($('#contact_email').val()))
    {
      $('#contact_email').css('border','');
      $('#contact_email_msg').html('');
    }
    else
    {
      $('#contact_email').css({"border":"1px solid #f00", "background-color":"#f0000026"});
        $('#contact_email_msg').html('Please Enter Valid Email');
      error_log+='Please Enter Valid Email';
    }
}
  if(contact_mobile=='')
  {
    $('#contact_mobile').css({"border":"1px solid #f00", "background-color":"#f0000026"});
      $('#contact_mobile_msg').html('Please Enter Mobile');
    error_log+='Please Enter Mobile';
  }
  else
  {
    
    if(!isNaN($('#contact_mobile').val()))
{
      var phoneno = /^\d{10}$/;
      if($('#contact_mobile').val().match(phoneno))
            {
        $('#contact_mobile').css('border','');
        $('#contact_mobile_msg').html('');
      }
      else
      {
        $('#contact_mobile').css({"border":"1px solid #f00", "background-color":"#f0000026"});
          $('#contact_mobile_msg').html('Please Enter Valid Mobile No.');
        error_log+='Please Enter Valid Mobile No';
      }
    }
    else
    {
      $('#contact_mobile').css({"border":"1px solid #f00", "background-color":"#f0000026"});
        $('#contact_mobile_msg').html('Please Enter Valid Mobile No..');
      error_log+='Please Enter Valid Mobile No';
    }
}
  if(contact_city=='')
  {
    $('#contact_city').css({"border":"1px solid #f00", "background-color":"#f0000026"});
      $('#contact_city_msg').html('Please Enter City');
    error_log+='Please Enter City';
  }
  else
  {
    
    if(!isNaN($('#contact_city').val()))
    {
    $('#contact_city').css({"border":"1px solid #f00", "background-color":"#f0000026"});
      $('#contact_city_msg').html('Please Enter Valid City');
    error_log+='Please Enter valid City';
    }
    else
    {
        $('#contact_city_msg').html('');
    $('#contact_city').css('border','');
    }
  }
  if(contact_message=='')
  {
    $('#contact_message').css({"border":"1px solid #f00", "background-color":"#f0000026"});
      $('#contact_message_msg').html('Please Enter Message');
    error_log+='Please Enter Message';
  }
  else
  {
    $('#contact_message').css('border','');
    $('#contact_message_msg').html('');
}
  if(con_cap=='')
  {
    $('#con_cap').css({"border":"1px solid #f00", "background-color":"#f0000026"});
    $('#con_cap_msg').html('Please Enter  Code');
    error_log+='Please Enter  Code';
  }
  else
  {
    if(con_cap==contact_hidden_captch)
    {
      $('#con_cap').css('border','');
    $('#con_cap_msg').html('');
    }
    else
    {
      $('#con_cap').css({"border":"1px solid #f00", "background-color":"#f0000026"});
      $('#con_cap_msg').html('Please Enter Correct Code');
      error_log+='Please Enter Correct Code';
    }    
}
  if(error_log=='')
  {
    return true;
  }
  else
  {
    return false;
  }
}


