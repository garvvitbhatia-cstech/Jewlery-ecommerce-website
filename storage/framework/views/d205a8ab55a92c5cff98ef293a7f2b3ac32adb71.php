<?php
  $setting = Helper::settings();
?>
<footer class="footer  wow fadeInUp">
      <div class="container">
        <div class="newsletter">
          <h3 class="text-white">Sign up our newsletter</h3>
          <div class="form w-100">
            <div class="col-md-9 col-lg-7 d-flex mx-auto align-items-center">
              <input type="text" class="subs-box" id="newsletter_subscribe" placeholder="Enter your email id">
              
              <button id="newsletter_subscribe_btn" class="btn bg-dark text-white">Signup</button>
              
            </div>
          </div>
        </div>
        
        <div class="row wow fadeInUp">
          <div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">Online Store Support</h4>
              <ul class="list-unstyled">
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Contact Us</a></li>
                <li><a href="<?php echo e(url('/faqs')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> FAQs</a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Order Tracking</a></li>
                <?php if(!session()->has('login_user_email')): ?>
                  <li><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> My Account</a></li>
                <?php else: ?>
                <li><a href="<?php echo e(url('my-account')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> My Account</a></li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">Policies</h4>
              <ul class="list-unstyled">
                <li><a href="<?php echo e(url('privacy-policy')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Privacy Policy</a></li>
                <li><a href="<?php echo e(url('shipping-and-return')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Shipping & Returns</a></li>
                <li><a href="<?php echo e(url('terms-and-conditions')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Terms & Conditions</a></li>
              </ul>
            </div>
          </div>
          <!---<div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">More Ways to Shop</h4>
              <ul class="list-unstyled">
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Catalog</a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Best Sellers</a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> New Arrivals</a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Exhibitions</a></li>
              </ul>
            </div>
          </div>--->
          <div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">About Us</h4>
              <ul class="list-unstyled">
                <li><a href="<?php echo e(url('about-us')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> About Us</a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Store Events</a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Met Wholesale</a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Order Tracking</a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Licensees</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">Visit The SGJ</h4>
              <ul class="list-unstyled">
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Contact.svg" alt=""> <?php echo e($setting->mobile); ?></a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Email.svg" alt="">  <?php echo e($setting->admin_email); ?></a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Location.svg" alt=""> <?php echo nl2br($setting->business_address); ?></a></li>
              </ul>
            </div>
          </div>
          
        </div>
        <hr class="w-100">
        <div class="footer-bottom">
          <p class="copyright-text text-white"><?php echo e($setting->footer_content); ?></p>
            <ul class="social list-unstyled d-flex flex-row">
              <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Instagram.svg" alt=""></a></li>
              <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Facebook.svg" alt=""></a></li>
              <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/twitter x.svg" alt=""></a></li>
              <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/twitter-x.svg" alt=""></a></li>
            </ul>
        </div>
      </div>        
    </div>
  </footer>
  


  <!--Search box model start-->
<div class="modal fade search-box-model" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
      <a href="" type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></a>
    <div class="modal-body">
      <form action="#" class="search-box-form">
          <div class="search-form-main">
            <input type="search" placeholder="Search Product" class="search-box-field">
            <button type="submit" class="search-btn"><img src="<?php echo e(asset('public/img/home/')); ?>/search.svg"/></button>
          </div>
      </form>
    </div>    
  </div>
</div>
</div>
<!--Search box model end -->


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
            <input type="email" class="form-control email_login" id="email_login" name="email_login" onkeyup="$('#email_loginError').remove();" placeholder="Enter Your Username">
          </div>
          <div class="col-md-12 text-start-login">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control password_login" id="password_login" name="password_login" onkeyup="$('#password_loginError').remove();" placeholder="Enter Your Password">
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
            <input type="email" class="form-control forgot_email" id="forgot_email" onkeyup="$('#forgot_emailError').remove();" name="forgot_email" placeholder="Enter Your Email Address">
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
<div class="modal fade" class="customer-signup-form" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
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
            <input type="text" class="form-control name" id="name" onkeyup="$('#nameError').remove();" name="name" placeholder="Enter Your Name">
          </div>

          <div class="col-md-12 text-start-input">
            <label for="inputEmail4" class="form-label">Email Address</label>
            <input type="email" class="form-control email" id="email" name="email" onkeyup="$('#emailError').remove();" placeholder="Enter Your Email Address">
          </div>

          <div class="col-md-12 text-start-input">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control password" id="password" onkeyup="$('#passwordError').remove();" name="password" placeholder="Enter Your Password">
          </div>

          <div class="col-md-12 text-start-input">
            <label for="inputPassword4" class="form-label">Confirm Password</label>
            <input type="password" class="form-control password_confirmation" id="password_confirmation" onkeyup="$('#password_confirmationError').remove();" name="password_confirmation" placeholder="Enter Your Confirm Password">
          </div>

          <div class="col-md-12 text-start-input">
            <label for="inputEmail4" class="form-label">Phone Number</label>
            <input type="mobile" class="form-control numberonly mobile" maxlength="10" id="mobile" onkeyup="$('#mobileError').remove();" name="mobile" placeholder="Enter Your Phone Number">
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
</script>

<!--Register model end-->
<?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views/element/footer.blade.php ENDPATH**/ ?>