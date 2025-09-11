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
            <h2>My Cart Items</h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Cart</li>
                
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
                        <span class="shipping-title">Profile Details</span>
                    </div>
                    <div class="row g-3 my-2">
                        
                        <div class="col-md-4">
                            <label for="o_first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="o_first_name" name="o_first_name" value="Nitam19869" placeholder="Enter your first name">
                        </div>
                        <div class="col-md-4">
                            <label for="o_last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="o_last_name" name="o_last_name" value="" placeholder="Enter your last name">
                        </div>
                        
                         <div class="col-md-4">
                            <label for="o_last_name" class="form-label">Email</label>
                            <input type="text" class="form-control" readonly="readonly" value="nitam19869@gmail.com">
                        </div>
                        
                        <div class="col-md-12">
                            <label for="o_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="o_address" name="o_address" value="" placeholder="Enter your address">
                        </div>
                        <div class="col-md-6">
                            <label for="o_city" class="form-label">City</label>
                            <input type="text" class="form-control" id="o_city" name="o_city" value="" placeholder="Enter your city">
                        </div>
                        <div class="col-md-6">
                            <label for="o_state" class="form-label">State</label>
                            <input type="text" class="form-control" id="o_state" name="o_state" value="" placeholder="Enter your state">
                        </div>
                        <div class="col-md-4">
                            <label for="o_pincode" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="o_pincode" name="o_pincode" maxlength="6" value="" placeholder="6 digits pincode">
                        </div>
                        <div class="col-md-4">
                            <label for="o_mobile" class="form-label">Phone No</label>
                            <input type="text" class="form-control" readonly="readonly" value="7737406888">
                        </div>
                        
                         <div class="col-md-4">
                            <label for="o_mobile2" class="form-label">Alternate Phone No (Optional)</label>
                            <input type="text" class="form-control" maxlength="10" name="o_mobile2" id="o_mobile2" value="" placeholder="Enter your alt phone no">
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



    <?php echo $__env->make('element.process_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <script>
function removeCart(rowID){
	
	if(rowID != ""){
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: "<?php echo e(route('removeCart')); ?>",
                data: {rowID:rowID},
                success: function(msg){					
                    swal("", 'Item Removed Successfully', "success").then((value) => {
                        window.location.reload();
                    });
				}
            });
        }
        });
	}else{
		return false;
	}

}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views/pages/my_account.blade.php ENDPATH**/ ?>