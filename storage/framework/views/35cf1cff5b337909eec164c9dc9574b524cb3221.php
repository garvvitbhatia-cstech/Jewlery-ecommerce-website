<?php $__env->startSection('content'); ?>
<?php if(isset($inner_page->id)): ?>
<?php $__env->startSection('title',strip_tags($inner_page->seo_title)); ?>
<?php $__env->startSection('description',strip_tags($inner_page->seo_description)); ?>
<?php $__env->startSection('keywords',strip_tags($inner_page->seo_keyword)); ?>
<?php $__env->startSection('robots',strip_tags($inner_page->robot_tags)); ?>
<?php endif; ?>
<div class="hero-section innerpage-section">
    <div class="container">
        <div class="text-center d-flex align-items-center justify-content-center flex-column">
            <h2>Checkout</h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>                
                </ol>
            </nav>
        </div>
    </div>
</div>

<!--checkout desktop View start here-->
<div class="checkout-page py-4 py-lg-5 wow fadeInUp">
    <div class="container">
        <div class="row inner-main-page desktops-class">
            <div class="col-md-8">
                <!--<div class="already-box-checkout mb-3 ">
                    <span>Already have an Account <a href="#" class="login-link"> Login</a></span>
                </div>-->          
                
                <form action="" method="post" id="checkout-form" class="shipping-adderss-main my-4">
                    <div class="shipping_billing_title d-flex justify-content-between align-items-center">
                        <span class="shipping-title">Shipping Adderss</span>
                        <input type="hidden" name="payment_method" id="payment_method" value="PayU" />
                    </div>
                    <div class="row g-3 my-2">
                        
                        <div class="col-md-6">
                            <label for="o_first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="o_first_name" name="o_first_name" placeholder="Enter your first name">
                        </div>
                        <div class="col-md-6">
                            <label for="o_last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="o_last_name" name="o_last_name" placeholder="Enter your last name" >
                        </div>
                        
                        <div class="col-md-12">
                            <label for="o_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="o_address" name="o_address" placeholder="Enter your address" >
                        </div>
                        <div class="col-md-6">
                            <label for="o_city" class="form-label">City</label>
                            <input type="text" class="form-control" id="o_city" name="o_city" placeholder="Enter your city" />
                        </div>
                        <div class="col-md-6">
                            <label for="o_state" class="form-label">State</label>
                            <input type="text" class="form-control" id="o_state" name="o_state" placeholder="Enter your state">
                        </div>
                        <div class="col-md-4">
                            <label for="o_pincode" class="form-label">Country</label>
                            <select name="o_country" id="o_country" class="form-select">
                                <option value="">Select Country</option>
                                <?php $__currentLoopData = $country_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->country_name); ?>"><?php echo e($country->country_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="o_pincode" class="form-label">Pincode</label>
                            <input type="text" class="form-control numberonly" id="o_pincode" name="o_pincode" maxlength="6" placeholder="6 digits pincode" >
                        </div>
                        <div class="col-md-4">
                            <label for="o_mobile" class="form-label">Phone No</label>
                            <input type="text" class="form-control numberonly" maxlength="10" name="o_mobile" id="o_mobile" placeholder="Enter your phone no">
                        </div>
                        
                    </div>
                </form>
                
                
                <div class="payment-method-blog my-4">
                    <span class="shipping-title">Payment method</span>
                    <div class="row mt-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-check align-items-center mb-3">
                                <input class="form-check-input mt-0" onchange="$('#payment_method').val('PayU');" type="radio" checked="checked" name="flexRadioDefault" value="PayU" id="flexRadioDefault1">
                                <label class="form-check-label ps-1" for="flexRadioDefault1">PayU</label>
                            </div>

                            <div class="form-check align-items-center mb-3">
                                <input class="form-check-input mt-0" onchange="$('#payment_method').val('Paytm');" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Paytm">
                                <label class="form-check-label ps-1" for="flexRadioDefault2">Paytm</label>
                            </div>

                            <div class="form-check align-items-center mb-3">
                                <input class="form-check-input mt-0" onchange="$('#payment_method').val('PayPal');" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="Paypal" >
                                <label class="form-check-label ps-1" for="flexRadioDefault3">Paypal</label>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between pb-4">
                    <a href="<?php echo e(route('pages.index')); ?>" class="btn btn-outline-secondary">Continue Shopping</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="rightsidebar sticky-top">
                    <div class="accordion myOrder-tab-cls" id="accordionExample">
                    
                        <div class="summary-box">
                            <div class="accordion-header">
                                <div class="accordion-button show" data-bs-toggle="collapse" data-bs-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                                    <span class="fit-box d-flex justify-content-between align-items-center ">
                                        <span class="fitlest-textt d-flex fw-bold align-items-center"> <span class="cart-icons pe-1"><img src="<?php echo e($siteUrl); ?>public/images/cart-icon.svg" alt=""></span>Order Summary</span>
                                        
                                    </span>
                                </div>
                            </div>

                            <div id="collapsethree" class="accordion-collapse show collapse" aria-labelledby="headingtwo" data-bs-parent="#accordionExample">
                                <div class="list-product-row">
                                
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="product-list my-3 d-flex">
                                    <a href="#" class="product-img">
                                        <img src="<?php echo e(URL::asset('public/admin/images/teams')); ?>/<?php echo $item->image; ?>" width="100%" class="img-bxx">
                                    </a>
                                    <div class="kk-contant-boxb cart-box-cnt w-100 d-flex justify-content-between">
                                        <span>
                                            <a href="#" class="d-block cat-head fs-1 text-capitalize"><?php echo e($item->product_name); ?></a>
                                            <span class="d-flex kk-price-num align-items-center py-1"> per item</span>
                                        </span>
                                        <div class="price"><small class="fs-6">₹<?php echo e($item->totalamount); ?></small></div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                             
                                
                            </div>
                        </div>
                    </div>

                        <div class="summary-box">
                            <div class="accordion-header">
                                <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="true" aria-controls="collapsethree">
                                    <span class="fit-box d-flex justify-content-between align-items-center ">
                                        <span class="fitlest-textt d-flex fw-bold align-items-center"> <span class="cart-icons pe-1"><img src="<?php echo e($siteUrl); ?>public/images/offers-icon.svg" alt=""></span>Apply Coupon</span>                                        
                                    </span>
                                </div>
                            </div>

                            <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingtwo" data-bs-parent="#accordionExample">
                                <div class="list-product-row">                                        
                                    <div class="product-list align-items-center d-flex">
                                        <form action="" class=" w-100">
                                            <div class="input-group mt-2 coupon-btn mb-3 d-flex justify-content-between">
                                                <input type="text" id="coupon_code" class="form-control me-3" maxlength="8" placeholder="Enter Coupon Code" <?php if(Session::has('couponcode.coupontitle')): ?> value="<?php echo e((Session::get('couponcode.coupontitle'))); ?>" <?php endif; ?> aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                                                
                                                <div id="delete_coupon_code_div">                                    
                                                   <?php if(Session::has('couponcode.price')): ?>
                                                        <a href="<?php echo e(url('/delete-coupon-code')); ?>" id="delete_coupon_code" class="input-group-text btn btn-danger">DELETE</a>
                                                    <?php else: ?>
                                                        <button id="apply_coupon_code" class="input-group-text btn btn-primary" id="basic-addon2">Apply</button>
                                                    <?php endif; ?>
                                                </div>                                                
                                                
                                                <?php if(Session::has('couponcode.price')): ?>
                                                    <p id="" class="mt-2" style="color: green;border: 1px solid;padding: 3px;">Coupon code applied successfully.</h6>
                                                <?php else: ?>                                   
                                                    <p id="coupon_codeError"></p>
                                                <?php endif; ?> 
                                                
                                            </div>
                                        </form>                         
                                    </div>                                        
                                </div>
                            </div>
                        </div>

                        <div class="cart-total-box">
                            <div class="total-price">
                                <p>Total Items:</p>
                                <p class="fw-bold"><?php echo e($items->count()); ?></p>
                            </div>
                            <?php if(Session::has('couponcode.price')): ?>
                            <div class="total-price">
                                <p>Discount:</p>
                                <p class="fw-bold">-₹<?php echo e((Session::get('couponcode.discount'))); ?></p>
                            </div>
                            <?php else: ?>
							<div class="total-price cart-sub-total">
                                
                            </div>
                            <?php endif; ?>
                            <div class="total-price">
                                <p>Total:</p>                                
                                <?php if(Session::has('couponcode.price')): ?>
                                    <p class="fw-bold grand-total-inner-left-md">₹<?php echo e((Session::get('couponcode.price'))); ?></p>
                                <?php else: ?>
                                    <p class="fw-bold grand-total-inner-left-md">₹<?php echo e($totalPrice); ?></p>
                                <?php endif; ?> 
                            </div>
                        </div>

                        <div class="buy-btn-list text-center d-block mt-4">
                            <div class="cart-button-set">
                                <a style="cursor:pointer" onclick="checkout();" id="checkout_btn" class="btn btn-primary w-100">Proceed to Payment</a>
                            </div>
                            
                            <a href="http://" class="d-flex  payments-powered my-4 justify-content-center align-items-center"><span class="ps-2"><img src="<?php echo e($siteUrl); ?>public/img/home/secure-icon.svg" alt=""></span> 100% Secure Payments powered by</a>
                            <a href="http://" class="d-flex justify-content-center">
                                <span><img src="<?php echo e($siteUrl); ?>public/img/home/norton.svg" alt=""></span>
                                <span class="px-2"><img src="<?php echo e($siteUrl); ?>public/img/home/razorpay.svg" alt=""></span>
                                <span><img src="<?php echo e($siteUrl); ?>public/images/paytm.svg" alt=""></span>  
                            </a>
                        </div>

                
                    </div> 
                </div>
                
            </div>
        </div>
    </div>
