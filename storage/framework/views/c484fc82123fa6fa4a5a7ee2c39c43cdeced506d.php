

<?php $__env->startSection('content'); ?>
<style>
.type_div{ display:none}
</style>
<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add New Coupon Code</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/coupon-codes')); ?>">Coupon Codes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Coupon Code</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Coupon Code</h4>
                </div>
                <div class="card-body">
                <form class="form w-100" id="pageForm" action="#">
                    <div class="row">
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Type</label>
                                <select class="form-control" onchange="selectType(this.value);" name="type" id="type">
                                <option value="">Select Type</option>
                                <option value="Product">Product</option>
                                <option value="Category">Category</option>
                                <option value="User">User</option>
                                <option value="Country">Country</option>
                                <option value="State">State</option>
                                <option value="City">City</option>
                                <option value="Pincode">Pincode</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Vendor">Vendor</option>
                                <option value="User Subscription">User Subscription</option>
                                <option value="Corporate Subscription">Corporate Subscription</option>
                                <option value="Order">Order Sub Total</option>
                                <option value="Cart">Cart (No of Items)</option>
                                <option value="Payment Method">Payment Method</option>
                                </select>
                            </div>
                        </div>
                        
                        <div id="country_div" class="col-md-4 type_div">
                            <div class="form-group">
                                <label for="basicInput">Coutries</label>
                                <select class="form-control choices multiple-remove" onchange="getStateByCountry(this.value);" name="country_id" id="country_id">
                                <option value="">Select Coutry</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($country->id); ?>"><?php echo e($country->country_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        
                        <div id="state_div" class="col-md-4 type_div">
                            <div class="form-group">
                                <label for="basicInput">States</label>
                                <select class="form-control choices multiple-remove" name="state_id" id="states">
                                <option value="">Select State</option>
                                
                                </select>
                            </div>
                        </div>
                        
                        <div id="user_subs_div" class="col-md-4 type_div">
                            <div class="form-group">
                                <label for="basicInput">Subscriptions</label>
                                <select multiple="multiple" class="form-control choices multiple-remove" name="user_subscription_id[]" id="user_subscription_id">
                                <option value="">Select Subscription</option>
                                <?php $__currentLoopData = $userSubscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $userSubscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($userSubscription->id); ?>"><?php echo e($userSubscription->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        
                        
                        <div id="cor_subs_div" class="col-md-4 type_div">
                            <div class="form-group">
                                <label for="basicInput">Subscriptions</label>
                                <select multiple="multiple" class="form-control choices multiple-remove" name="corporate_subscription_id[]" id="corporate_subscription_id">
                                <option value="">Select Subscription</option>
                                <?php $__currentLoopData = $corporateSubscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $corporateSubscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($corporateSubscription->id); ?>"><?php echo e($corporateSubscription->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div id="product_div" class="col-md-4 type_div">
                            <div class="form-group">
                                <label for="basicInput">Products</label>
                                <select multiple="multiple" class="form-control choices multiple-remove" name="product_id[]" id="product_id">
                                <option value="">Select Products</option>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>"><?php echo e($product->product_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div id="category_div" class="col-md-4 type_div">
                            <div class="form-group">
                                <label for="basicInput">Categories</label>
                                <select multiple="multiple" class="form-control choices multiple-remove" name="category_id[]" id="category_id">
                                <option value="">Select Category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div id="user_div" class="col-md-4 type_div">
                            <div class="form-group">
                                <label for="basicInput">Users</label>
                                <select multiple="multiple" class="form-control choices multiple-remove" name="user_id[]" id="user_id">
                                <option value="">Select User</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div id="order_div" class="col-md-4 type_div">
                            <div class="form-group">
                                <label for="basicInput">Total Order value</label>
                                <input type="text" class="form-control" name="order_value" id="order_value">
                            </div>
                        </div>
                        <div id="pincode_div" class="col-md-4 type_div">
                            <div class="form-group">
                                <label for="basicInput">Pincode</label>
                                <input type="text" class="form-control" name="pincode" id="pincode">
                            </div>
                        </div>
                         
                        <div class="type_div" id="doctor_div">
                        <div  class="col-md-4 type_div">
                            <div class="form-group">
                                <label for="basicInput">Doctors</label>
                                <select multiple="multiple" class="form-control choices multiple-remove" name="doctor_id[]" id="doctor_id">
                                <option value="">Select Doctor</option>
                                <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                
                                <input type="checkbox" value="1" name="is_applicable_on_walk_in" id="is_applicable_on_walk_in">
                                <label for="basicInput">Is Applicable on walk in</label>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                
                                <input type="checkbox" value="1" name="is_applicable_on_visit" id="is_applicable_on_visit">
                                <label for="basicInput">Is Applicable on visit</label>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                
                                <input type="checkbox" value="1" name="is_applicable_on_chat" id="is_applicable_on_chat">
                                <label for="basicInput">Is Applicable on chat</label>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                
                                <input type="checkbox" value="1" name="is_applicable_on_audio" id="is_applicable_on_audio">
                                <label for="basicInput">Is Applicable on audio</label>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                
                                <input type="checkbox" value="1" name="is_applicable_on_video" id="is_applicable_on_video">
                                <label for="basicInput">Is Applicable on video</label>
                            </div>
                        </div>
                        
                        
                        </div>
                        <div id="vendor_div" class="col-md-4 type_div">
                            <div class="form-group">
                                <label for="basicInput">Vendors</label>
                                <select multiple="multiple" class="form-control choices multiple-remove" name="vendor_id[]" id="vendor_id">
                                <option value="">Select Vendor</option>
                                <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div id="cart_div" class="col-md-4 type_div">
                            <div class="form-group">
                                <label for="basicInput">No Of Item in Cart</label>
                                <input type="text" class="form-control" name="no_of_item_cart" id="no_of_item_cart">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Coupon Code</label>
                                <input type="text" class="form-control" maxlength="8" style="text-transform:uppercase" name="title" id="title">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">No Of User</label>
                                <input type="text" class="form-control" name="no_of_user" id="no_of_user">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">No Of Times</label>
                                <input type="text" class="form-control" name="no_of_time" id="no_of_time">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Discount Type</label>
                                <select class="form-control" name="discount_type" id="discount_type">
                                <option value="">Select Discount Type</option>
                                <option value="Amount">Amount</option>
                                <option value="Percent">Percent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Amount</label>
                                <input type="text" class="form-control" name="amount" id="amount">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Start Date</label>
                                <input type="date" class="form-control" name="start_date" id="start_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">End Date</label>
                                <input type="date" class="form-control" name="end_date" id="end_date">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                
                                <input type="checkbox" value="1" name="apply_multiple_coupon" id="apply_multiple_coupon">
                                <label for="basicInput">Apply with Multiple</label>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                
                                <input type="checkbox" value="1" name="show_on_checkout" id="show_on_checkout">
                                <label for="basicInput">Show on Checkout Screen</label>
                            </div>
                        </div>
                        
                        <div class="text-left">
                            <!--begin::Submit button-->
                            <button type="button" id="form_submit" class="btn btn-sm btn-primary fw-bolder me-3 my-2">
                                <span class="indicator-label" id="formSubmit">Submit</span>
                                <span class="indicator-progress d-none">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <!--end::Submit button-->
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script>
    function selectType(type){
		$(".type_div").hide();
		if(type == 'Product'){
			$('#product_div').show();
		}
		if(type == 'Category'){
			$('#category_div').show();
		}
		if(type == 'User'){
			$('#user_div').show();
		}
		if(type == 'Pincode'){
			$('#pincode_div').show();
		}
		if(type == 'Doctor'){
			$('#doctor_div').show();
		}
		if(type == 'Vendor'){
			$('#vendor_div').show();
		}
		if(type == 'Cart'){
			$('#cart_div').show();
		}
		if(type == 'User Subscription'){
			$('#user_subs_div').show();
		}
		if(type == 'Corporate Subscription'){
			$('#cor_subs_div').show();
		}
		if(type == 'Order'){
			$('#order_div').show();
		}
		if(type == 'Country'){
			$('#country_div').show();
		}
		if(type == 'State'){
			$('#country_div').show();
			$('#state_div').show();
		}
		
	}
	function getStateByCountry(countryId){
		if(countryId != '' && $.isNumeric(countryId)){
			$('#state').html('');
			$.ajax({
				url: "<?php echo e(url('admin/get-state')); ?>",
				data: {countryId:countryId},
				type: 'POST',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success:function(response){
					$('#states').html(response);
				}
			});	
			return false;
		}
	}
    </script>
<!-- end plugin js -->
<script>
    let saveDataURL = "<?php echo e(url('/admin/add-coupon-code')); ?>";
    let returnURL = "<?php echo e(url('/admin/coupon-codes')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/coupon_codes/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/coupon_codes/add-page.blade.php ENDPATH**/ ?>