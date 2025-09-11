<?php
$cartCount = Helper::getCartCount(session()->get('login_user_id'));
$all_categories = Helper::getAllCategory();
?> 
<header>
    <div class="header">
      <!--Main header start-->
        <nav class="navbar navbar-expand-lg">
              <div class="container-fluid mob-list-view">
              <a class="navbar-brand comp-logo" href="<?php echo e(url('/')); ?>">
              <img src="<?php echo e(asset('public/img/home/')); ?>/aa.png" class="img-fluid" alt=""></a>

                  <div class="right-nav-header">
                      <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <button type="button" class="btn-close me-auto ms-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="d-flex flex-column flex-lg-row align-lg-items-center justify-content-between">
                            <ul class="navbar-nav mx-lg-auto">
                              
                              <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('/')); ?>">Home</a>
                              </li>

                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Antique Jewellery Shop</a>

                                <ul class="dropdown-menu">
                                    <?php if(isset($all_categories) && $all_categories->count()>0): ?>
                                      <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                    
                                      <li><a href="<?php echo e(url('products/')); ?>/<?php echo e($category->slug); ?>" class="dropdown-item"><?php echo e($category->title); ?></a></li>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>                                    
                                </ul>
                              </li>

                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Auctions</a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo e(url('bidding-products/Live')); ?>" class="dropdown-item">Live</a></li>
                                    <li><a href="<?php echo e(url('bidding-products/Upcoming')); ?>" class="dropdown-item">Upcoming</a></li>
                                    <li><a href="<?php echo e(url('bidding-products/Auction Results')); ?>" class="dropdown-item">Auction Results</a></li>
                                </ul>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link d-flex" href="<?php echo e(url('about-us')); ?>">About Us</a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('contact-us')); ?>">Contact Us</a> 
                              </li>
                            
                          </ul>
                                                    
                            </div>   
                                          
                      </div>
                      
                      <div class="d-flex align-items-center">
                          <a href="" class="search-icon me-4" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><img src="<?php echo e(asset('public/img/home/')); ?>/search.svg"/></a>
                          <a href="<?php echo e(url('/my-cart')); ?>" class="cart-icon d-flex align-items-center me-4">
                                <span class="cart-added-item"><?php echo e($cartCount); ?></span>    
                                <img src="<?php echo e(asset('public/img/home/')); ?>/Cart.svg" class="me-0 me-lg-2"/> <span class="mob-none">Cart</span>
                            </a>
                            
                            <?php if(!session()->has('login_user_email')): ?>
                              <a class="d-flex align-items-center" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img src="<?php echo e(asset('public/img/home/')); ?>/User.svg" alt="" class="me-0 me-lg-2"> <span class="mob-none">Login/Register</span></a>
                            <?php else: ?>
                                <div class="dropdown">
                                  <a class="btn btn-warning d-flex align-items-center dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="">
                                  <img src="<?php echo e(asset('public/img/home/')); ?>/User.svg" alt="" class="me-0 me-lg-2"> <span class="mob-none"><?php echo e(session()->get('login_user_name')); ?></span>
                                  </a>
                                  <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="<?php echo e(url('my-account')); ?>">My Profile</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(url('my-orders')); ?>">My Orders</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(url('my-cart')); ?>">My Cart</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(url('my-biddings')); ?>">My Biddings</a></li>
                                    <!---<li><a class="dropdown-item" href="#">My Address</a></li>--->
                                    <li><a class="dropdown-item" href="<?php echo e(url('change-password')); ?>">Change Password</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?php echo e(url('/logout')); ?>">Logout</a></li>
                                  </ul>
                                </div>
                            <?php endif; ?>
                      </div>


                      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                          <span class="navbar-toggler-icon"></span>
                      </button>
                  </div>

                    

              </div>
        </nav>
      <!--Main header end-->
    </div>
  </header>

<?php /**PATH /home/a6xnk0irt52m/public_html/resources/views/element/header.blade.php ENDPATH**/ ?>