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

<section class="details section-padding">
      <div class="container">
        <div class="card-wrapper">
            <div class="card border-0">
              <!-- card left -->
              <div class = "product-imgs">
                <div class = "img-display">
                  <div class = "img-showcase">
                    <img src = "<?php echo e(asset('public/img/home/')); ?>/dtl-img.png" alt = "shoe image">
                    <img src = "<?php echo e(asset('public/img/home/')); ?>/dtl-img.png" alt = "shoe image">
                    <img src = "<?php echo e(asset('public/img/home/')); ?>/dtl-img.png" alt = "shoe image">
                    <img src = "<?php echo e(asset('public/img/home/')); ?>/dtl-img.png" alt = "shoe image">
                  </div>
                </div>
                <div class = "img-select">
                  <div class = "img-item">
                    <a href = "#" data-id = "1">
                      <img src = "<?php echo e(asset('public/img/home/')); ?>/dtl-img.png" alt = "shoe image">
                    </a>
                  </div>
                  <div class = "img-item">
                    <a href = "#" data-id = "2">
                      <img src = "<?php echo e(asset('public/img/home/')); ?>/dtl-img.png" alt = "shoe image">
                    </a>
                  </div>
                  <div class = "img-item">
                    <a href = "#" data-id = "3">
                      <img src = "<?php echo e(asset('public/img/home/')); ?>/dtl-img.png" alt = "shoe image">
                    </a>
                  </div>
                  <div class = "img-item">
                    <a href = "#" data-id = "4">
                      <img src = "<?php echo e(asset('public/img/home/')); ?>/dtl-img.png" alt = "shoe image">
                    </a>
                  </div>
                </div>
              </div>
              <!-- card right -->
              <div class ="product-content">
                <h4 class ="product-title">Jewellers Sway The Night Diamond Pendant</h4>
                <div class = "product-rating">
                  <img src="<?php echo e(asset('public/img/home/')); ?>/Star.svg" width="100" alt="">
                  <span>1 Review</span>
                </div> 
                <h4 class="price">$100.00 - <div class="text-dark">$1,000</div></h4> 
                <p class="dtl-p">Nunc vehicula quam semper odio varius tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posue</p>
                <p class="dtl-p"><strong>Selling fast! Over 19 people have this in their cart</strong></p>
                <ul class="ps-4 dtl-ul">
                    <li>
                        <p class="dtl-p my-1">Latest Traditional Design Jewellery Set For Women.</p>
                    </li>
                    <li>
                        <p class="dtl-p my-1">Stylish South Indian Pearl Choker Temple Necklace Set.</p>
                    </li>
                    <li>
                        <p class="dtl-p my-1">Crafted From High-quality Materials.</p>
                    </li>
                </ul>

                <div class="row align-items-center">
                    <div class="col-md-12">
                    <div class="cart-button-set d-flex align-items-center mt-4">
                            <div class="number cont-ad-name me-3">
                                <span class="minus">-</span>
                                <input type="text" value="1"/>
                                <span class="plus">+</span>
                            </div>
                       
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                    <div class="col-md-12 my-4">
                      <a href="" class="btn theme-btn border">Buy Now</a>
                  </div>
                  <div class="col-md-12">
                    <ul class="d-flex align-items-center justify-content-between">
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
          <p class="my-3">Nam tempus turpis at metus scelerisque placerat nulla deumantos  solicitud felis. Pellentesque diam dolor, elementum etos lobortis des  mollis ut risus. Sedcus faucibus an sullamcorper mattis drostique des  commodo pharetras loremos.Donec pretium egestas sapien et mollis.</p>

          <p class="my-3"><strong>Lorem ipsum dolor sit amet</strong></p>

          <p class="my-3">Sonsectetur adipiscing elit, sed do eiusmod tempor incididunt ut  labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum  dolore eu fugiat nulla pariatur.</p>

          <p class="my-3"><strong>Busey ipsum dolor sit amet</strong></p>

          <p class="my-3">Cupcake ipsum dolor. Sit amet marshmallow topping cheesecake  muffin. Halvah croissant candy canes bonbon candy. Apple pie jelly beans topping carrot cake danish tart cake cheesecake. Muffin danish  chocolate soufflé pastry icing bonbon oat cake. Powder cake jujubes oat  cake. Lemon drops tootsie roll marshmallow halvah carrot cake.</p>
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
<section class="prodct-pt pt-5 flex-mob section-padding wow fadeInUp">
  <div class="container">
    <div class="heading">
        <h2 class="text-start">Recommended Products</h2>
    </div>
     <div class="row right">
      <div class="col text-start">
        <div class="pr-img">
          <div class="product-box-pt">
            <img src="<?php echo e(asset('public/img/home/')); ?>/1.png" class="img-fluid" alt="">
            <div class="pro-cont">
              <a href="" class="btn bg-orange">Add To Cart</a>
            </div>
          </div>
          <img src="<?php echo e(asset('public/img/home/')); ?>/Star-rating.svg" alt="">
          <h4 class="text-dark">Necklaces</h4>
          <p><span>$1,000.00</span></p>
        </div>
      </div>

      <div class="col text-start">
        <div class="pr-img">
          <div class="product-box-pt">
            <img src="<?php echo e(asset('public/img/home/')); ?>/2.png" class="img-fluid" alt="">
            <div class="pro-cont">
              <a href="" class="btn bg-orange">Add To Cart</a>
            </div>
          </div>
          <img src="<?php echo e(asset('public/img/home/')); ?>/Star-rating.svg" alt="">
          <h4 class="text-dark">Necklaces</h4>
          <p><span>$1,000.00</span></p>
        </div>
      </div>

      <div class="col text-start">
        <div class="pr-img">
          <div class="product-box-pt">
            <img src="<?php echo e(asset('public/img/home/')); ?>/2.png" class="img-fluid" alt="">
            <div class="pro-cont">
              <a href="" class="btn bg-orange">Add To Cart</a>
            </div>
          </div>
          <img src="<?php echo e(asset('public/img/home/')); ?>/Star-rating.svg" alt="">
          <h4 class="text-dark">Necklaces</h4>
          <p><span>$1,000.00</span></p>
        </div>
      </div>

      <div class="col text-start">
        <div class="pr-img">
          <div class="product-box-pt">
            <img src="<?php echo e(asset('public/img/home/')); ?>/3.png" class="img-fluid" alt="">
            <div class="pro-cont">
              <a href="" class="btn bg-orange">Add To Cart</a>
            </div>
          </div>
          <img src="<?php echo e(asset('public/img/home/')); ?>/Star-rating.svg" alt="">
          <h4 class="text-dark">Necklaces</h4>
          <p><span>$1,000.00</span></p>
        </div>
      </div>

      <div class="col text-start">
        <div class="pr-img">
          <div class="product-box-pt">
            <img src="<?php echo e(asset('public/img/home/')); ?>/2.png" class="img-fluid" alt="">
            <div class="pro-cont">
              <a href="" class="btn bg-orange">Add To Cart</a>
            </div>
          </div>
          <img src="<?php echo e(asset('public/img/home/')); ?>/Star-rating.svg" alt="">
          <h4 class="text-dark">Necklaces</h4>
          <p><span>$1,000.00</span></p>
        </div>
      </div>

    </div>
  </div>
</section>

<?php echo $__env->make('element.process_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views/pages/product_details.blade.php ENDPATH**/ ?>