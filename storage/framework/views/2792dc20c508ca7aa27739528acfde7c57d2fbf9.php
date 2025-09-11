

<?php $__env->startSection('content'); ?>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Settings</h3>
                    <p class="text-subtitle text-muted">Update your account details.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Settings</h4>
                </div>
                <div class="card-body">
                <form class="form w-100" id="updateForm" action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="old_banner" value="<?php echo $setting->logo; ?>" />
                            <div class="form-group">
                                <label for="basicInput">Admin Email</label>
                                <input type="text" class="form-control" placeholder="Enter Email" value="<?php echo $setting->admin_email; ?>" name="admin_email" id="admin_email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Company Name</label>
                                <input type="text" class="form-control" value="<?php echo $setting->company_name; ?>" id="company_name" name="company_name">
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Company Contact Number</label>
                                <input type="text" class="form-control" value="<?php echo $setting->mobile; ?>" id="mobile" name="mobile">
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Footer Content</label>
                                <input type="text" class="form-control" value="<?php echo $setting->footer_content; ?>" id="footer_content" name="footer_content">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Company Logo</label>
                                <input class="form-control" type="file" name="logo" id="logo" autocomplete="off" accept="image/png, image/jpg" />
                            </div>
                        </div>
                        <?php if(!empty($setting->logo)): ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="basicInput">Company Logo</label>
                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                    <div class="cropped" id="cropped">
                                        <div class="cropped" id="cropped"><img src="<?php echo e(URL::asset('public/admin/images/profile/')); ?>/<?php echo $setting->logo; ?>" width="150"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Business Address</label>
                                <textarea rows="6" class="form-control" id="business_address" name="business_address"><?php echo $setting->business_address; ?></textarea>
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Footer Info</label>
                                <textarea rows="6" class="form-control" id="footer_info" name="footer_info"><?php echo $setting->footer_info; ?></textarea>
                            </div>
                        </div>
                        <div class="text-left">
                            <!--begin::Submit button-->
                            <button type="button" id="profile_submit" class="btn btn-sm btn-primary fw-bolder me-3 my-2">
                                <span class="indicator-label" id="formSubmit">Submit</span>
                                <span class="indicator-progress d-none">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <!--end::Submit button-->
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

<script>
    let saveDataURL = "<?php echo e(url('/admin/save-setting')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/update-settings.js')); ?>"></script>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8.2\htdocs\new_ecommerce_admin\resources\views//admin/profile/settings.blade.php ENDPATH**/ ?>