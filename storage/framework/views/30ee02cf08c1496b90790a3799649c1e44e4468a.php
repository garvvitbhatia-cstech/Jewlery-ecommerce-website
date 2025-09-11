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
            <h2>Our Products</h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
                
                </ol>
            </nav>
        </div>
    </div>
</div>


<section class="pro-carousel">
       <div class="container">
        <div class="product-carousel owl-carousel owl-theme">
          <div class="item">
            <a class="product-box-pt">
             <img src="<?php echo e(asset('public/img/home/')); ?>/po-img1.png" class="img-fluid" alt="">
           </a>
           <p class="text-dark text-center">Necklaces</p>
         </div>
         <div class="item">
          <a class="product-box-pt">
           <img src="<?php echo e(asset('public/img/home/')); ?>/1.png" class="img-fluid" alt="">
         </a>
         <p class="text-dark text-center">Best Sellers</p>
       </div>
       <div class="item">
        <a class="product-box-pt">
         <img src="<?php echo e(asset('public/img/home/')); ?>/po-img3.png" class="img-fluid" alt="">
       </a>
       <p class="text-dark text-center">Bracelets</p>
     </div>
     <div class="item">
      <a class="product-box-pt">
       <img src="<?php echo e(asset('public/img/home/')); ?>/po-img4.png" class="img-fluid" alt="">
     </a>
     <p class="text-dark text-center">Earrings</p>
   </div>
   <div class="item">
    <a class="product-box-pt">
     <img src="<?php echo e(asset('public/img/home/')); ?>/po-img5.png" class="img-fluid" alt="">
   </a>
   <p class="text-dark text-center">Wedding</p>
 </div>
</div>
</div>
</section>

<section class="prodct-pt mb-5 wow fadeInUp">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-lg-2">
        <div class="accordion" id="accordionExample">
          <div class="card pt-0">
            <div class="card-head" id="headingOne">
              <h4 class="mb-0" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Collection
              </h4>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body py-0">
                <ul>
                  <li class="active"><a href="#">Necklaces</a></li>
                  <li><a href="#">Bracelets</a></li>
                  <li><a href="#">Earrings</a></li>
                  <li><a href="#">Charms</a></li>
                  <li><a href="#"><strong class="text-dark">+ View More</strong></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-head" id="headingTwo">
              <h4 class="mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                Availability
              </h4>
            </div>
            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body py-0">
                <ul>
                  <li>In Stock (8)</li>
                  <li>Out of Stock (2)</li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="card">
            <div class="card-head" id="Brand">
              <h4 class="mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#Brandee" aria-expanded="true" aria-controls="Brandee">
                Brand
              </h4>
            </div>
            <div id="Brandee" class="collapse show" aria-labelledby="Brand" data-parent="#accordionExample">
              <div class="card-body py-0">
                <ul>
                  <li>Jewely</li>
                  <li>Manoa</li>
                  <li>Pramio</li>
                  <li>Romani</li>
                  <li><strong class="text-dark">+ View More</strong></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-head" id="Products">
              <h4 class="mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#Productee" aria-expanded="true" aria-controls="Productee">
                Size
              </h4>
            </div>
            <div id="Productee" class="collapse show" aria-labelledby="Products" data-parent="#accordionExample">
              <div class="card-body py-0">
               <ul class="d-flex align-items-center">
                <li class="size">5 (1) </li>
                <li class="size">6 (1) </li>
                <li class="size">7 (1) </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-9 col-lg-10">
     <div class="row right">
      <?php if(isset($products) && $products->count()>0): ?>
      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-4 col-lg-3 text-start">
        <div class="pr-img">
          <div class="product-box-pt">
            <?php if($product->image != ''): ?>
            <img src="<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($product->image); ?>" class="img-fluid" alt="">
            <?php endif; ?>
            <div class="pro-cont">
              <a href="" class="btn bg-orange">Add To Cart</a>
            </div>
          </div>
          <img src="<?php echo e(asset('public/img/home/')); ?>/Star-rating.svg" alt="">
          <h4 class="text-dark"><?php echo e($product->title); ?></h4>
          <p><span>$<?php echo e(number_format($product->amount)); ?></span></p>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
      <?php else: ?>
      <div class="col-md-12 col-lg-12 text-center alert alert-danger">No Product Found</div>
      <?php endif; ?>
    </div>
  </div>

  <div class="col-md-12 d-flex justify-content-center">
    <?php echo $products->appends(request()->except('page','_token'))->links('pagination.front'); ?>

  </div>

</div>
</div>
</section>

<?php echo $__env->make('element.process_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views/pages/products.blade.php ENDPATH**/ ?>