</div>
<!--checkout desktop View end here-->



<div class="modal fade" id="shippingAddress" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" style='z-index:10000;' tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Shipping Address</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3" method="post" id="shipping-form">
        	<input type="hidden" id="address_id" name="address_id" value="0" />
            <div class="col-md-6">
            <label for="first_name" class="form-label">First name*</label>
            <input type="text" class="form-control" name="first_name" id="first_name">
            </div>
            <div class="col-md-6">
            <label for="last_name" class="form-label">Last Name*</label>
            <input type="text" class="form-control" name="last_name" id="last_name">
            </div>
            <div class="col-md-12">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="col-md-6">
            <label for="mobile" class="form-label">Mobile No*</label>
            <input type="text" class="form-control numberonly" name="mobile" maxlength="10" id="mobile">
            </div>
            <div class="col-md-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="address" id="address">
            </div>
            <div class="col-md-4">
            <label for="city" class="form-label">City*</label>
            <input type="text" class="form-control" name="city" id="city">
            </div>
            <div class="col-md-4">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control" name="state" id="state">
            </div>
            <div class="col-md-4">
            <label for="zip_code" class="form-label">Pincode</label>
            <input type="text" class="form-control numberonly" maxlength="6" name="zip_code" id="zip_code">
            </div>           
        </form>
      </div>
      <div class="modal-footer d-flex align-items-center justify-content-between">
        <a onclick="saveShippingAddress();" id="add_shipping_btn" class="add_btn">Submit</a>
      </div>
    </div>
  </div>
