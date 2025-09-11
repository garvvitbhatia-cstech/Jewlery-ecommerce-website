

<?php $__env->startSection('content'); ?>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Vendor Plan Category</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/vendor-plan-categories')); ?>">Vendor Plan Categories</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Vendor Plan Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Vendor Plan Category</h4>
                </div>
                <div class="card-body">
                <form class="form w-100" id="pageForm" action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Title</label>
                                <input type="text" class="form-control" placeholder="Enter Brand Title" value="<?php echo e($rowData->title); ?>" name="title" id="title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Description</label>
                                <textarea class="form-control" name="description" id="description"><?php echo e($rowData->description); ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Image</label>
                                <input type="file" class="form-control" value="" name="file" id="file">
                                <input type="hidden" name="old_file" value="<?php echo $rowData->image; ?>" />
                            </div>
                        </div>
                        <?php if($rowData->image != ""): ?>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="basicInput">&nbsp;</label>
                                    <img src="<?php echo e(URL::asset('public/img/vendor-plan-category/')); ?>/<?php echo $rowData->image; ?>" width="100">
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="text-left">
                            <!--begin::Submit button-->
                            <button type="button" id="form_submit" class="btn btn-sm btn-primary fw-bolder me-3 my-2">
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
<!-- end plugin js -->
<script>
    let saveDataURL = "<?php echo e(url('/admin/edit-vendor-plan-category/'.$row_id)); ?>";
    let returnURL = "<?php echo e(url('/admin/vendor-plan-categories')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/vendor_plan_category/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\laraval-new-admin\resources\views//admin/vendor_plan_category/edit-page.blade.php ENDPATH**/ ?>