<?php $__env->startSection('content'); ?>
<?php if(isset($inner_page->id)): ?>
<?php $__env->startSection('title',strip_tags($inner_page->seo_title)); ?>
<?php $__env->startSection('description',strip_tags($inner_page->seo_description)); ?>
<?php $__env->startSection('keywords',strip_tags($inner_page->seo_keyword)); ?>
<?php $__env->startSection('robots',strip_tags($inner_page->robot_tags)); ?>
<?php endif; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js"></script>

<div class="hero-section innerpage-section">
    <div class="container">
        <div class="text-center d-flex align-items-center justify-content-center flex-column">
            <h2><?php echo e($product->title); ?></h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>                
                </ol>
            </nav>
        </div>
    </div>
</div>

<section class="details section-padding">
      <div class="container">
        <div class="card-wrapper">
            <div class="card border-0">
              <!-- card left -->
              <div class = "product-imgs">
                <div class = "img-display" id="main_img_div">
                  <div class = "zoom">
                    <?php if($product->image == ''): ?>
                      <img src = "<?php echo e(asset('public/img/home/no-image.png')); ?>" alt = "<?php echo e($product->title); ?>">
                    <?php else: ?>
             
                      <img src = "<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($product->image); ?>" id="main_img" alt = "<?php echo e($product->title); ?>">
              
                    <?php endif; ?>
                  </div>
                </div>
                <?php if(isset($product_images) && $product_images->count() > 0): ?>
                <div class="img-select">
                <div class="img-item">
                    <a onclick="updateZoom('<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($product->image); ?>');" data-id = "1">
                      <img src="<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($product->image); ?>" alt="<?php echo e($product->title); ?>">
                    </a>
                  </div>
                  <?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="img-item">
                    <a onclick="updateZoom('<?php echo e(asset('public/admin/images/products/')); ?>/<?php echo e($image->image); ?>');" data-id = "<?php echo e($key+2); ?>">
                      <img src="<?php echo e(asset('public/admin/images/products/')); ?>/<?php echo e($image->image); ?>" alt="<?php echo e($product->title); ?>">
                    </a>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
                </div>
              </div>
              <!-- card right -->
              <div class ="product-content">
                <h4 class ="product-title"><?php echo e($product->title); ?></h4>
                <div class = "product-rating">
                  <img src="<?php echo e(asset('public/img/home/')); ?>/Star.svg" width="100" alt="">
                  <span>1 Review</span>
                </div> 
                <h4 class="price">₹ <?php echo e(number_format($product->amount,2)); ?></h4> 
                  <?php echo $product->content; ?>


                  <?php if($product->gross_weight != ''): ?>
                    <p><span>Gross Weight: <?php echo e($product->gross_weight); ?></span></p>
                  <?php endif; ?>
                  <?php if($product->rubellite_weight != ''): ?>
                    <p><span>Rubellite Weight: <?php echo e($product->rubellite_weight); ?> </span></p>
                  <?php endif; ?>
                  <?php if($product->tanzanite_weight != ''): ?>
                    <p><span>Tanzanite Weight: <?php echo e($product->tanzanite_weight); ?> </span></p>
                  <?php endif; ?>
                  <?php if($product->spinal_weight != ''): ?>
                    <p><span>Spinal Weight: <?php echo e($product->spinal_weight); ?> </span></p>
                  <?php endif; ?>
                  <?php if($product->emerald_weight != ''): ?>
                    <p><span>Emerald Weight: <?php echo e($product->emerald_weight); ?> </span></p>
                  <?php endif; ?>
                  <?php if($product->blue_sapphire_weight != ''): ?>
                    <p><span>Blue Sapphire Weight: <?php echo e($product->blue_sapphire_weight); ?> </span></p>
                  <?php endif; ?>
                  <?php if($product->multi_supphire_weight != ''): ?>
                    <p><span>Multi Sapphire Weight: <?php echo e($product->multi_supphire_weight); ?> </span></p>
                  <?php endif; ?>
                  <?php if($product->rosecut_weight != ''): ?>
                    <p><span>Rosecut Weight: <?php echo e($product->rosecut_weight); ?> </span></p>
                  <?php endif; ?>
                  <?php if($product->diamond_polkies_weight != ''): ?>
                    <p><span>Diamond Polkies Weight: <?php echo e($product->diamond_polkies_weight); ?> </span></p>
                  <?php endif; ?>
                  <?php if($product->basra_pearls_weight != ''): ?>
                    <p><span>Basra Pearls Weight: <?php echo e($product->basra_pearls_weight); ?> </span></p>
                  <?php endif; ?>

                  <div class="row align-items-center">

                    <?php /* ?><div class="col-md-12">
                    <div class="cart-button-set d-flex align-items-center mt-4">
                            <div class="number cont-ad-name me-3">
                                <span class="minus">-</span>
                                <input type="text" value="1"/>
                                <span class="plus">+</span>
                            </div>
                       
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div><?php */ ?>
                    
                    <?php if($product->in_stock == 2): ?>
                    
                    <div class="col-md-3 my-4">
                    <a href="javascript:void(0)" style="background-color:#ff0000;" class="btn theme-btn border">Out Of Stock</a>
                    </div>
                    
                    <?php else: ?>
                    
                    <?php if($product->is_sold == 2): ?>
                    <div class="col-md-12 my-4">
                    	
                      <?php if(!session()->has('login_user_email')): ?>                        
                      <a href="javascript:void(0)" id="add_to_cart_<?php echo e($product->id); ?>" onclick="addTocart('<?php echo e($product->id); ?>')" class="btn theme-btn border">Add To Cart</a>
                      <?php else: ?>
                        <a href="javascript:void(0)" id="add_to_cart_<?php echo e($product->id); ?>" onclick="addTocart('<?php echo e($product->id); ?>')" class="btn theme-btn border">Add To Cart</a>
                      <?php endif; ?>
                    </div>
                    <?php else: ?>
                    <div class="col-md-3 my-4">
                    <a href="javascript:void(0)" style="background-color:#ff0000;" class="btn theme-btn border">Sold Out</a>
                    </div>
                    <?php endif; ?>
                    
                    <?php endif; ?>

                  <div class="col-md-12">
                    <ul class="d-flex flex-wrap align-items-center">
                      <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/1.svg" alt=""></a></li>
                      <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/2.svg" alt=""></a></li>
                      <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/3.svg" alt=""></a></li>
                      <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/4.svg" alt=""></a></li>
                      <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/5.svg" alt=""></a></li>
                      <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/6.svg" alt=""></a></li>
                    </ul>
                  </div>
                </div>

              </div>
            </div>
          </div>
      </div>
