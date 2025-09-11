@extends('layout.default')
@section('content')
@if(isset($inner_page->id))
@section('title',strip_tags($inner_page->seo_title))
@section('description',strip_tags($inner_page->seo_description))
@section('keywords',strip_tags($inner_page->seo_keyword))
@section('robots',strip_tags($inner_page->robot_tags))
@endif


<div class="hero-section innerpage-section">
    <div class="container">
        <div class="text-center d-flex align-items-center justify-content-center flex-column">
            <h2>My Account</h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Account</li>
                
                </ol>
            </nav>
        </div>
    </div>
</div>

    <div class="my-cart-section py-4 py-lg-5 wow fadeInUp">
        <div class="container">                
        <div class="row inner-main-page desktops-class">
            <div class="col-md-8">
                
                <form action="" method="post" id="checkout-form" class="shipping-adderss-main my-4">
                    <div class="shipping_billing_title d-flex justify-content-between align-items-center">
                        <span class="shipping-title">Profile Details</span>
                    </div>
                    <div class="row g-3 my-2">
                        
                        <div class="col-md-4">
                            <label for="o_first_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="o_name" name="o_name" value="{{$userData->name}}" placeholder="Enter your full name">
                        </div>
                        
                         <div class="col-md-4">
                            <label for="o_last_name" class="form-label">Email</label>
                            <input type="text" class="form-control" readonly="readonly" value="{{$userData->email}}">
                        </div>
                        <div class="col-md-4">
                            <label for="o_mobile" class="form-label">Phone No</label>
                            <input type="text" class="form-control numberonly" maxlength="10" name="o_mobile" id="o_mobile" value="{{$userData->mobile}}" placeholder="Enter your mobile number">
                        </div>
                        <div class="col-md-12">
                            <label for="o_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="o_address" name="o_address" value="{{$userData->address}}" placeholder="Enter your address">
                        </div>
                        <div class="col-md-6">
                            <label for="o_city" class="form-label">City</label>
                            <input type="text" class="form-control" id="o_city" name="o_city" value="{{$userData->city}}" placeholder="Enter your city">
                        </div>
                        <div class="col-md-6">
                            <label for="o_state" class="form-label">State</label>
                            <input type="text" class="form-control" id="o_state" name="o_state" value="{{$userData->state}}" placeholder="Enter your state">
                        </div>
                        
                        <div class="col-md-4">
                            <label for="o_pincode" class="form-label">Country</label>
                            <select name="o_country" id="o_country" class="form-select">
                                <option value="">Select Country</option>
                                @foreach($country_list as $key => $country)
                                    <option {{$country->id == $userData->country?'selected':''}} value="{{$country->id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="o_pincode" class="form-label">Pincode</label>
                            <input type="text" class="form-control numberonly" id="o_pincode" name="o_pincode" maxlength="6" value="{{$userData->zipcode}}" placeholder="6 digits pincode">
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
$(document).ready(function(){ 
    $('.numberonly').keypress(function(e){
        var charCode = (e.which) ? e.which : event.keyCode
        if(String.fromCharCode(charCode).match(/[^0-9+]/g))
            return false;
    });
});
function updateProfile(){
	$('#checkout_btn').html('Processing...');
	$.ajax({
		type: 'POST',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		url: "{{route('my-account')}}",
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