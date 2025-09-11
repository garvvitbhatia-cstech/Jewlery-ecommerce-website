<?php
  $setting = Helper::settings();
?>
<footer class="footer  wow fadeInUp">
      <div class="container">
        <div class="newsletter">
          <h3 class="text-white">Sign up our newsletter</h3>
          <div class="form w-100">
            <div class="col-md-9 col-lg-7 d-flex mx-auto align-items-center">
              <input type="text" class="subs-box" id="newsletter_subscribe" placeholder="Enter your email id">              
              <button id="newsletter_subscribe_btn" class="btn bg-dark text-white">Signup</button>              
            </div>
          </div>
        </div>
        
        <div class="row wow fadeInUp">
          <div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">Online Store Support</h4>
              <ul class="list-unstyled">
                <li><a href="<?php echo e(url('/contact-us')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Contact Us</a></li>
                <li><a href="<?php echo e(url('/faqs')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> FAQs</a></li>
                <?php if(!session()->has('login_user_email')): ?>
                  <li><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt="">Order Tracking</a></li>
                  <li><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> My Account</a></li>
                <?php else: ?>
                  <li><a href="<?php echo e(url('/my-orders')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Order Tracking</a></li>
                  <li><a href="<?php echo e(url('/my-account')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> My Account</a></li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">Policies</h4>
              <ul class="list-unstyled">
                <li><a href="<?php echo e(url('/privacy-policy')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Privacy Policy</a></li>
                <li><a href="<?php echo e(url('/shipping-and-return')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Shipping & Returns</a></li>
                <li><a href="<?php echo e(url('/terms-and-conditions')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Terms & Conditions</a></li>
              </ul>
            </div>
          </div>
          <!---<div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">More Ways to Shop</h4>
              <ul class="list-unstyled">
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Catalog</a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Best Sellers</a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> New Arrivals</a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Exhibitions</a></li>
              </ul>
            </div>
          </div>--->
          <div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">About Us</h4>
              <ul class="list-unstyled">
                <li><a href="<?php echo e(url('/about-us')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> About Us</a></li>
                <li><a href="<?php echo e(url('/store-events')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Store Events</a></li>
                <li><a href="<?php echo e(url('/met-wholesale')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Met Wholesale</a></li>
                <?php if(!session()->has('login_user_email')): ?>
                  <li><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt="">Order Tracking</a></li>
                <?php else: ?>
                  <li><a href="<?php echo e(url('/my-orders')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Order Tracking</a></li>
                <?php endif; ?>
                <li><a href="<?php echo e(url('/licensees')); ?>"><img src="<?php echo e(asset('public/img/home/')); ?>/Arrow.svg" alt=""> Licensees</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">Visit The SGJ</h4>
              <ul class="list-unstyled">
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Contact.svg" alt=""> <?php echo e($setting->mobile); ?></a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Email.svg" alt="">  <?php echo e($setting->admin_email); ?></a></li>
                <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Location.svg" alt=""> <?php echo nl2br($setting->business_address); ?></a></li>
              </ul>
            </div>
          </div>
          
        </div>
        <hr class="w-100">
        <div class="footer-bottom">
          <p class="copyright-text text-white"><?php echo e($setting->footer_content); ?></p>
            <ul class="social list-unstyled d-flex flex-row">
              <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Instagram.svg" alt=""></a></li>
              <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/Facebook.svg" alt=""></a></li>
              <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/twitter x.svg" alt=""></a></li>
              <li><a href=""><img src="<?php echo e(asset('public/img/home/')); ?>/twitter-x.svg" alt=""></a></li>
            </ul>
        </div>
      </div>        
    </div>
  </footer>
  


  <!--Search box model start-->
<div class="modal fade search-box-model" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
      <a href="" type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></a>
    <div class="modal-body">
      <form action="#" class="search-box-form">
          <div class="search-form-main">
            <input type="search" placeholder="Search Product" class="search-box-field">
            <button type="submit" class="search-btn"><img src="<?php echo e(asset('public/img/home/')); ?>/search.svg"/></button>
          </div>
      </form>
    </div>    
  </div>
</div>
</div>
<!--Search box model end -->


<?php echo $__env->make('element.registration', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views/element/footer.blade.php ENDPATH**/ ?>