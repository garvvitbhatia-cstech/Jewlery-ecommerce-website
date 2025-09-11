<?php
$action =  Route::getCurrentRoute()->getName();
?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?php echo e(url('/admin/dashboard')); ?>">Logo Here</a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item <?php echo e($action =='admin.dashboard' ?'active':''); ?>">
                    <a href="<?php echo e(url('/admin/dashboard')); ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span><?php echo e(Session::get('admin_type')); ?> Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item  has-sub <?php echo e($action =='admin.update-profile' || $action =='admin.change-password'  ?'active':''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>My Profile</span>
                    </a>
                    <ul class="submenu <?php echo e($action =='admin.update-profile' || $action =='admin.change-password'  ?'active':''); ?>">
                        <li class="submenu-item <?php echo e($action =='admin.update-profile' ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/update-profile')); ?>">Update Profile</a>
                        </li>
                        <li class="submenu-item <?php echo e($action =='admin.change-password' ?'active':''); ?> ">
                            <a href="<?php echo e(url('/admin/change-password')); ?>">Change Password</a>
                        </li>
                        <!--<li class="submenu-item <?php echo e($action =='admin.settings' ?'active':''); ?> ">
                            <a href="<?php echo e(url('/admin/settings')); ?>">Settings</a>
                        </li>-->
                    </ul>
                </li>
                
                <li class="sidebar-item">
                    <a href="<?php echo e(url('/admin/logout')); ?>" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
<?php /**PATH E:\xampp-8.3\htdocs\mail-wiz\resources\views/element/admin/sidebar.blade.php ENDPATH**/ ?>