<?php
$action =  Route::getCurrentRoute()->getName();
?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?php echo e(url('/admin/dashboard')); ?>"><img src="<?php echo e(asset('public/admin/images/logo/logo.png')); ?>" style="height: 36px;" alt="Logo" srcset=""></a>
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
                    </ul>
                </li>
                <?php if(Session::get('admin_type') == 'Admin'): ?>
                <?php
                $managerActive =
                $shippingMethodActive =
                $paymentMethodActive =
                false;
                if($action =='admin.shipping-methods' ||  $action =='admin.add-shipping-method' ||  $action =='admin.edit-shipping-method'){
                    $managerActive = $shippingMethodActive = true;
                }
                if($action =='admin.payment-methods' ||  $action =='admin.add-payment-method' ||  $action =='admin.edit-payment-method'){
                    $managerActive = $paymentMethodActive = true;
                }
                ?>
                <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-medical"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="submenu <?php echo e($managerActive ?'active':''); ?>">
                        <li class="submenu-item <?php echo e($shippingMethodActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/shipping-methods')); ?>">Shipping Methods</a>
                        </li>
                        <li class="submenu-item <?php echo e($paymentMethodActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/payment-methods')); ?>">Payment Methods</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                
                <?php if(Session::get('admin_type') == 'Admin'): ?>
                <?php
                $managerActive =
                $consultationTypes =
                $labTest =
                $labTestInstructions =
                $ailmentsActive =
                $licenseTypes =
                $licenses =
                $pathy =
                $qualificationTypes =
                $serviceType =
                $specialties =
                $service =
                $practices =
                $banks =
                $languages =
                $languageProficiencies =
                $licenseJurisdictionActive =
                $symptoms =
                $status =
                $taxes =
                $blogs =
                false;

                if($action =='admin.ailments' ||  $action =='admin.add-ailment' ||  $action =='admin.edit-ailment'){
                    $managerActive = $ailmentsActive = true;
                }
                if($action =='admin.consultation-types' ||  $action =='admin.add-consultation-type' ||  $action =='admin.edit-consultation-type'){
                    $managerActive = $consultationTypes = true;
                }
                if($action =='admin.lab-tests' ||  $action =='admin.add-lab-test' ||  $action =='admin.edit-lab-test'){
                    $managerActive = $labTest = true;
                }
                if($action =='admin.lab-test-instructions' ||  $action =='admin.add-lab-test-instruction' ||  $action =='admin.edit-lab-test-instruction'){
                    $managerActive = $labTestInstructions = true;
                }
                if($action =='admin.license-types' ||  $action =='admin.add-license-type' ||  $action =='admin.edit-license-type'){
                    $managerActive = $licenseTypes = true;
                }
                if($action =='admin.licenses' ||  $action =='admin.add-license' ||  $action =='admin.edit-license'){
                    $managerActive = $licenses = true;
                }
                if($action =='admin.pathy' ||  $action =='admin.add-pathy' ||  $action =='admin.edit-pathy'){
                    $managerActive = $pathy = true;
                }
                if($action =='admin.qualification-types' ||  $action =='admin.add-qualification-type' ||  $action =='admin.edit-qualification-type'){
                    $managerActive = $qualificationTypes = true;
                }
                if($action =='admin.service-types' ||  $action =='admin.add-service-type' ||  $action =='admin.edit-service-type'){
                    $managerActive = $serviceType = true;
                }
                if($action =='admin.specialties' ||  $action =='admin.add-specialty' ||  $action =='admin.edit-specialty'){
                    $managerActive = $specialties = true;
                }
                if($action =='admin.services' ||  $action =='admin.add-service' ||  $action =='admin.edit-service'){
                    $managerActive = $service = true;
                }
                if($action =='admin.practices' ||  $action =='admin.add-practice' ||  $action =='admin.edit-practice'){
                    $managerActive = $practices = true;
                }
                if($action =='admin.banks' ||  $action =='admin.add-bank' ||  $action =='admin.edit-bank'){
                    $managerActive = $banks = true;
                }
                if($action =='admin.languages' ||  $action =='admin.add-language' ||  $action =='admin.edit-language'){
                    $managerActive = $languages = true;
                }
                if($action =='admin.language-proficiencies' ||  $action =='admin.add-language-proficiency' ||  $action =='admin.edit-language-proficiency'){
                    $managerActive = $languageProficiencies = true;
                }
                if($action =='admin.license-jurisdictions' ||  $action =='admin.add-license-jurisdiction' ||  $action =='admin.edit-license-jurisdiction'){
                    $managerActive = $licenseJurisdictionActive = true;
                }
                if($action =='admin.symptoms' ||  $action =='admin.add-symptom' ||  $action =='admin.edit-symptom'){
                    $managerActive = $symptoms = true;
                }
                if($action =='admin.status' ||  $action =='admin.add-status' ||  $action =='admin.edit-status'){
                    $managerActive = $status = true;
                }
                if($action =='admin.taxes' ||  $action =='admin.add-tax' ||  $action =='admin.edit-tax'){
                    $managerActive = $taxes = true;
                }
                if($action =='admin.blogs' ||  $action =='admin.add-blog' ||  $action =='admin.edit-blog'){
                    $managerActive = $blogs = true;
                }
                ?>

                <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-list"></i>
                        <span>General Managers</span>
                    </a>
                    <ul class="submenu <?php echo e($managerActive ?'active':''); ?>">
                        
                        <li class="submenu-item <?php echo e($licenseTypes ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/license-types')); ?>">License Types</a>
                        </li>
                        <li class="submenu-item <?php echo e($licenses ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/licenses')); ?>">Licenses</a>
                        </li>
                        <li class="submenu-item <?php echo e($serviceType ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/service-types')); ?>">Service Types</a>
                        </li>
                        <li class="submenu-item <?php echo e($service ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/services')); ?>">Services</a>
                        </li>
                        <li class="submenu-item <?php echo e($languages ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/languages')); ?>">Languages</a>
                        </li>
                        <li class="submenu-item <?php echo e($status ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/status')); ?>">Status</a>
                        </li>
                        <li class="submenu-item <?php echo e($blogs ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/blogs')); ?>">Blogs</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php
                $managerActive =
                $brandsActive =
                $categoriesActive =
                $subCategoriesActive =
                $productsActive =
                $ingredientsActive =
                $moderationProductsActive =
                $disapprovedProductsActive = 
                $vendorSellProductsActive = 
                $unitsActive =
                false;
                if($action =='admin.brands' ||  $action =='admin.add-brand' ||  $action =='admin.edit-brand'){
                    $managerActive = $brandsActive = true;
                }
                if($action =='admin.categories' ||  $action =='admin.add-category' ||  $action =='admin.edit-category'){
                    $managerActive = $categoriesActive = true;
                }
                if($action =='admin.sub-categories' ||  $action =='admin.add-sub-category' ||  $action =='admin.edit-sub-category'){
                    $managerActive = $subCategoriesActive = true;
                }
                if($action =='admin.products' ||  $action =='admin.add-product' ||  $action =='admin.edit-product'){
                    $managerActive = $productsActive = true;
                }
                if($action =='admin.disapproved-products' || $action =='admin.view-disapproved-product'){
                    $managerActive = $disapprovedProductsActive = true;
                }
                if($action =='admin.vendor_sell_products'){
                    $managerActive = $vendorSellProductsActive = true;
                }
                if($action =='admin.ingredients' ||  $action =='admin.add-ingredient' ||  $action =='admin.edit-ingredient'){
                    $managerActive = $ingredientsActive = true;
                }
                if($action =='admin.moderation-products' || $action =='admin.view-moderation-product'){
                    $managerActive = $moderationProductsActive = true;
                }
                if($action =='admin.units' ||  $action =='admin.add-unit' ||  $action =='admin.edit-unit'){
                    $managerActive = $unitsActive = true;
                }
                ?>
                <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-box"></i>
                        <span>Product Management</span>
                    </a>
                    <ul class="submenu <?php echo e($managerActive ?'active':''); ?>">
                        <li class="submenu-item <?php echo e($categoriesActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/categories')); ?>">Categories</a>
                        </li>
                        <?php if(Session::get('admin_type') == 'Admin'): ?>
                        <li class="submenu-item <?php echo e($subCategoriesActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/sub-categories')); ?>">Sub Categories</a>
                        </li>
                        <li class="submenu-item <?php echo e($brandsActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/brands')); ?>">Brands</a>
                        </li>
                        <li class="submenu-item <?php echo e($unitsActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/units')); ?>">Units</a>
                        </li>
                        <?php endif; ?>                        
                        
                        <?php if(Session::get('admin_type') == 'Admin'): ?>
                        <li class="submenu-item <?php echo e($productsActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/products')); ?>">Products</a>
                        </li>
                        <?php else: ?>
                        <li class="submenu-item <?php echo e($productsActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/products')); ?>">Active Products</a>
                        </li>
                        <li class="submenu-item <?php echo e($vendorSellProductsActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/vendor-sell-products')); ?>">Products That Vendor Sell</a>
                        </li>
                        <?php endif; ?>                        
                    </ul>
                </li>
				
                <?php if(Session::get('admin_type') == 'Admin'): ?>
                <?php
                $managerActive =
                $hospitalBrands =
                $hospitalTypes =
                $hospitals =
                $hospitalDepartments =
                $hospitalLicences =
                $hospitalServices =
                $hospitalSpecialities =
                false;
                if($action =='admin.hospital-brands' ||  $action =='admin.add-hospital-brand' ||  $action =='admin.edit-hospital-brand'){
                    $managerActive = $hospitalBrands = true;
                }
                if($action =='admin.hospital-types' ||  $action =='admin.add-hospital-type' ||  $action =='admin.edit-hospital-type'){
                    $managerActive = $hospitalTypes = true;
                }
                if($action =='admin.hospitals' ||  $action =='admin.add-hospital' ||  $action =='admin.edit-hospital'){
                    $managerActive = $hospitals = true;
                }
                if($action =='admin.hospital.departments' ||  $action =='admin.add-hospital-department' ||  $action =='admin.edit-hospital-department'){
                    $managerActive = $hospitalDepartments = true;
                }
                if($action =='admin.hospital.licenses' ||  $action =='admin.add-hospital-license' ||  $action =='admin.edit-hospital-license'){
                    $managerActive = $hospitalLicences = true;
                }
                if($action =='admin.hospital.services' ||  $action =='admin.add-hospital-service' ||  $action =='admin.edit-hospital-service'){
                    $managerActive = $hospitalServices = true;
                }
                if($action =='admin.hospital.specialities' ||  $action =='admin.add-hospital-speciality' ||  $action =='admin.edit-hospital-speciality'){
                    $managerActive = $hospitalSpecialities = true;
                }
                ?>
                <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-box"></i>
                        <span>Hospital Management</span>
                    </a>
                    <ul class="submenu <?php echo e($managerActive ?'active':''); ?>">
                        <li class="submenu-item <?php echo e($hospitalBrands ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/hospital-brands')); ?>">Hospital Brands</a>
                        </li>
                        <li class="submenu-item <?php echo e($hospitalTypes ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/hospital-types')); ?>">Hospital Types</a>
                        </li>
                        <li class="submenu-item <?php echo e($hospitals ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/hospitals')); ?>">Hospitals</a>
                        </li>
                        <li class="submenu-item <?php echo e($hospitalDepartments ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/hospital-departments')); ?>">Hospital Departments</a>
                        </li>
                        <li class="submenu-item <?php echo e($hospitalLicences ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/hospital-licenses')); ?>">Hospital Licenses</a>
                        </li>
                        <li class="submenu-item <?php echo e($hospitalServices ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/hospital-services')); ?>">Hospital Services</a>
                        </li>
                        <li class="submenu-item <?php echo e($hospitalSpecialities ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/hospital-specialities')); ?>">Hospital Specialities</a>
                        </li>

                    </ul>
                </li>
                <?php endif; ?>
				
                <?php if(Session::get('admin_type') == 'Admin'): ?>
                <?php
                $managerActive =
                $subscriptions =
                $corporateSubscriptions =
                false;
                if($action =='admin.subscriptions' ||  $action =='admin.add-subscription' ||  $action =='admin.edit-subscription'){
                    $managerActive = $subscriptions = true;
                }
                if($action =='admin.corporate-subscriptions' || $action =='admin.add-corporate-subscription' ||  $action =='admin.edit-corporate-subscription'){
                    $managerActive = $corporateSubscriptions = true;
                }
                ?>
                <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bullseye"></i>
                        <span>Subscriptions</span>
                    </a>
                    <ul class="submenu <?php echo e($managerActive ?'active':''); ?>">
                        <li class="submenu-item <?php echo e($subscriptions ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/subscriptions')); ?>">User Subscriptions</a>
                        </li>
                        <li class="submenu-item <?php echo e($corporateSubscriptions ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/corporate-subscriptions')); ?>">Corporate Subscriptions</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
				
                <?php if(Session::get('admin_type') == 'Admin'): ?>
                <?php
                $managerActive =
                $patients =
                false;
                if($action =='admin.patients' ||  $action =='admin.add-patient' ||  $action =='admin.edit-patient'){
                    $managerActive = $patients = true;
                }
                ?>
                <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-emoji-smile"></i>
                        <span>Customer Management</span>
                    </a>
                    <ul class="submenu <?php echo e($managerActive ?'active':''); ?>">
                        <li class="submenu-item <?php echo e($patients ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/patients')); ?>">Customers </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
				
               
                <?php
                $managerActive =
                $orders =
                $prescription_order =
                $couponCodes =
                $reviews =
                false;
                if($action =='admin.prescription-orders'){
                    $managerActive = $prescription_order = true;
                }
                if($action =='admin.orders' || $action =='admin.view-order-details'){
                    $managerActive = $orders = true;
                }
                if($action =='admin.coupon-codes' || $action =='admin.add-coupon-code' || $action =='admin.edit-coupon-code'){
                    $managerActive = $couponCodes = true;
                }
                if($action =='admin.reviews' || $action =='admin.edit-reviews' || $action =='admin.add-reviews'){
                    $managerActive = $reviews = true;
                }
                ?>
                <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-graph-up"></i>
                        <span>Order Management</span>
                    </a>
                    <ul class="submenu <?php echo e($managerActive ?'active':''); ?>">                    	
                        <li class="submenu-item <?php echo e($orders ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/orders')); ?>">Orders </a>
                        </li>
                        <?php if(Session::get('admin_type') == 'Admin'): ?>
                        <li class="submenu-item <?php echo e($prescription_order ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/prescription-orders')); ?>">Prescription Orders </a>
                        </li>
                        <?php endif; ?>
                        <li class="submenu-item <?php echo e($couponCodes ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/coupon-codes')); ?>">Coupon Codes </a>
                        </li>
                        <li class="submenu-item <?php echo e($reviews ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/reviews')); ?>">Reviews </a>
                        </li>
                    </ul>
                </li>
				
                <?php if(Session::get('admin_type') == 'Admin'): ?>
                <?php
                $managerActive =
                $doctorLevelActive =
                $doctorLanguagesActive =
                $doctorHospitalsActive =
                $doctorHospitalTimeSlotsActive =
                $doctorsActive =
                false;
                if($action =='admin.doctor-levels' ||  $action =='admin.add-doctor-level' ||  $action =='admin.edit-doctor-level'){
                    $managerActive = $doctorLevelActive = true;
                }
                if($action =='admin.doctor-languages' ||  $action =='admin.add-doctor-language' ||  $action =='admin.edit-doctor-language'){
                    $managerActive = $doctorLanguagesActive = true;
                }
                if($action =='admin.doctor-hospitals' ||  $action =='admin.add-doctor-hospital' ||  $action =='admin.edit-doctor-hospital'){
                    $managerActive = $doctorHospitalsActive = true;
                }
                if($action =='admin.doctor-hospital-timeslots' ||  $action =='admin.add-doctor-hospital-timeslot' ||  $action =='admin.edit-doctor-hospital-timeslot'){
                    $managerActive = true;
                }
                if($action =='admin.doctors' ||  $action =='admin.add-doctor' ||  $action =='admin.edit-doctor'){
                    $managerActive =  $doctorsActive = true;
                }
                ?>
                <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-medical"></i>
                        <span>Doctor Management</span>
                    </a>
                    <ul class="submenu <?php echo e($managerActive ?'active':''); ?>">
                        <li class="submenu-item <?php echo e($doctorLevelActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/doctor-levels')); ?>">Doctor Levels</a>
                        </li>

                        <li class="submenu-item <?php echo e($doctorLanguagesActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/doctor-languages')); ?>">Doctor Languages</a>
                        </li>
                        <li class="submenu-item <?php echo e($doctorHospitalsActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/doctor-hospitals')); ?>">Doctor Hospitals</a>
                        </li>
                        <li class="submenu-item <?php echo e($doctorsActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/doctors')); ?>">Doctors</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                
                <?php if(Session::get('admin_type') == 'Admin'): ?>
                <?php
                $managerActive =
                $vendorPlanCategoryActive =
                $vendorPlanActive =
                $vendorActive =
                false;
                if($action =='admin.vendor-plan-categories' ||  $action =='admin.add-vendor-plan-category' ||  $action =='admin.edit-vendor-plan-category'){
                    $managerActive = $vendorPlanCategoryActive = true;
                }
                if($action =='admin.vendor-plans' ||  $action =='admin.add-vendor-plan' ||  $action =='admin.edit-vendor-plan'){
                    $managerActive = $vendorPlanActive = true;
                }
                if($action =='admin.vendors' ||  $action =='admin.add-vendor' ||  $action =='admin.edit-vendor'){
                    $managerActive = $vendorActive = true;
                }
                ?>
                <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-medical"></i>
                        <span>Vendor Management</span>
                    </a>
                    <ul class="submenu <?php echo e($managerActive ?'active':''); ?>">
                        <li class="submenu-item <?php echo e($vendorPlanCategoryActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/vendor-plan-categories')); ?>">Vendor Plan Categories</a>
                        </li>
                        <li class="submenu-item <?php echo e($vendorPlanActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/vendor-plans')); ?>">Vendor Plans</a>
                        </li>
                        <li class="submenu-item <?php echo e($vendorActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/vendors')); ?>">Vendors</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                
                
                <?php
                $managerActive =
                $mindMapActive =
                $salesReportActive =
                $salesManagerActive =
                false;
                if($action =='report.get.mind.map'){
                    $managerActive = $mindMapActive = true;
                }
                if($action =='report.get.sales'){
                    $managerActive = $salesReportActive = true;
                }
                ?>
                <li class="sidebar-item  has-sub <?php echo e($managerActive?'active':''); ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-medical"></i>
                        <span>Reports Management</span>
                    </a>
                    <ul class="submenu <?php echo e($managerActive ?'active':''); ?>">
                     	<?php if(Session::get('admin_type') == 'Admin'): ?>
                        <li class="submenu-item <?php echo e($mindMapActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/get-mind-map')); ?>">Mind Map</a>
                        </li>
                        <?php endif; ?>
                        <li class="submenu-item <?php echo e($salesReportActive ?'active':''); ?>">
                            <a href="<?php echo e(url('/admin/get-sales')); ?>">Sales</a>
                        </li>
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
<?php /**PATH G:\xampp-8\htdocs\laraval_new_admin\resources\views/element/admin/sidebar.blade.php ENDPATH**/ ?>