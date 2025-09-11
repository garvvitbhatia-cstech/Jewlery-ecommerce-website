<?php if(isset($products) && $products->count()>0): ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-4 col-lg-3 text-start">
        <div class="pr-img">
          <div class="product-box-pt">
            <?php if($product->image != ''): ?>
            <img src="<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($product->image); ?>" class="img-fluid" alt="">
            <?php endif; ?>
            <div class="pro-cont">
              <a href="<?php echo e(url('/product-details/')); ?>/<?php echo e($product->slug); ?>" class="btn bg-orange">View Details</a>              
            </div>
          </div>         

          <?php for($x=1;$x<=$product->rating;$x++): ?>
            <i class="fa fa-star checked" style="color: #f9b92d;"></i>
          <?php endfor; ?>

          <a href="<?php echo e(url('/product-details/')); ?>/<?php echo e($product->slug); ?>"><h4 class="text-dark"><?php echo e($product->title); ?></h4>
          <p><span>₹ <?php echo e(number_format($product->amount)); ?></span></p></a>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
<?php else: ?>
    <div class="col-md-12 col-lg-12 text-center alert alert-danger">No Product Found</div>
<?php endif; ?>

<div class="col-md-12 d-flex justify-content-center">
    <?php echo $products->appends(request()->except('page','_token'))->links('pagination.front'); ?>

</div>

<?php echo $__env->make('element.addtocart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views/products/products_filter.blade.php ENDPATH**/ ?>