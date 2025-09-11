<?php $__env->startSection('content'); ?>
<?php if(isset($inner_page->id)): ?>
<?php $__env->startSection('title',strip_tags($inner_page->seo_title)); ?>
<?php $__env->startSection('description',strip_tags($inner_page->seo_description)); ?>
<?php $__env->startSection('keywords',strip_tags($inner_page->seo_keyword)); ?>
<?php $__env->startSection('robots',strip_tags($inner_page->robot_tags)); ?>
<?php endif; ?>

<style>
    .eye-position {
        position: absolute;
        right: 16px;
        top: 10px;
        cursor: pointer;
    }
</style>

<div class="hero-section innerpage-section">
    <div class="container">
        <div class="text-center d-flex align-items-center justify-content-center flex-column">
            <h2>Change Password</h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                
                </ol>
            </nav>
        </div>
    </div>
</div>

    <div class="my-cart-section py-4 py-lg-5 wow fadeInUp">
    <div class="container">
        <div class="row inner-main-page desktops-class">
            <div class="col-md-8">
                <!--<div class="already-box-checkout mb-3 ">
                    <span>Already have an Account <a href="#" class="login-link"> Login</a></span>
                </div>-->
                
                <form action="" method="post" id="checkout-form" class="shipping-adderss-main my-4">
                    <div class="shipping_billing_title d-flex justify-content-between align-items-center">
                        <span class="shipping-title">Reset Password</span>
                    </div>
                    <div class="row g-3 my-2">
                        <div class="col-md-6">
                            <label for="o_last_name" class="form-label">New Password</label>
                            <input type="hidden" name="email" value="<?php echo e($email); ?>"/>
                            <input type="hidden" name="security_key" id="security_key" value="<?php echo e($securityKey); ?>"/>
                            <div style="position:relative">
                            <input type="password" class="form-control" id="new_password" name="new_password">
                            <i class="fa fa-eye eye-position" onclick="showPass5();" id="eye-icon5" aria-hidden="true"></i>
                            </div>
                        </div>
                        
                         <div class="col-md-6">
                            <label for="o_last_name" class="form-label">Confirm Password</label>
                            
                            <div style="position:relative">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                            <i class="fa fa-eye eye-position" onclick="showPass6();" id="eye-icon6" aria-hidden="true"></i>
                            </div>
                        </div>
                        
                    </div>
                </form>
                <div class="d-flex align-items-center justify-content-between pb-4">
                    <a style="cursor:pointer" id="checkout_btn" onclick="updateProfile()" class="btn btn-primary">Submit</a>
                </div>
            </div>
            
        </div>
    </div>
    </div>



    <?php echo $__env->make('element.process_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<script>
function showPass4(){
	var type = $('#current_password').attr('type');
	if(type == 'password'){
		$('#current_password').attr('type','text');
		$('#eye-icon4').removeClass('fa-eye').addClass('fa-eye-slash');
	}else{
		$('#current_password').attr('type','password');
		$('#eye-icon4').removeClass('fa-eye-slash').addClass('fa-eye');
	}
}
function showPass5(){
	var type = $('#new_password').attr('type');
	if(type == 'password'){
		$('#new_password').attr('type','text');
		$('#eye-icon5').removeClass('fa-eye').addClass('fa-eye-slash');
	}else{
		$('#new_password').attr('type','password');
		$('#eye-icon5').removeClass('fa-eye-slash').addClass('fa-eye');
	}
}
function showPass6(){
	var type = $('#confirm_password').attr('type');
	if(type == 'password'){
		$('#confirm_password').attr('type','text');
		$('#eye-icon6').removeClass('fa-eye').addClass('fa-eye-slash');
	}else{
		$('#confirm_password').attr('type','password');
		$('#eye-icon6').removeClass('fa-eye-slash').addClass('fa-eye');
	}
}
function updateProfile(){
    var flag = 0;
    if($.trim($("#new_password").val()) == ''){
        flag = 1;
        swal("Error!", 'Please Enter New Password', "error");
        return false;
    }
    if($.trim($("#confirm_password").val()) == ''){
        flag = 1;
        swal("Error!", 'Please Enter Confirm Password', "error");
        return false;
    }
    if($.trim($("#confirm_password").val()) != $.trim($("#new_password").val())){
        flag = 1;
        swal("Error!", 'Password And Confirm Password Must Be Same', "error");
        return false;
    }
    if(flag == 0){
        $('#checkout_btn').html('Processing...');
        $.ajax({
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "<?php echo e(route('resetPasswordChange')); ?>",
            data:$('#checkout-form').serialize(),
            dataType: "json",
            success: function(msg){
                $('#checkout_btn').html('Submit');	
                if (msg.status == 'success'){
                    swal("", "Password has been changed successfully", "success").then((value) => {
                        window.location.href = SiteUrl;
                    });
                }
            },error: function(ts){
                swal("Error!", 'Something went wrong, please try after sometime.', "error");
                return false;
            }
        });	
    }
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views/customers/reset_password.blade.php ENDPATH**/ ?>