

<?php $__env->startSection('content'); ?>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Tax</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/taxes')); ?>">Taxes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Tax</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Tax</h4>
                </div>
                <div class="card-body">
                <form class="form w-100" id="pageForm" action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Name</label>
                                <input type="text" class="form-control" placeholder="Enter Tax" value="<?php echo e($rowData->title); ?>" name="title" id="title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Tax Group</label>
                                <input type="text" class="form-control" placeholder="Tax Group" value="<?php echo e($rowData->tax_group); ?>" name="tax_group" id="tax_group">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Price Include Tax</label>
                                <input type="checkbox" name="include_tax" id="include_tax" value="1" <?php echo e($rowData->include_tax == 1 ? "checked" : ""); ?>/>
                            </div>
                        </div>
                        <div class="text-left">
                            <!--begin::Submit button-->
                            <button type="button" id="form_submit_tax" class="btn btn-sm btn-primary fw-bolder me-3 my-2">
                                <span class="indicator-label" id="form_submit_tax">Submit</span>
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
    let saveDataURL = "<?php echo e(url('/admin/edit-tax/'.$row_id)); ?>";
    let returnURL = "<?php echo e(url('/admin/taxes')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/taxes/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/taxes/edit-page.blade.php ENDPATH**/ ?>