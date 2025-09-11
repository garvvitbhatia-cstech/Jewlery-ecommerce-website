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
            <h2>Chekout</h2>
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
                
                <?php if($addresses->count() > 0): ?>
                <form action="" method="post" id="checkout-form">
                <input type="hidden" name="payment_method" id="payment_method" value="PayU" />
                <div class="shipping-adderss-main">
                    <div class="shipping_billing_title d-flex justify-content-between align-items-center">
                        <span class="shipping-title mb-3">Shipping Adderss</span>
                    </div>
                    <div class="top d-flex align-items-center flex-wrap" id="addressHtml">Loading...</div>

                    <div class="d-flex mt-3">
                        <a style="cursor:pointer" onclick="clearForm();" data-bs-toggle="modal" data-bs-target="#shippingAddress" class="add_btn">Add Shipping Address</a>
                    </div>
                </div>
                </form>
                <?php endif; ?>
                
                 <?php if($addresses->count() == 0): ?>
                <form action="" method="post" id="checkout-form" class="shipping-adderss-main my-4">
                    <div class="shipping_billing_title d-flex justify-content-between align-items-center">
                        <span class="shipping-title">Shipping Adderss</span>
                        <!--<div class="list-group-item align-items-center d-flex makeTitle border-0">
                            <input class="form-check-input mt-0  me-1" type="checkbox" value="">
                            Make Default Address
                        </div>-->
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
                            <label for="o_pincode" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="o_pincode" name="o_pincode" maxlength="6" placeholder="6 digits pincode" >
                        </div>
                        <div class="col-md-4">
                            <label for="o_mobile" class="form-label">Phone No</label>
                            <input type="text" class="form-control" maxlength="10" name="o_mobile" id="o_mobile" placeholder="Enter your phone no">
                        </div>
                        
                         <div class="col-md-4">
                            <label for="o_mobile2" class="form-label">Alternate Phone No (Optional)</label>
                            <input type="text" class="form-control" maxlength="10" name="o_mobile2" id="o_mobile2" placeholder="Enter your alt phone no">
                        </div>

                        
                    </div>
                </form>
                <?php endif; ?>
                
                
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
                    <a href="#" class="btn btn-outline-secondary">Continue Shopping</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="rightsidebar sticky-top">
                    <div class="accordion myOrder-tab-cls" id="accordionExample">
                    
                        <div class="summary-box">
                            <div class="accordion-header">
                                <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                                    <span class="fit-box d-flex justify-content-between align-items-center ">
                                        <span class="fitlest-textt d-flex fw-bold align-items-center"> <span class="cart-icons pe-1"><img src="<?php echo e($siteUrl); ?>public/images/cart-icon.svg" alt=""></span>Order Summary</span>
                                        
                                    </span>
                                </div>
                            </div>

                            <div id="collapsethree" class="accordion-collapse collapse" aria-labelledby="headingtwo" data-bs-parent="#accordionExample">
                                <div class="list-product-row">
                                
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="product-list my-3 d-flex">
                                    <a href="#" class="product-img">
                                        <img src="<?php echo e(URL::asset('public/img/products')); ?>/<?php echo $item->image; ?>" width="100%" class="img-bxx">
                                    </a>
                                    <div class="kk-contant-boxb cart-box-cnt w-100 d-flex justify-content-between">
                                        <span>
                                            <a href="#" class="d-block cat-head fs-1 text-capitalize"><?php echo e($item->product_name); ?> (<?php echo e($item->weight); ?> <?php echo e($item->weight_type); ?>)</a>
                                            <span class="d-flex kk-price-num align-items-center py-1"><?php echo e($item->quantity); ?> <span class="kk-price-num ps-2 fw-normal">Box</span> </span>
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
                                                    <input type="text" class="form-control me-3" placeholder="Enter Coupon Code" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                    <button class="input-group-text btn btn-primary" id="basic-addon2">Apply</button>
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
                            <div class="total-price">
                                <p>Total:</p>
                                <p class="fw-bold">₹<?php echo e($totalPrice); ?></p>
                            </div>

                            <div class="total-price">
                                <p>Total (including discount):</p>
                                <p class="fw-bold">₹<?php echo e($totalPrice); ?></p>
                            </div>
                        </div>

                        <div class="buy-btn-list text-center d-block mt-4">
                            <div class="cart-button-set">
                                <a style="cursor:pointer" onclick="checkout();" id="checkout_btn" class="btn btn-primary w-100">Proceed to Payment</a>
                            </div>
                            
                            <a href="http://" class="d-flex  payments-powered my-4 justify-content-center align-items-center"><span class="ps-2"><img src="<?php echo e($siteUrl); ?>public/images/secure-icon.svg" alt=""></span> 100% Secure Payments powered by</a>
                            <a href="http://" class="d-flex justify-content-center">
                                <span><img src="<?php echo e($siteUrl); ?>public/images/norton.svg" alt=""></span>
                                <span class="px-2"><img src="<?php echo e($siteUrl); ?>public/images/razorpay.svg" alt=""></span>
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


<?php if($addresses->count() > 0): ?>
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
            <input type="text" class="form-control" name="mobile" maxlength="10" id="mobile">
            </div>
            <div class="col-md-6">
            <label for="mobile2" class="form-label">Alternate Mobile No</label>
            <input type="text" class="form-control" name="mobile2" maxlength="10" id="mobile2">
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
            <input type="text" class="form-control" maxlength="6" name="zip_code" id="zip_code">
            </div>           
        </form>
      </div>
      <div class="modal-footer d-flex align-items-center justify-content-between">
        <a onclick="saveShippingAddress();" id="add_shipping_btn" class="add_btn">Submit</a>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<script>
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
				swal({
				title: "Success!",
				text: msg.message,
				type: "success",
				timer: 3000
				});
				window.location.href = "<?php echo e(route('myOrders')); ?>";
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
<?php if($addresses->count() > 0): ?>
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
				getAllAddress();
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
function getAllAddress(aid){
	$.ajax({
		type: 'POST',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		url: "<?php echo e(route('getAllAddress')); ?>",
		success: function(msg){
			$('#addressHtml').html(msg);
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
getAllAddress();
</script>
<?php endif; ?>


<?php echo $__env->make('element.process_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views/pages/checkout.blade.php ENDPATH**/ ?>