</section>
<section class="setion-padding prt-dtl">
   <div class="container">
    <div class="card border-0">
      
      <nav>
        <div class="nav nav-tabs mb-3 border-0" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><p class="text-dark fw-bold">Description</p></button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><p class="text-dark fw-bold">Shipping Information</p></button>
          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><p class="text-dark fw-bold">Reviews</p></button>
        </div>
      </nav>
      <div class="tab-content " id="nav-tabContent">
        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <?php echo $product->description; ?>


            <?php if($product->gross_weight != ''): ?>
              <p><span>Gross Weight: <?php echo e($product->gross_weight); ?></span></p>
            <?php endif; ?>
            <?php if($product->rubellite_weight != ''): ?>
              <p><span>Rubellite Weight: <?php echo e($product->rubellite_weight); ?> </span></p>
            <?php endif; ?>
            <?php if($product->tanzanite_weight != ''): ?>
              <p><span>Tanzanite Weight: <?php echo e($product->tanzanite_weight); ?> </span></p>
            <?php endif; ?>
            <?php if($product->spinal_weight != ''): ?>
              <p><span>Spinal Weight: <?php echo e($product->spinal_weight); ?> </span></p>
            <?php endif; ?>
            <?php if($product->emerald_weight != ''): ?>
              <p><span>Emerald Weight: <?php echo e($product->emerald_weight); ?> </span></p>
            <?php endif; ?>
            <?php if($product->blue_sapphire_weight != ''): ?>
              <p><span>Blue Sapphire Weight: <?php echo e($product->blue_sapphire_weight); ?> </span></p>
            <?php endif; ?>
            <?php if($product->multi_supphire_weight != ''): ?>
              <p><span>Multi Sapphire Weight: <?php echo e($product->multi_supphire_weight); ?> </span></p>
            <?php endif; ?>
            <?php if($product->rosecut_weight != ''): ?>
              <p><span>Rosecut Weight: <?php echo e($product->rosecut_weight); ?> </span></p>
            <?php endif; ?>
            <?php if($product->diamond_polkies_weight != ''): ?>
              <p><span>Diamond Polkies Weight: <?php echo e($product->diamond_polkies_weight); ?> </span></p>
            <?php endif; ?>
            <?php if($product->basra_pearls_weight != ''): ?>
              <p><span>Basra Pearls Weight: <?php echo e($product->basra_pearls_weight); ?> </span></p>
            <?php endif; ?>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <p class="my-3">Nam tempus turpis at metus scelerisque placerat nulla deumantos  solicitud felis. Pellentesque diam dolor, elementum etos lobortis des  mollis ut risus. Sedcus faucibus an sullamcorper mattis drostique des  commodo pharetras loremos.Donec pretium egestas sapien et mollis.</p>

          <p class="my-3"><strong>Lorem ipsum dolor sit amet</strong></p>

          <p class="my-3">Sonsectetur adipiscing elit, sed do eiusmod tempor incididunt ut  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum  dolore eu fugiat nulla pariatur.</p>

          <p class="my-3"><strong>Busey ipsum dolor sit amet</strong></p>

          <p class="my-3">Cupcake ipsum dolor. Sit amet marshmallow topping cheesecake  muffin. Halvah croissant candy canes bonbon candy. Apple pie jelly beans topping carrot cake danish tart cake cheesecake. Muffin danish  chocolate soufflé pastry icing bonbon oat cake. Powder cake jujubes oat  cake. Lemon drops tootsie roll marshmallow halvah carrot cake.</p>

          <p class="my-3"><strong>Sample Paragraph Text</strong></p>

          <p class="my-3">Praesent vestibulum congue tellus at fringilla. Curabitur vitae semper  sem, eu convallis est. Cras felis nunc commodo eu convallis vitae  interdum non nisl. Maecenas ac est sit amet augue pharetra convallis nec danos dui. Cras suscipit quam et turpis eleifend vitae malesuada magna  congue. Damus id ullamcorper neque. Sed vitae mi a mi pretium aliquet ac sed elit. Pellentesque nulla eros accumsan quis justo at tincidunt  lobortis denimes loremous. Suspendisse vestibulum lectus in lectus  volutpat, ut dapibus purus pulvinar. Vestibulum sit amet auctor ipsum.</p>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          <p class="my-3">Nam tempus turpis at metus scelerisque placerat nulla deumantos  solicitud felis. Pellentesque diam dolor, elementum etos lobortis des  mollis ut risus. Sedcus faucibus an sullamcorper mattis drostique des  commodo pharetras loremos.Donec pretium egestas sapien et mollis.</p>

          <p class="my-3"><strong>Lorem ipsum dolor sit amet</strong></p>

          <p class="my-3">Sonsectetur adipiscing elit, sed do eiusmod tempor incididunt ut  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum  dolore eu fugiat nulla pariatur.</p>

          <p class="my-3"><strong>Sample Paragraph Text</strong></p>

          <p class="my-3">Praesent vestibulum congue tellus at fringilla. Curabitur vitae semper  sem, eu convallis est. Cras felis nunc commodo eu convallis vitae  interdum non nisl. Maecenas ac est sit amet augue pharetra convallis nec danos dui. Cras suscipit quam et turpis eleifend vitae malesuada magna  congue. Damus id ullamcorper neque. Sed vitae mi a mi pretium aliquet ac sed elit. Pellentesque nulla eros accumsan quis justo at tincidunt  lobortis denimes loremous. Suspendisse vestibulum lectus in lectus  volutpat, ut dapibus purus pulvinar. Vestibulum sit amet auctor ipsum.</p>
        </div>
      </div>
    </div>
   </div>