</div>


<script>
$('#apply_coupon_code').on('click', function(){
    var flag = 0;
    var couponcode = $.trim($('#coupon_code').val());
    if ($.trim($('#coupon_code').val()) == "") {
        swal("Error", 'Please Enter Coupon Code.', "error");
        $('#coupon_code').focus();
        frmSubmitted = 0;
        flag = 1;
        return false;
    }	
    if(flag == 0){			
        $('#apply_coupon_code').html('Processing...');
        var ajaxpath = "<?php echo e(url('/delete-coupon-code')); ?>";
        let couponCodeURL = "<?php echo e(url('/apply-coupon-code')); ?>";
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: couponCodeURL,
            data: {couponcode: couponcode},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response) {
                $('#apply_coupon_code').html('Apply');
                if(response.status == 'Success'){
                    $('#coupon_codeError').show().html(response.msg).css({"color": "green", "border": "1px solid", "padding": "3px", "margin": "5px 0px 5px 0px"}).slideDown();								
                    $('.cart-sub-total').html('<p class="bold-text w-60">Discount</p><p class="fw-bold cart-sub-total">-₹' + response.discount + '.00</p>');
                    $('.grand-total-inner-left-md').html('₹'+response.price + '.00');
                    $('#delete_coupon_code_div').html('<a href="' + ajaxpath + '"><button type="button" id="delete_coupon_code" class="btn btn-danger">DELETE</button></a>');
                    $('#coupon_code_value').val(response.couponcode_title);
                    $('#apply_coupon_code').hide();												
                }else{
                    swal("Error", response.msg, "error");
                    $('#apply_coupon_code').show();
                }
                return false;
            },
            error: function(ts) {
                $('#searchbuttons').html('Search');
                $('#error500').modal('show');
            }
        });
        return false;
    }
});

function checkout(){
	$('#checkout_btn').html('Processing...');
	$.ajax({
		type: 'POST',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		url: "<?php echo e(route('createOrder')); ?>",
		data:$('#checkout-form').serialize(),
		dataType: "json",
		success: function(msg){
			$('#checkout_btn').html('Proceed to Payment');			
			if(msg.success){				
                swal("Success!", msg.message, "success").then((value) => {
                    window.location.href = "<?php echo e(route('myOrders')); ?>";
                });
			}else{
				swal({
				title: "Error!",
				text: msg.message,
				type: "error",
				timer: 3000
				});
			}
		},error: function(ts) {
			showMessage('Some thing want to wrong, please try after sometime.');
			return false;
		}
	});	
}
</script>

<script>
function saveShippingAddress(){
	$('#add_shipping_btn').html('Processing...');
	$.ajax({
		type: 'POST',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		url: "<?php echo e(route('saveAddressInfo')); ?>",
		data:$('#shipping-form').serialize(),
		dataType: "json",
		success: function(msg){
			$('#add_shipping_btn').html('Submit');
			
			if(msg.success){
				$('#shippingAddress').modal('hide');
				swal({
				title: "Success!",
				text: msg.message,
				type: "success",
				timer: 3000
				});
			}else{
				swal({
				title: "Error!",
				text: msg.message,
				type: "error",
				timer: 3000
				});
			}
		},error: function(ts) {
			showMessage('Some thing want to wrong, please try after sometime.');
			return false;
		}
	});	
}
function clearForm(){
	$('#address_id').val(0);
	$('#first_name').val('');
	$('#last_name').val('');
	$('#email').val('');
	$('#mobile').val('');
	$('#mobile2').val('');
	$('#address').val('');
	$('#city').val('');
	$('#state').val('');
	$('#zip_code').val('');
}

</script>



<?php echo $__env->make('element.process_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views//checkout/checkout.blade.php ENDPATH**/ ?>