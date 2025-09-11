<?php $__env->startSection('content'); ?>
<?php if(isset($inner_page->id)): ?>
<?php $__env->startSection('title',strip_tags($inner_page->seo_title)); ?>
<?php $__env->startSection('description',strip_tags($inner_page->seo_description)); ?>
<?php $__env->startSection('keywords',strip_tags($inner_page->seo_keyword)); ?>
<?php $__env->startSection('robots',strip_tags($inner_page->robot_tags)); ?>
<?php endif; ?>

<?php if(isset($banners) && $banners->count()>0): ?>
<div class="hero-section">
  <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="carousel-item <?php echo e($key == 0?'active':''); ?>">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="hero-banner-text">
                <h1><?php echo nl2br($banner->title); ?></h1>
                <p><?php echo nl2br($banner->content); ?></p>
                <div class="btn-set">
                  <a href="<?php echo e(url('/products')); ?>" class="btn">Shop Now</a>
                  <a href="<?php echo e(url('/products')); ?>" class="btn outline">More Details</a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <?php if(isset($banner) && $banner->image != ''): ?>
              <img src="<?php echo e(asset('public/admin/images/banners/')); ?>/<?php echo e($banner->image); ?>" class="" alt="...">
              <?php endif; ?>
            </div>
          </div>          
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>      
    </div>
  </div>
</div>
<?php endif; ?>


