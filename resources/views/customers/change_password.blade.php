@extends('layout.default')
@section('content')
@if(isset($inner_page->id))
@section('title',strip_tags($inner_page->seo_title))
@section('description',strip_tags($inner_page->seo_description))
@section('keywords',strip_tags($inner_page->seo_keyword))
@section('robots',strip_tags($inner_page->robot_tags))
@endif

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
                        <span class="shipping-title">Change Password</span>
                    </div>
                    <div class="row g-3 my-2">
                        
                        <div class="col-md-4">
                            <label for="o_first_name" class="form-label">Current Password</label>
                            
                            <div style="position:relative">
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            <i class="fa eye-position fa-eye" onclick="showPass4();" id="eye-icon4" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="o_last_name" class="form-label">New Password</label>
                            
                            <div style="position:relative">
                            <input type="password" class="form-control" id="new_password" name="new_password">
                            <i class="fa fa-eye eye-position" onclick="showPass5();" id="eye-icon5" aria-hidden="true"></i>
                            </div>
                        </div>
                        
                         <div class="col-md-4">
                            <label for="o_last_name" class="form-label">Confirm Password</label>
                            
                            <div style="position:relative">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                            <i class="fa fa-eye eye-position" onclick="showPass6();" id="eye-icon6" aria-hidden="true"></i>
                            </div>
                        </div>
                        
                    </div>
                </form>
                <div class="d-flex align-items-center justify-content-between pb-4">
                    <a href="#" style="cursor:pointer" id="checkout_btn" onclick="updateProfile()" class="btn btn-primary">Submit</a>
                </div>
            </div>
            
        </div>
    </div>
    </div>



    @include('element.process_section')


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
	$('#checkout_btn').html('Processing...');
	$.ajax({
		type: 'POST',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		url: "{{route('change-password')}}",
		data:$('#checkout-form').serialize(),
		dataType: "json",
		success: function(msg){
			$('#checkout_btn').html('Submit');			
			if(msg.success){
                swal("Success!", msg.message, "success");
			}else{
                swal("Error!", msg.message, "error");
			}
		},error: function(ts) {
			showMessage('Something went wrong, please try after sometime.');
			return false;
		}
	});	
}
</script>

@endsection