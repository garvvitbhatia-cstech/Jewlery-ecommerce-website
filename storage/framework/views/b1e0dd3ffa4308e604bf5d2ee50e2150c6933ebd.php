<?php
	$action =  Route::getCurrentRoute()->getName();
?>
 <div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
     <div class="sidebar-header">
      <div class="d-flex justify-content-between">
         <div class="logo"> <a href="<?php echo e(url('/admin/dashboard')); ?>">Logo Here</a> </div>
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
             
             <?php if(Session::get('admin_type') == 'Admin'): ?>
             <li class="submenu-item <?php echo e($accounts?'active':''); ?>"> 
             	<a href="<?php echo e(url('/admin/accounts')); ?>">Accounts</a> 
             </li>
             <?php endif; ?>
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
             <?php if(Session::get('admin_type') == 'Admin'): ?>
             <li class="submenu-item <?php echo e($admins?'active':''); ?>"> 
             	<a href="<?php echo e(url('/admin/admins')); ?>">Admin Manager</a> 
             </li>
             <?php endif; ?>
             
           </ul>
        </li>
         <?php endif; ?>
         <li class="sidebar-item"> <a href="<?php echo e(url('/admin/logout')); ?>" class='sidebar-link'> <i class="bi bi-box-arrow-right"></i> <span>Log Out</span> </a> </li>
       </ul>
    </div>
     <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
   </div>
</div><?php /**PATH G:\xampp-8\htdocs\mailwiz\resources\views/element/admin/sidebar.blade.php ENDPATH**/ ?>