<?php if(isset($products) && $products->count()>0): ?>

<style>
  .prodct-pt .right p span {
      margin-top: 20px;
      font-size: 14px;
      color: var(--orange);
      font-weight: var(--medium);
  }
</style>

  <?php if($slug == 'Live'): ?>

    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <div class="col-md-4">
        <a href="javascript:void(0)">
            <div class="pro-box">
              <div class="img">
                <?php if($product->image != ''): ?>
                <img src="<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($product->image); ?>" class="img-fluid" alt="">
                <?php endif; ?>
              </div>
              <div class="pro-cont">
                <p class="mt-md-3">Description</p>                
                <p><span>Gross Weight: <?php echo e($product->gross_weight); ?></span></p>
                <p><span>Rubellite Weight: <?php echo e($product->rubellite_weight); ?> </span></p>
                <p><span>Tanzanite Weight: <?php echo e($product->tanzanite_weight); ?> </span></p>
                <p class="mt-md-3">Date</p>
                <p><span> <?php echo date('d-m-Y h:i a',strtotime($product->start_date)); ?></span></p>
                <p><span> <?php echo date('d-m-Y h:i a',strtotime($product->end_date)); ?></span></p>
                <div class="text-center">                  
                  <?php if(session()->has('login_user_email')): ?>                                    
                    <?php if($is_bidder_show == 'Yes'): ?>
                      <button id="bid_product_<?php echo e($product->id); ?>" onclick="bidProduct('<?php echo e(base64_encode($product->id)); ?>')" class="btn">Bid Now</button>
                    <?php endif; ?>
                  <?php else: ?>
                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn">Bid Now</button>
                  <?php endif; ?>
                </div>
              </div>
            </div>
        </a>
        <?php $start_price = '₹ '.number_format($product->start_price,2) ?>
        <h6><?php echo e($product->title); ?></h6>
        <p><strong>₹ <?php echo e(number_format($product->amount,2)); ?> - ₹ <?php echo e(number_format($product->start_price,2)); ?></strong></p> 
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php elseif($slug == 'Upcoming'): ?>

    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4">
        <a href="javascript:void(0)">
          <div class="pro-box">
            <div class="img">
            <?php if($product->image != ''): ?>
            <img src="<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($product->image); ?>" class="img-fluid" alt="">
            <?php endif; ?>
            </div>
            <div class="pro-cont">
                <p class="mt-md-3">Description</p>
                <p><span>Gross Weight: <?php echo e($product->gross_weight); ?></span></p>
                <p><span>Rubellite Weight: <?php echo e($product->rubellite_weight); ?> </span></p>
                <p><span>Tanzanite Weight: <?php echo e($product->tanzanite_weight); ?> </span></p>
                <p class="mt-md-3">Start Date</p>
                <p><span> <?php echo date('d-m-Y h:i a',strtotime($product->start_date)); ?></span></p>
            </div>
          </div>
        </a>
        <h6><?php echo e($product->title); ?></h6>
        <p><strong>₹ <?php echo e(number_format($product->amount,2)); ?> - ₹ <?php echo e(number_format($product->start_price,2)); ?></strong></p> 
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php else: ?>

    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4">
        <a href="javascript:void(0)">
          <div class="pro-box">
            <div class="img">
            <?php if($product->image != ''): ?>
            <img src="<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($product->image); ?>" class="img-fluid" alt="">
            <?php endif; ?>
            </div>
            <div class="pro-cont">
                <p class="mt-md-3">Description</p>
                <p><span>Gross Weight: <?php echo e($product->gross_weight); ?></span></p>
                <p><span>Rubellite Weight: <?php echo e($product->rubellite_weight); ?> </span></p>
                <p><span>Tanzanite Weight: <?php echo e($product->tanzanite_weight); ?> </span></p>
                <p class="mt-md-3">Minimum Maximum Bidding</p>
                <p class="mt-md-3"><span> ₹ <?php echo e(number_format($product->min,2)); ?> - ₹ <?php echo e(number_format($product->max,2)); ?></span></p>  
                <p class="mt-md-3">Wining Price</p>
                <p class="mt-md-3"><span>₹ <?php echo e(number_format($product->max,2)); ?></span></p>   
            </div>
          </div>
        </a>
        <h6><?php echo e($product->title); ?></h6>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php endif; ?>

  <?php else: ?>

  <div class="col-md-12 col-lg-12 text-center alert alert-danger">No Product Found</div>

  <?php endif; ?>

<div class="col-md-12 d-flex justify-content-center">
    <?php echo $products->appends(request()->except('page','_token'))->links('pagination.front'); ?>

</div>

<?php echo $__env->make('element.addtocart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views/bidding_products/products_filter.blade.php ENDPATH**/ ?>