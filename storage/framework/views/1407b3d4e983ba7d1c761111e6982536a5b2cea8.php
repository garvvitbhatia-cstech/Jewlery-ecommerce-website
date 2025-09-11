

<?php $__env->startSection('content'); ?>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manage Profile</h3>
                    <p class="text-subtitle text-muted">Update your account details.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Profile</h4>
                </div>
                <div class="card-body">
                <form class="form w-100" id="updateForm" action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="old_banner" value="<?php echo $userData->profile_image; ?>" />
                            <div class="form-group">
                                <label for="basicInput">Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter Full Name" value="<?php echo $userData->name; ?>" name="name" id="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="disabledInput">Email Address</label>
                                <input type="text" class="form-control" readonly value="<?php echo $userData->email; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="disabledInput">Upload Profile Image</label>
                                <input class="form-control" type="file" name="banner" id="banner" autocomplete="off" accept="image/png, image/jpg" />
                            </div>
                        </div>
                        <?php if(!empty($userData->profile_image)): ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="disabledInput">Profile Picture</label>
                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                    <div class="cropped" id="cropped">
                                        <div class="cropped" id="cropped"><img src="<?php echo e(URL::asset('public/admin/images/profile/')); ?>/<?php echo $userData->profile_image; ?>" width="150"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

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
 <!-- plugin js -->
 <?php echo $__env->yieldPushContent('plugin-scripts'); ?>
<!-- end plugin js -->
<script>
    let saveDataURL = "<?php echo e(url('/admin/save-profile')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/update-profile.js')); ?>"></script>
<?php echo $__env->yieldPushContent('custom-scripts'); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/mailwiz.365wah.com/resources/views//admin/profile/update_profile.blade.php ENDPATH**/ ?>