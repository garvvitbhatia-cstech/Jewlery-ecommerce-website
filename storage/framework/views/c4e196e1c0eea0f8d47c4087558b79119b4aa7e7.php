
<?php if(isset($orders) && $orders->count()>0): ?>

  <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="accordion-item">
            <div class="accordion-header" id="headingthree<?php echo e($key); ?>">
              <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapsethree<?php echo e($key); ?>" aria-expanded="true" aria-controls="collapsethree<?php echo e($key); ?>">
                <div class="kk-contant-boxb cart-box-cnt w-100 align-items-center  d-flex justify-content-between">
                  <div class="left-content-order">
                    <h4 class="d-block cat-head text-capitalize mb-2">Order ID: <span class="title-dscnt">#<?php echo e($order->invoice_id); ?></span> </h4>
                    <div class="d-flex align-items-center"> <span class="d-block cat-head fw-bold">₹<?php echo e(number_format($order->total)); ?></span> <span class="d-flex align-items-center fs-1 ps-3"><span class="pe-2 calendar-icon"><img src="<?php echo e(asset('public/img/home/')); ?>/calendar-icon.svg" alt=""></span><?php echo e(date('d F Y',strtotime($order->created_at))); ?> at <?php echo e(date('h:iA',strtotime($order->created_at))); ?></span> </div>
                  </div>
                  <span class="delivered-btn me-3"> <?php echo e($order->order_status); ?> </span> </div>
              </div>
            </div>
            <div id="collapsethree<?php echo e($key); ?>" class="accordion-collapse collapse" aria-labelledby="headingthree<?php echo e($key); ?>" data-bs-parent="#accordionExample">
              <div class="d-flex flex-md-row flex-column shipping-address">
                <p class="d-flex text-left mt-0 pb-4 w-50 flex-column flex-md-row "><strong class="me-2 text-uppercase">Ship To:</strong> <?php echo e($order->customer_address); ?>, <?php echo e($order->customer_city); ?>, <?php echo e($order->customer_state); ?> <?php if($order->customer_country != ''): ?> - <?php echo e($order->customer_country); ?>- <?php else: ?> - <?php endif; ?> <?php echo e($order->customer_zipcode); ?></p>
                <div class="cls w-50 d-flex justify-content-end mb-4">
                  <div class="d-flex rate-boxs align-items-md-center">
                    <div class="d-flex"> 
                      <?php if(isset($order->tracking_url) && $order->tracking_url != ''): ?>
                      <a href="<?php echo e($order->tracking_url); ?>" target="_blank" class="btn btn-green d-flex align-items-center mx-2">Track Now <span class="user-icon ms-2"><img src="<?php echo e(asset('public/img/home/')); ?>/arrow-green.png" alt=""></span></a> 
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php $products = Helper::getOrderProducts($order->id); ?>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $product_details = Helper::getProductInfo($product->product_id); ?>
              <div class="d-flex oder-tabs-cls align-items-center">
                <div class="cls w-50 d-flex align-items-center"> <a href="<?php echo e(url('product-details',$product_details->slug)); ?>" class="product-img">
                    <?php if($product_details->image != ''): ?>
                        <img src="<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($product_details->image); ?>" class="img-boxs">
                    <?php endif; ?>
                </a>
                  <div class="kk-contant-boxb cart-box-cnt"> <span> <span class="d-block mb-2 cat-head fw-bold"><?php echo e($product_details->title); ?></span> </span> <span class="d-block mb-2 cat-head fw-bold">₹ <?php echo e($product->price); ?></span>
                    <ul class="star-menu-list d-flex list-unstyled mb-md-0 ">
                        <?php for($x=1;$x<=$product_details->rating;$x++): ?>
                        <i class="fa fa-star checked" style="color: #f9b92d;"></i>&nbsp;
                        <?php endfor; ?>

                    </ul>
                  </div>
                </div>
              </div>
              <hr/>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>
  <div class="container">
    <div class="row">
    <div class="col-md-12 col-lg-12 text-center alert alert-danger">No Orders Found!</div>
    </div>
<?php endif; ?><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views/pages/my_orders_paginate.blade.php ENDPATH**/ ?>