<?php if(isset($featured_categories) && $featured_categories->count()>0): ?>
<div class="featured-section section-padding wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-md-8 mx-auto text-cener heading">
              <h2>Featured Collections</h2>
            </div>
          </div>
          <?php $__currentLoopData = $featured_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $modulas = $key%3;
        ?>
        <?php if($modulas == 0): ?>
        <div class="row">
            <?php endif; ?>
          <div class="col-md-4">
            <a href="<?php echo e(url('products/')); ?>/<?php echo e($category->slug); ?>">
              <div class="product-box">
                <?php if($category->icon != ''): ?>
                <img src="<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($category->icon); ?>" alt="">
                <?php else: ?>

                <?php endif; ?>
                <h3><?php echo e($category->title); ?></h3>
                <p><?php echo e(nl2br($category->description)); ?></p>
              </div>
            </a>
          </div>
          <?php if($modulas == 2): ?>   
        </div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
        </div>
      </div>
      <?php endif; ?>

      <div class="offers-section wow fadeInUp">
        <div class="row">
        <?php if(isset($inner_page->id)): ?>
          <div class="col-md-6 px-0">
            <div class="offer-box first">
              <video muted autoplay playsinline loop>
                <source src="//s3-eu-west-1.amazonaws.com/soundboks-images/sb17/tailgate-page/videos/Loop-414x310.mp4" width="100%" type="video/mp4">
              </video>
              <div class="right-offer">
              <h5><?php echo e($inner_page->heading); ?></h5>
              <h3><?php echo $inner_page->content; ?></h3>
                <div class="d-flex">
                  <a href="" class="btn outline bg-transparent">View All</a>
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php if(isset($section2->id)): ?>
          <div class="col-md-6 px-0">
            <div class="offer-box second">
              <video muted autoplay playsinline loop>
                <source src="//s3-eu-west-1.amazonaws.com/soundboks-images/sb17/tailgate-page/videos/Loop-414x310.mp4" width="100%" type="video/mp4">
              </video>
              <div class="right-offer">
              <h5><?php echo e($section2->heading); ?></h5>
              <h3><?php echo $section2->content; ?></h3>
                <div class="d-flex">
                  <a href="" class="btn outline bg-transparent border-white text-white">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>

        </div>
      </div>


      <?php if(isset($products) && $products->count()>0): ?>
      <div class="product-section section-padding wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-md-8 mx-auto text-cener heading">
              <h2>Our Products</h2>
            </div>
          </div>
          <div class="row margin">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
              <a href="javascript:void(0)">
                <div class="pro-box">
                  <div class="img"><img src="<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($product->image); ?>" alt=""></div>
                  <div class="pro-cont">
                    <p>Description</p>
                    <p><span>Gross Weight: <?php echo e($product->gross_weight); ?></span></p>
                    <p><span>Rubellite Weight: <?php echo e($product->rubellite_weight); ?> </span></p>
                    <p><span>Tanzanite Weight: <?php echo e($product->tanzanite_weight); ?> </span></p>
                    <p class="mt-md-3">Estimate</p>
                    <p><span> ₹ <?php echo number_format($product->amount,2); ?></span></p>

                    <div class="text-center"><br>
                      <button onclick="viewDetails('<?php echo e($product->slug); ?>')" class="btn">View Details</button>
                    </div>
                  </div>
                </div>
              </a>
              <a href="<?php echo e(url('/product-details/')); ?>/<?php echo e($product->slug); ?>"><h6><?php echo $product->title; ?></h6></a>
              <p><strong>₹ <?php echo number_format($product->amount,2); ?></strong></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php /* ?>
            <div class="col-md-4">
              <a href="">
                <div class="pro-box">
                  <div class="img"><img src="{{ asset('public/img/home/')}}/pro-box-img2.png" alt=""></div>
                  <div class="pro-cont">
                    <p>Description</p>
                    <p><span>Gross Weight: 23.090 g</span></p>
                    <p><span>Rubellite Weight: 6.01 cts / 2 pcs </span></p>
                    <p><span>Tanzanite Weight: 8.66 cts / 2 pcs </span></p>
                    <p class="mt-md-3">Estimate</p>
                    <p><span> ₹ 6,05,000 ₹ 8,00,000</span></p>
                  </div>
                </div>
              </a>
              <h6>Jade Jaguar Stud Earrings</h6>
              <p><strong>₹ 10,05,000.00</strong></p>
            </div>
            <div class="col-md-4">
              <a href="">
                <div class="pro-box">
                  <div class="img"><img src="{{ asset('public/img/home/')}}/pro-box-img3.png" alt=""></div>
                  <div class="pro-cont">
                    <p>Description</p>
                    <p><span>Gross Weight: 23.090 g</span></p>
                    <p><span>Rubellite Weight: 6.01 cts / 2 pcs </span></p>
                    <p><span>Tanzanite Weight: 8.66 cts / 2 pcs </span></p>
                    <p class="mt-md-3">Estimate</p>
                    <p><span> ₹ 6,05,000 ₹ 8,00,000</span></p>
                  </div>
                </div>
              </a>
              <h6>Isadora Earrings</h6>
              <p><strong>₹ 8,58,000.00</strong></p>
            </div>
            <div class="col-md-4">
              <a href="">
                <div class="pro-box">
                  <div class="img"><img src="{{ asset('public/img/home/')}}/pro-box-img1.png" alt=""></div>
                  <div class="pro-cont">
                    <p>Description</p>
                    <p><span>Gross Weight: 23.090 g</span></p>
                    <p><span>Rubellite Weight: 6.01 cts / 2 pcs </span></p>
                    <p><span>Tanzanite Weight: 8.66 cts / 2 pcs </span></p>
                    <p class="mt-md-3">Estimate</p>
                    <p><span> ₹ 6,05,000 ₹ 8,00,000</span></p>
                  </div>
                </div>
              </a>
              <h6>Perfect Diamond Jewelry</h6>
              <p><strong>₹ 8,58,000.00</strong></p>
            </div>
            <div class="col-md-4">
              <a href="">
                <div class="pro-box">
                  <div class="img"><img src="{{ asset('public/img/home/')}}/pro-box-img4.png" alt=""></div>
                  <div class="pro-cont">
                    <p>Description</p>
                    <p><span>Gross Weight: 23.090 g</span></p>
                    <p><span>Rubellite Weight: 6.01 cts / 2 pcs </span></p>
                    <p><span>Tanzanite Weight: 8.66 cts / 2 pcs </span></p>
                    <p class="mt-md-3">Estimate</p>
                    <p><span> ₹ 6,05,000 ₹ 8,00,000</span></p>
                  </div>
                </div>
              </a>
              <h6>Pearl Gypsy Earrings</h6>
              <p><strong>₹ 20,58000.00</strong></p>
            </div>
            <div class="col-md-4">
              <a href="">
                <div class="pro-box">
                  <div class="img"><img src="{{ asset('public/img/home/')}}/pro-box-img5.png" alt=""></div>
                  <div class="pro-cont">
                    <p>Description</p>
                    <p><span>Gross Weight: 23.090 g</span></p>
                    <p><span>Rubellite Weight: 6.01 cts / 2 pcs </span></p>
                    <p><span>Tanzanite Weight: 8.66 cts / 2 pcs </span></p>
                    <p class="mt-md-3">Estimate</p>
                    <p><span> ₹ 6,05,000 ₹ 8,00,000</span></p>
                  </div>
                </div>
              </a>
              <h6>Jade Jaguar Stud Earrings</h6>
              <p><strong>₹ 18,58,000.00</strong></p>
            </div>
            <?php */ ?>

            <div class="col-md-12 text-center">
              <a href="<?php echo e(url('/products')); ?>" class="text-orange">View All Products</a>
            </div>
          </div>
        </div>
      </div>

      <?php echo $__env->make('element.addtocart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      
      <?php endif; ?>

      <?php if(isset($section3->id)): ?>
      <div class="auction-section product-section section-padding wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-md-8 mx-auto text-cener heading">
            <h2><?php echo e($section3->heading); ?></h2>
            <h6><?php echo $section3->content; ?></h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9 mx-auto">
              <nav>
                <div class="nav nav-tabs mb-3 border-0 d-flex justify-content-center" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Live</button>
                  <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Upcoming</button>
                  <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Auction Results</button>
                </div>
              </nav>
            </div>
            <div class="col-md-12">
              <div class="tab-content " id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <div class="row">
                    <?php if(isset($live_products) && $live_products->count()>0): ?>
                    <?php $__currentLoopData = $live_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                     
                        <div class="pro-box">
                          <div class="img"><img src="<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($product->image); ?>" alt=""></div>
                          <div class="pro-cont">
                            <p class="mt-md-3">Description</p>
                            <p><span>Gross Weight: <?php echo e($product->gross_weight); ?></span></p>
                            <p><span>Rubellite Weight: <?php echo e($product->rubellite_weight); ?> </span></p>
                            <p><span>Tanzanite Weight: <?php echo e($product->tanzanite_weight); ?> </span></p>
                            <p class="mt-md-3">Date</p>
                            <p><span> <?php echo date('d-m-Y h:i a',strtotime($product->start_date)); ?></span></p>
                            <p><span> <?php echo date('d-m-Y h:i a',strtotime($product->end_date)); ?></span></p>
                            <div class="text-center"><br>
                              <?php $start_price = '₹ '.number_format($product->start_price,2) ?>
                              <?php if(session()->has('login_user_email')): ?>                                    
                                <?php if($is_bidder_show == 'Yes'): ?>
                                  <button id="bid_product_<?php echo e($product->id); ?>" onclick="bidProduct('<?php echo e(base64_encode($product->id)); ?>')" class="btn">Bid Now</button>
                                <?php endif; ?>
                              <?php else: ?>
                                <a class="btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Bid Now</a>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      
                      <a href="javascript:void(0)"><h6><?php echo $product->title; ?></h6></a>
                      <p><strong>₹ <?php echo e(number_format($product->amount,2)); ?> - ₹ <?php echo e(number_format($product->start_price,2)); ?></strong></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <div class="col-md-12 text-center mt-md-5">
                      <a href="javascript:void(0)" class="text-orange">No Product Found.</a>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  <div class="row">

                    <?php if(isset($upcoming_products) && $upcoming_products->count()>0): ?>
                    <?php $__currentLoopData = $upcoming_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                      <div class="pro-box">
                        <div class="img">
                        <?php if($product->image != ''): ?>
                          <img src="<?php echo e(URL::asset('public/admin/images/teams')); ?>/<?php echo $product->image; ?>" class="" alt="">
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
                      <a href="javascript:void(0)"><h6><?php echo e($product->title); ?></h6></a>
                      <p><strong> ₹ <?php echo e(number_format($product->amount,2)); ?> - ₹ <?php echo e(number_format($product->start_price,2)); ?></strong></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <div class="col-md-12 text-center mt-md-5">
                      <a href="javascript:void(0)" class="text-orange">No Product Found.</a>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                       <div class="row"> 

                    <?php if(isset($auction_results) && $auction_results->count()>0): ?>
                    <?php $__currentLoopData = $auction_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $auction_result = Helper::getAuctionResult($product->product_id);
                    ?>
                    <div class="col-md-4">
                      <div class="pro-box">
                        <div class="img">
                        <?php if($product->image != ''): ?>
                          <img src="<?php echo e(URL::asset('public/admin/images/teams')); ?>/<?php echo $product->image; ?>" class="" alt="">
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
                      <a href="javascript:void(0)"><h6><?php echo e($product->title); ?></h6></a>                                                            
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <div class="col-md-12 text-center mt-md-5">
                      <a href="" class="text-orange">No Product Found</a>
                    </div>
                    <?php endif; ?>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <?php if(isset($section4->id)): ?>
      <div class="test-section section-padding wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-md-8 mx-auto text-cener heading">
            <h2 class="text-white"><?php echo e($section4->heading); ?></h2>
            <p class="text-white mt-3"><?php echo $section4->content; ?></p>
            </div>
          </div>
          
          <?php if(isset($testimonials) && $testimonials->count() > 0): ?>
          <div class="test-carousel owl-carousel owl-theme">

            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
              <div class="testimonial-box">
                <h6><?php echo e($testimonial->title); ?></h6>
                <p><?php echo e(nl2br($testimonial->testimonial)); ?></p>
                <div class="test-bt d-flex align-items-center justify-content-between">
                  <div class="test-profile d-flex align-items-center">
                    <?php if($testimonial->profile != ''): ?>
                    <img src="<?php echo e(URL::asset('public/admin/images/testimonials')); ?>/<?php echo $testimonial->profile; ?>" class="img-fluid" alt="">
                    <?php endif; ?>
                    <p><?php echo e($testimonial->user); ?></p>
                  </div>
                  <div class="star">
                  <?php for($x=1;$x<=$testimonial->rating;$x++): ?>
                  <span class="fa fa-star checked" style="color: #f9b92d;"></span>
                  <?php endfor; ?>
                  <?php /* ?><img src="{{ asset('public/img/home/')}}/Star.svg" alt=""><?php */ ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <?php endif; ?>
          <div class="row">
            <div class="col-md-12 text-center mt-md-5">
              <a href="" class="text-white">View All Testimonials</a>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>


      <?php if(isset($section5->id)): ?>
      <div class="about-section section-padding wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto text-cener heading">
            <p class="text-uppercase"><?php echo e($section5->heading); ?></p>
            <h2><?php echo e($section5->sub_heading); ?></h2>
            <p><?php echo $section5->content; ?></p>
            </div>
          </div>
          <div class="row align-items-center conts px-md-4">      
            <?php if($section5->banner != '' && $section5->banner_status == 1): ?>
            <div class="col-md-4">
            <img src="<?php echo e(URL::asset('public/admin/images/banners')); ?>/<?php echo $section5->banner; ?>" class="img-fluid" alt="">
            </div>
            <div class="col-md-8">
              <p class="mt-md-0"><?php echo substr($section5->description,0,799); ?></p>
              <a href="" class="text-orange">Read More</a>
            </div>
            <?php else: ?>
            <div class="col-md-12">
              <p class="mt-md-0"><?php echo substr($section5->description,0,799); ?></p>
              <a href="" class="text-orange">Read More</a>
            </div>
            <?php endif; ?>      
        </div>

        </div>
      </div>
      <?php endif; ?>

      <?php if(isset($exclusive_products) && $exclusive_products->count()>0): ?>
      <div class="auction-section exclusive section-padding wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-0 heading d-flex justify-content-between">
              <?php if(isset($section6->id)): ?>
              <h2>Our Exclusive Collections</h2>
              <?php endif; ?>
              <a href="<?php echo e(url('/products')); ?>" class="text-orange">View All Products</a>
            </div>
          </div>
        </div>
        <div class="ex-carousel owl-carousel owl-theme">
          <?php $__currentLoopData = $exclusive_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="item">
            <div class="pro-box">
              <div class="img"><img src="<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($product->image); ?>" alt=""></div>
              <div class="pro-cont">
                <a href="javascript:void(0)" onclick="viewDetails('<?php echo e($product->slug); ?>')" class="btn bg-orange">View Details</a>
              </div>
            </div>
            <a href="<?php echo e(url('/product-details/')); ?>/<?php echo e($product->slug); ?>"><h6><?php echo $product->title; ?></h6></a>
            <p><strong>₹ <?php echo number_format($product->amount,2); ?></strong></p>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
        </div>
      </div>
      <?php endif; ?>
     
      <?php echo $__env->make('element.process_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="modal" tabindex="-1" role="dialog" id="bid_now_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="bid_now_form" method="post"></form>
    </div>
  </div>
</div>

<script type="text/javascript">  
  function  viewDetails(slug){
    window.location.href = "<?php echo e(url('/product-details/')); ?>"+'/'+slug;
  }
  $(document).on('click','#bidnow_btn',function(){
    var flag = 1;
    if($('#ubprice').val() == ''){
      $('#ubpriceError').html('Please enter bidding price');
      flag = 0;
      return false;
    }
    if($('#ucomment').val() == ''){
      //$('#ucommentError').html('Please enter comment');
      //flag = 0;
      //return false;
    }
    var price = $('#ubprice').val();
    var comment = $('#ucomment').val();
    var pid = $('#bpid').val();
    if(flag == 1){
      var url = "<?php echo e(route('pages.add-new-bid')); ?>";
      $('#bidnow_btn').html('Processing...');
      $('#bidnow_btn').attr('disabled',true);
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},			
        url: url,
        data: {pid:pid,price:price,comment:comment},
        success:function(response){
          if(response == 'Success'){
            $('#bid_now_modal').modal("hide");
            swal("Success!", 'Bidding submitted successfully', "success");
          }else if(response == 'priceError'){
            $('#ubpriceError').html('Bidding price must be greater then bidding start price');
            $('#ubprice').val('');
          }else{
            $('#bid_now_modal').modal("hide");
            swal("Error!", 'Something went wrong', "error");
          }
          $('#bidnow_btn').html('Submit');
          $('#bidnow_btn').attr('disabled',false);
        }
      });
      return false;
    }
  });
  function bidProduct(pid){
    $('#bid_now_form').html('Processing...');
    $('#bid_now_modal').modal("show");
    if(pid  != ''){
      var url = "<?php echo e(route('pages.get-bidding-product-details')); ?>";
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},			
        url: url,
        data: {pid:pid},
        success:function(response){
          $('#bid_now_form').html(response);          
        }
      });
      return false;      
    }
  }


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views/pages/index.blade.php ENDPATH**/ ?>