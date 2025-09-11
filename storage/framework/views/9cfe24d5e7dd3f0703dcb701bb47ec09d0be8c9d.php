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
                <?php if(isset($items) && $items->count()>0): ?>
                <div class="row wow fadeInUp">
                    <div class="col-lg-8 mb-4">
                        <?php
                            $sum = 0;
                        ?>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                            $product_details = Helper::getProductInfo($item->product_id);
                            $sum = $sum+$product_details->amount;
                        ?>
                        <div class="cart-list-main wow fadeInUp">
                            <div class="prodeuct-info d-flex">
                            <a href="<?php echo e(url('product-details',$item->slug)); ?>" class="cart-thumb-img me-3">
                                <?php if($item->image != ''): ?>
                                <img src="<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($item->image); ?>" alt="">
                                <?php endif; ?>
                            </a>
                            <div class="cart-item-details">
                                <div class="cart-product-name fw-bold"><a href="#"><?php echo e($product_details->title); ?></a></div>
                                <div class="d-flex align-items-center">
                                    <div class="price ms-3"><big>₹<?php echo e($product_details->amount); ?> per item</big></div>
                                    </div>
                                </div>
                            </div>
                            <div class="remove-cart">
                                <i onclick="removeCart('<?php echo e($item->id); ?>');" class="fa fa-remove"></i>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="col-lg-4">

                        <div class="cart-total-box">
                            <div class="total-price">
                                <p>Total:</p>
                                <p class="fw-bold">₹<?php echo e(number_format($sum,2)); ?></p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center justify-content-between py-4">
                            <?php if(!session()->has('login_user_email')): ?>
                            <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary w-100">Continue Checkout</a>
                            <?php else: ?>
                            <a href="<?php echo e(url('/checkout')); ?>" class="btn btn-primary w-100">Continue Checkout</a>
                            <?php endif; ?>
                            
                        </div>


                    </div>
                </div>
                <?php else: ?>
                <div class="col-md-12 col-lg-12 text-center alert alert-danger">Cart is empty!</div>
                <?php endif; ?>
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
				Toastify({
						text: msg.message,
						duration: 3000,
						close: true,
						style: {background: "#093"}
						}).showToast();
					setTimeout( window.location.reload(), 4000);
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
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views/pages/cart.blade.php ENDPATH**/ ?>