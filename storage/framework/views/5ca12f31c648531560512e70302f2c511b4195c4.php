<?php if(!session()->has('login_user_email')): ?>
<!--Login Register popup-->
<!-- login -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <?php echo e(Form::open(array('class' => 'row', 'id' => 'customerLoginForm', 'method' => 'post', 'files' => 'true'))); ?> 
          <div class="col-md-12 text-start-login">
            <label for="inputEmail4" class="form-label">Email Or Phone Number</label>
            <input type="email" class="form-control email_login" id="email_login" name="email_login" onkeyup="$('#email_loginError').remove();">
          </div>
          <div class="col-md-12 text-start-login">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control password_login" id="password_login" name="password_login" onkeyup="$('#password_loginError').remove();">
          </div>           
          <div class="col-12 pt-3">
            <button type="button" id="customer_login_btn" class="btn btn-primary">Sign in</button>
          </div>            
        <?php echo e(Form::close()); ?>

    </div>
    <div class="modal-footer d-flex align-items-center justify-content-between">
      <a href="" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Forgot Password</a>
      <a href="" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal">Register</a>
    </div>
  </div>
</div>
</div>

<!--Login Register popup end-->

<!--Forgot password model-->
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="staticBackdropLabel">Forgot Password</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <p class="mb-4">Forgot Your Password? Enter your email address to retrieve or reset your password.</p>
          <?php echo e(Form::open(array('class' => 'row g-3', 'id' => 'customerForgotPasswordForm', 'method' => 'post', 'files' => 'true'))); ?>

          <div class="col-md-12 text-start-forgot">
            <label for="inputEmail4" class="form-label">Email Address</label>
            <input type="email" class="form-control forgot_email" id="forgot_email" onkeyup="$('#forgot_emailError').remove();" name="forgot_email">
          </div>
          
          <div class="col-12">
            <button type="button" id="forgot_password_btn" class="btn btn-primary">Send Email</button>
          </div>          
          <?php echo e(Form::close()); ?>

    </div>
    <div class="modal-footer d-flex align-items-center justify-content-between">
      <a href="" data-bs-target="#staticBackdrop" data-bs-toggle="modal">Back To Login</a>
    </div>
  </div>
</div>
</div>
<!--Forgot password model end-->

<!--Register model-->
<div class="modal fade customer-signup-form" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="staticBackdropLabel">Register</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <?php echo e(Form::open(array('class' => 'row', 'id' => 'customerRegistrationForm', 'method' => 'post', 'files' => 'true'))); ?> 
          <div class="col-md-12 text-start-input">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control name" id="name" onkeyup="$('#nameError').remove();" name="name">
          </div>

          <div class="col-md-12 text-start-input">
            <label for="inputEmail4" class="form-label">Email Address</label>
            <input type="email" class="form-control email" id="email" name="email" onkeyup="$('#emailError').remove();">
          </div>

          <div class="col-md-12 text-start-input">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control password" id="password" onkeyup="$('#passwordError').remove();" name="password">
          </div>

          <div class="col-md-12 text-start-input">
            <label for="inputPassword4" class="form-label">Confirm Password</label>
            <input type="password" class="form-control password_confirmation" id="password_confirmation" onkeyup="$('#password_confirmationError').remove();" name="password_confirmation">
          </div>

          <div class="col-md-12 text-start-input">
            <label for="inputEmail4" class="form-label">Phone Number</label>
            <input type="mobile" class="form-control numberonly mobile" maxlength="10" id="mobile" onkeyup="$('#mobileError').remove();" name="mobile">
          </div>

          <div class="col-12 text-start-input pt-3">
            <button type="button" id="add_customer_btn" class="btn btn-primary">Submit</button>
          </div>
          
        <?php echo e(Form::close()); ?>

    </div>
    <div class="modal-footer d-flex align-items-center justify-content-between">
      <a href="" data-bs-target="#staticBackdrop" data-bs-toggle="modal">Back to Login</a>
    </div>
  </div>
</div>
</div>


