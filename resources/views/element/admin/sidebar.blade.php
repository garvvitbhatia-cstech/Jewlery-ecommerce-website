@php

	$action =  Route::getCurrentRoute()->getName();

@endphp

 <div id="sidebar" class="active">

  <div class="sidebar-wrapper active">

     <div class="sidebar-header">

      <div class="d-flex justify-content-between">

         <div class="logo"> <a href="{{ url('/admin/dashboard'); }}"><img src="{{ asset('public/admin/images/logo.jpeg') }}" style="height:auto; width:100%" alt="Logo"></a> </div>

         <div class="toggler"> <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a> </div>

       </div>

    </div>

     <div class="sidebar-menu">

      <ul class="menu">

         <li class="sidebar-item {{$action =='admin.dashboard' ?'active':''}}"> 

         	<a href="{{ url('/admin/dashboard'); }}" class='sidebar-link'> <i class="bi bi-grid-fill"></i> <span>{{Session::get('admin_type')}} Dashboard</span> </a> 

         </li>

         @php

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

         @endphp

         <li class="sidebar-item  has-sub {{$managerActive?'active':''}}"> 

         	<a href="#" class='sidebar-link'> <i class="bi bi-person-fill"></i> <span>My Profile</span> </a>

          <ul class="submenu {{$managerActive?'active':''}}">

             <li class="submenu-item {{$profile?'active':''}}"> 

             	<a href="{{ url('/admin/update-profile'); }}">Update Profile</a> 

             </li>

             <li class="submenu-item {{$changePassword?'active':''}} "> 

             	<a href="{{ url('/admin/change-password'); }}">Change Password</a> 

             </li>

             <li class="submenu-item {{$settings?'active':''}} ">

             	<a href="{{ url('/admin/settings'); }}">Settings</a>

             </li>

             <?php /*?>@if(Session::get('admin_type') == 'Admin')

             <li class="submenu-item {{$accounts?'active':''}}"> 

             	<a href="{{ url('/admin/accounts'); }}">Accounts</a> 

             </li>

             @endif<?php */?>

           </ul>

        </li>

         @if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account')

         @php                        

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

         @endphp

         <li class="sidebar-item  has-sub {{$managerActive?'active':''}}"> 

         	<a href="#" class='sidebar-link'> <i class="bi bi-person-fill"></i> <span>Users</span> </a>

          <ul class="submenu {{$managerActive?'active':''}}">

          

             <li class="submenu-item {{$users?'active':''}}"> 

             	<a href="{{ url('/admin/users'); }}">Customers </a> 

             </li>

             <?php /*?>@if(Session::get('admin_type') == 'Admin')

             <li class="submenu-item {{$admins?'active':''}}"> 

             	<a href="{{ url('/admin/admins'); }}">Admin Manager</a> 

             </li>

             @endif<?php */?>

             

           </ul>

        </li>

         @endif

         @if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account')

         @php                        

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

         @endphp

         <li class="sidebar-item  has-sub {{$managerActive?'active':''}}"> 

         	<a href="#" class='sidebar-link'> <i class="bi bi-briefcase-fill"></i> <span>Products</span> </a>

          <ul class="submenu {{$managerActive?'active':''}}">

          

             <li class="submenu-item {{$categories?'active':''}}"> 

             	<a href="{{ url('/admin/categories'); }}">Categories </a> 

             </li>

             <li class="submenu-item {{$products?'active':''}}"> 

             	<a href="{{ url('/admin/products'); }}">Products </a> 

             </li>

             <li class="submenu-item {{$bidding_products?'active':''}}"> 

             	<a href="{{ url('/admin/bidding-products'); }}">Bidding Products</a> 

             </li>             

           </ul>

        </li>

         @endif

         @if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account')

         @php                        

         $managerActive =

         $bidding_history =

         false;

         if($action =='admin.user-biddings' ||  $action =='admin.view-user-bidding'){

         	$managerActive = $bidding_history = true;

         }

         @endphp

         <li class="sidebar-item  has-sub {{$managerActive?'active':''}}"> 

         	<a href="#" class='sidebar-link'> <i class="bi bi-briefcase-fill"></i> <span>Bidding History</span> </a>

          <ul class="submenu {{$managerActive?'active':''}}">          

             <li class="submenu-item {{$bidding_history?'active':''}}"> 

             	<a href="{{ url('/admin/user-biddings'); }}">Bidding History </a> 

             </li>          

           </ul>

        </li>

         @endif

         @if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account')

         @php                        

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

         @endphp

         <li class="sidebar-item  has-sub {{$managerActive?'active':''}}"> 

         	<a href="#" class='sidebar-link'> <i class="bi bi-file-medical-fill"></i> <span>Orders</span> </a>

          <ul class="submenu {{$managerActive?'active':''}}">

          

             <li class="submenu-item {{$orders?'active':''}}"> 

             	<a href="{{ url('/admin/orders'); }}">Orders </a> 

             </li>

             <li class="submenu-item {{$coupon_codes?'active':''}}"> 

             	<a href="{{ url('/admin/coupon-codes'); }}">Coupon Codes</a> 

             </li>

           </ul>

        </li>

         @endif

         @if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account')

         @php 

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

         @endphp

         <li class="sidebar-item  has-sub {{$managerActive?'active':''}}"> 

         	<a href="#" class='sidebar-link'> <i class="bi bi-file-earmark-image-fill"></i> <span>Inner Pages</span> </a>

          	<ul class="submenu {{$managerActive?'active':''}}">

          

                <li class="submenu-item {{$inner_pages?'active':''}}">

                    <a href="{{ url('/admin/inner-pages'); }}">Inner Pages</a>

                </li>

                <li class="submenu-item {{$faqs?'active':''}}">

                    <a href="{{ url('/admin/faqs'); }}">Faqs</a>

                </li>

                <li class="submenu-item {{$banners?'active':''}}">

                    <a href="{{ url('/admin/banners'); }}">Banners</a>

                </li>

                <li class="submenu-item {{$enquiries?'active':''}}">

                    <a href="{{ url('/admin/enquiries'); }}">Enquiries</a>

                </li>

                <li class="submenu-item {{$testimonials?'active':''}}">

                  <a href="{{ url('/admin/testimonials'); }}">Testimonials</a>

               </li>

           </ul>

        </li>

         @endif


         @if(Session::get('admin_type') == 'Admin' || Session::get('admin_type') == 'Account')

         @php 

         $managerActive =

         $brands =  

         false;

         if($action =='admin.brands' ||  $action =='admin.add-brand' ||  $action =='admin.edit-brand'){

            $managerActive = $brands = true;

         }

         @endphp

         <li class="sidebar-item  has-sub {{$managerActive?'active':''}}"> 

         	<a href="#" class='sidebar-link'> <i class="bi bi-archive-fill"></i> <span>Master</span> </a>

          	<ul class="submenu {{$managerActive?'active':''}}">          

                <li class="submenu-item {{$brands?'active':''}}">

                    <a href="{{ url('/admin/brands'); }}">Brand</a>

                </li>

           </ul>

        </li>

         @endif

         <li class="sidebar-item"> <a href="{{ url('/admin/logout'); }}" class='sidebar-link'> <i class="bi bi-box-arrow-right"></i> <span>Log Out</span> </a> </li>

       </ul>

    </div>

     <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>

   </div>

</div>