<?php

	$action =  Route::getCurrentRoute()->getName();

?>

 <div id="sidebar" class="active">

  <div class="sidebar-wrapper active">

     <div class="sidebar-header">

      <div class="d-flex justify-content-between">

         <div class="logo"> <a href="<?php echo e(url('/admin/dashboard')); ?>"><img src="<?php echo e(asset('public/admin/images/logo.jpeg')); ?>" style="height:auto; width:100%" alt="Logo"></a> </div>

         <div class="toggler"> <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a> </div>

       </div>

    </div>

     <div class="sidebar-menu">

      <ul class="menu">

         <li class="sidebar-item <?php echo e($action =='admin.dashboard' ?'active':''); ?>"> 

         	<a href="<?php echo e(url('/admin/dashboard')); ?>" class='sidebar-link'> <i class="bi bi-grid-fill"></i> <span><?php echo e(Session::get('admin_type')); ?> Dashboard</span> </a> 

         </li>

         <?php

         $managerActive =

         $profile =

         $changePassword =

         $accounts =

         $settings =

         false;         

         if($action =='admin.update-profile'){

         	$managerActive = $profile = true;

         }

         if($action =='admin.change-password'){

         	$managerActive = $changePassword = true;

         }

         if($action =='admin.accounts'){

         	$managerActive = $accounts = true;

         }   

         if($action =='admin.settings'){

         	$managerActive = $settings = true;

         }          

         ?>

         <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>"> 

         	<a href="#" class='sidebar-link'> <i class="bi bi-person-fill"></i> <span>My Profile</span> </a>

          <ul class="submenu <?php echo e($managerActive?'active':''); ?>">

             <li class="submenu-item <?php echo e($profile?'active':''); ?>"> 

             	<a href="<?php echo e(url('/admin/update-profile')); ?>">Update Profile</a> 

             </li>

             <li class="submenu-item <?php echo e($changePassword?'active':''); ?> "> 

             	<a href="<?php echo e(url('/admin/change-password')); ?>">Change Password</a> 

             </li>

             <li class="submenu-item <?php echo e($settings?'active':''); ?> ">

             	<a href="<?php echo e(url('/admin/settings')); ?>">Settings</a>

             </li>

             <?php /*?>@if(Session::get('admin_type') == 'Admin')

             <li class="submenu-item {{$accounts?'active':''}}"> 

             	<a href="{{ url('/admin/accounts'); }}">Accounts</a> 

             </li>

             @endif<?php */?>

           </ul>

        </li>

         <?php if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account'): ?>

         <?php                        

         $managerActive =

         $users =

         $admins =

         false;

         if($action =='admin.admins' ||  $action =='admin.add-admins' ||  $action =='admin.edit-admins'){

         	$managerActive = $admins = true;

         }

         if($action =='admin.users' ||  $action =='admin.add-user' ||  $action =='admin.edit-user'){

         	$managerActive = $users = true;

         }

         ?>

         <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>"> 

         	<a href="#" class='sidebar-link'> <i class="bi bi-person-fill"></i> <span>Users</span> </a>

          <ul class="submenu <?php echo e($managerActive?'active':''); ?>">

          

             <li class="submenu-item <?php echo e($users?'active':''); ?>"> 

             	<a href="<?php echo e(url('/admin/users')); ?>">Customers </a> 

             </li>

             <?php /*?>@if(Session::get('admin_type') == 'Admin')

             <li class="submenu-item {{$admins?'active':''}}"> 

             	<a href="{{ url('/admin/admins'); }}">Admin Manager</a> 

             </li>

             @endif<?php */?>

             

           </ul>

        </li>

         <?php endif; ?>

         <?php if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account'): ?>

         <?php                        

         $managerActive =

         $categories =

         $products =

         $bidding_products =

         false;

         if($action =='admin.categories' ||  $action =='admin.add-category' ||  $action =='admin.edit-category'){

         	$managerActive = $categories = true;

         }

         if($action =='admin.products' ||  $action =='admin.add-product' ||  $action =='admin.edit-product'){

         	$managerActive = $products = true;

         }

         if($action =='admin.bidding-products' ||  $action =='admin.add-bidding-product' ||  $action =='admin.edit-bidding-product'){

         	$managerActive = $bidding_products = true;

         }

         ?>

         <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>"> 

         	<a href="#" class='sidebar-link'> <i class="bi bi-briefcase-fill"></i> <span>Products</span> </a>

          <ul class="submenu <?php echo e($managerActive?'active':''); ?>">

          

             <li class="submenu-item <?php echo e($categories?'active':''); ?>"> 

             	<a href="<?php echo e(url('/admin/categories')); ?>">Categories </a> 

             </li>

             <li class="submenu-item <?php echo e($products?'active':''); ?>"> 

             	<a href="<?php echo e(url('/admin/products')); ?>">Products </a> 

             </li>

             <li class="submenu-item <?php echo e($bidding_products?'active':''); ?>"> 

             	<a href="<?php echo e(url('/admin/bidding-products')); ?>">Bidding Products</a> 

             </li>             

           </ul>

        </li>

         <?php endif; ?>

         <?php if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account'): ?>

         <?php                        

         $managerActive =

         $bidding_history =

         false;

         if($action =='admin.user-biddings' ||  $action =='admin.view-user-bidding'){

         	$managerActive = $bidding_history = true;

         }

         ?>

         <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>"> 

         	<a href="#" class='sidebar-link'> <i class="bi bi-briefcase-fill"></i> <span>Bidding History</span> </a>

          <ul class="submenu <?php echo e($managerActive?'active':''); ?>">          

             <li class="submenu-item <?php echo e($bidding_history?'active':''); ?>"> 

             	<a href="<?php echo e(url('/admin/user-biddings')); ?>">Bidding History </a> 

             </li>          

           </ul>

        </li>

         <?php endif; ?>

         <?php if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account'): ?>

         <?php                        

         $managerActive =

         $orders =

         $coupon_codes =

         false;

         if($action =='admin.orders' ||  $action =='admin.view-order'){

         	$managerActive = $orders = true;

         }

         if($action =='admin.coupon-codes' ||  $action =='admin.add-coupon-code' ||  $action =='admin.edit-coupon-code'){

         	$managerActive = $coupon_codes = true;

         }

         ?>

         <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>"> 

         	<a href="#" class='sidebar-link'> <i class="bi bi-file-medical-fill"></i> <span>Orders</span> </a>

          <ul class="submenu <?php echo e($managerActive?'active':''); ?>">

          

             <li class="submenu-item <?php echo e($orders?'active':''); ?>"> 

             	<a href="<?php echo e(url('/admin/orders')); ?>">Orders </a> 

             </li>

             <li class="submenu-item <?php echo e($coupon_codes?'active':''); ?>"> 

             	<a href="<?php echo e(url('/admin/coupon-codes')); ?>">Coupon Codes</a> 

             </li>

           </ul>

        </li>

         <?php endif; ?>

         <?php if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account'): ?>

         <?php 

         $managerActive =

         $inner_pages =  

         $testimonials =  

         $banners =  

         $enquiries = 

         $faqs = 

         false;

         if($action =='admin.inner-pages' || $action =='admin.edit-inner-page'){

         	$managerActive = $inner_pages = true;

         }

         if($action =='admin.faqs' ||  $action =='admin.add-faq' ||  $action =='admin.edit-faq'){

         $managerActive = $faqs = true;

         }

         if($action =='admin.banners' ||  $action =='admin.add-banner' ||  $action =='admin.edit-banner'){

         $managerActive = $banners = true;

         }

         if($action =='admin.testimonials' ||  $action =='admin.add-testimonial' ||  $action =='admin.edit-testimonial'){

         $managerActive = $testimonials = true;

         }

         if($action =='admin.enquiries' || $action =='admin.view-enquiry'){

         	$managerActive = $enquiries = true;

       	 }

         ?>

         <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>"> 

         	<a href="#" class='sidebar-link'> <i class="bi bi-file-earmark-image-fill"></i> <span>Inner Pages</span> </a>

          	<ul class="submenu <?php echo e($managerActive?'active':''); ?>">

          

                <li class="submenu-item <?php echo e($inner_pages?'active':''); ?>">

                    <a href="<?php echo e(url('/admin/inner-pages')); ?>">Inner Pages</a>

                </li>

                <li class="submenu-item <?php echo e($faqs?'active':''); ?>">

                    <a href="<?php echo e(url('/admin/faqs')); ?>">Faqs</a>

                </li>

                <li class="submenu-item <?php echo e($banners?'active':''); ?>">

                    <a href="<?php echo e(url('/admin/banners')); ?>">Banners</a>

                </li>

                <li class="submenu-item <?php echo e($enquiries?'active':''); ?>">

                    <a href="<?php echo e(url('/admin/enquiries')); ?>">Enquiries</a>

                </li>

                <li class="submenu-item <?php echo e($testimonials?'active':''); ?>">

                  <a href="<?php echo e(url('/admin/testimonials')); ?>">Testimonials</a>

               </li>

           </ul>

        </li>

         <?php endif; ?>


         <?php if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account'): ?>

         <?php 

         $managerActive =

         $brands =  

         false;

         if($action =='admin.brands' ||  $action =='admin.add-brand' ||  $action =='admin.edit-brand'){

            $managerActive = $brands = true;

         }

         ?>

         <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>"> 

         	<a href="#" class='sidebar-link'> <i class="bi bi-archive-fill"></i> <span>Master</span> </a>

          	<ul class="submenu <?php echo e($managerActive?'active':''); ?>">          

                <li class="submenu-item <?php echo e($brands?'active':''); ?>">

                    <a href="<?php echo e(url('/admin/brands')); ?>">Brand</a>

                </li>

           </ul>

        </li>

         <?php endif; ?>

         <li class="sidebar-item"> <a href="<?php echo e(url('/admin/logout')); ?>" class='sidebar-link'> <i class="bi bi-box-arrow-right"></i> <span>Log Out</span> </a> </li>

       </ul>

    </div>

     <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>

   </div>

</div><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views/element/admin/sidebar.blade.php ENDPATH**/ ?>