</section>

<?php if(isset($recommended_products) && $recommended_products->count()>0): ?>
<section class="prodct-pt pt-5 flex-mob section-padding wow fadeInUp">
  <div class="container">
    <div class="heading">
        <h2 class="text-start">Recommended Products</h2>
    </div>
     <div class="row right">     

     <?php $__currentLoopData = $recommended_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col text-start">
        <div class="pr-img">
          <div class="product-box-pt">
            <?php if($product->image != ''): ?>
              <img src = "<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($product->image); ?>" alt = "shoe image">
            <?php endif; ?>
            <div class="pro-cont">
              <a href="<?php echo e(url('/product-details/')); ?>/<?php echo e($product->slug); ?>" class="btn bg-orange">View Details</a>  
            </div>
          </div>
          <div class="rating-star">
          <?php for($x=1;$x<=$product->rating;$x++): ?>
            <span class="fa fa-star checked" style="color: #f9b92d;"></span>
          <?php endfor; ?>
          </div>
          <a href="<?php echo e(url('/product-details/')); ?>/<?php echo e($product->slug); ?>"><h4 class="text-dark"><?php echo e($product->title); ?></h4>
          <p><span>₹ <?php echo e($product->amount); ?></span></p></a>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
  </div>
</section>
<?php endif; ?>

<script>
$(function() {
  $('.zoom').zoom();
	
});
function updateZoom(img_path){
	$.ajax({		
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},			
      url: "<?php echo e(route('products.get_products_image')); ?>",
	  type:'POST',
      data: {img_path:img_path},
      success:function(response){
		  $('#main_img_div').html(response);
	  }
    });
}
</script>

<?php echo $__env->make('element.addtocart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('element.process_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views/products/product_details.blade.php ENDPATH**/ ?>