<script>
$(document).on('click','#forgot_password_btn',function(){
  var flag = 0;
  if(flag == 0){
    var url = "<?php echo e(url('/forgot-password')); ?>";
    $('#forgot_password_btn').html('Processing...');
    $('#forgot_password_btn').attr('disabled',true);
    $.ajax({		
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},			
      url: url,
      data: $('#customerForgotPasswordForm').serialize(),
      dataType: 'JSON',
      success:function(response){
        if (response.status == 'error'){
          $('#forgot_email').focus();
          if(response['errors'] != ''){
            $('.field_error').remove();
            $.each(response['errors'], function(key, value){
              $("."+key).slideDown('slow').after().show(0);
              var flag = $('#'+key).parents('.text-start-forgot:first').find('div:first').length;
              if(flag == 0){
                var error_html = '<div class="field_error" id="'+key+'Error" for="'+key+'" generated="true" style="display: inline-block;">'+value+'</div>';
                $("."+key).slideDown('slow').after(error_html);
              }else{
                $("."+key).parents('.text-start-forgot:first').find('div:first').html(value).show(0);
              }
            });
          }
        }else{					
          $($('#customerForgotPasswordForm')[0].reset());
          $('#exampleModalToggle2').modal('hide');
          swal("", response.msg, "success");
        }
        $('#forgot_password_btn').html('Sign In');
        $('#forgot_password_btn').attr('disabled',false);
      }
    });
    return false;
  }

});
$('.numberonly').keypress(function(e){

var charCode = (e.which) ? e.which : event.keyCode

if (String.fromCharCode(charCode).match(/[^0-9+]/g))

return false;

});
$(document).on('click','#customer_login_btn',function(){
  var url = "<?php echo e(route('cutomers.customer-login')); ?>";
  var manish = 1;
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(manish == 1){
    $('#customer_login_btn').html('Processing...');
    $('#customer_login_btn').attr('disabled',true);
    $.ajax({		
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},			
      url: url,
      data: $('#customerLoginForm').serialize(),
      dataType: 'JSON',
      success:function(response){
        if (response.status == 'error'){
          $('#email_login').focus();
          if(response['errors'] != ''){
            $('.field_error').remove();
            $.each(response['errors'], function(key, value){
              $("."+key).slideDown('slow').after().show(0);
              var flag = $('#'+key).parents('.text-start-login:first').find('div:first').length;
              if(flag == 0){
                var error_html = '<div class="field_error" id="'+key+'Error" for="'+key+'" generated="true" style="display: inline-block;">'+value+'</div>';
                $("."+key).slideDown('slow').after(error_html);
              }else{
                $("."+key).parents('.text-start-login:first').find('div:first').html(value).show(0);
              }
            });
          }
        }else{					
          $($('#customerLoginForm')[0].reset());	
          console.log(response);
          window.location.href = SiteUrl;
        }
        $('#customer_login_btn').html('Sign In');
        $('#customer_login_btn').attr('disabled',false);
      }
    });
    return false;
  }
});


$(document).on('click','#add_customer_btn',function(){
  var manish = 1;
  var url = "<?php echo e(route('cutomers.customer-registration')); ?>";
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(manish == 1){
    $('#add_customer_btn').html('Processing...');
    $('#add_customer_btn').attr('disabled',true);
    $.ajax({	
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},				
      url: url,
      data: $('#customerRegistrationForm').serialize(),
      dataType: 'JSON',
      success:function(response){
        if (response.status == 'error'){
          $('#email').focus();
          if(response['errors'] != ''){
            $('.field_error').remove();
            $.each(response['errors'], function(key, value){
              $("."+key).slideDown('slow').after().show(0);
              var flag = $('#'+key).parents('.text-start-input:first').find('div:first').length;
              if(flag == 0){
                var error_html = '<div class="field_error" id="'+key+'Error" for="'+key+'" generated="true" style="display: inline-block;">'+value+'</div>';
                $("."+key).slideDown('slow').after(error_html);
              }else{
                $("."+key).parents('.text-start-input:first').find('div:first').html(value).show(0);
              }
            });
          }
        }else{					
          $($('#customerRegistrationForm')[0].reset());	
          window.location.href = SiteUrl+'/';
        }
        $('#add_customer_btn').html('Submit');
        $('#add_customer_btn').attr('disabled',false);
      }
    });
    return false;
  }
});
</script>

<!--Register model end-->

<?php endif; ?>


<script>
    $(document).on('click','#newsletter_subscribe_btn',function(){
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var flag = 0;
        var url = "<?php echo e(route('ajax.add-newsletter')); ?>";
        if($.trim($("#newsletter_subscribe").val()) == ''){
            flag = 1;
            swal("Error!", 'Please enter email', "error");
        }
        if($.trim($("#newsletter_subscribe").val()) != ''){
            if(!regex.test($.trim($("#newsletter_subscribe").val()))){
                flag = 1;
                swal("Error!", 'Please enter valid email', "error");
            }
        }
        if(flag == 0){
            var email = $.trim($("#newsletter_subscribe").val());
            $.ajax({		
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},			
            url: url,
            data: {email:email},
            type: 'POST',
            success:function(response){
                $('#newsletter_subscribe').val('');
                swal("Success!", 'Newsletter Subscribe Sucessfully.', "success");
            }        
            });
        }
    });
</script><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views/element/registration.blade.php ENDPATH**/ ?>