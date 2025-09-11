

<?php $__env->startSection('content'); ?>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Vendor Plan</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/vendor-plans')); ?>">Vendor Plans</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Vendor Plan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form class="form w-100" id="pageForm" action="#">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">General Vendor Plan</h4>
                </div>
                <div class="card-body">
                
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Title</label>
                                <input type="text" class="form-control"value="<?php echo e($rowData->title); ?>" name="title" id="title">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput"></label>
                                <select class="form-control" name="vendor_plan_category_id" id="vendor_plan_category_id">
                                <option value="">Select Category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($rowData->vendor_plan_category_id == $category->id): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>;
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Description</label>
                                <textarea class="form-control" name="description" id="description"><?php echo e($rowData->description); ?></textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Offer as the best choice</label><br />
                                <input type="checkbox" value="1"  style="height:30px;width:30px;" <?php echo e($rowData->best_choice ==1?'checked':''); ?> name="best_choice" id="best_choice">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Hide For Vendors</label><br />
                                <input type="checkbox" value="1"  style="height:30px;width:30px;" <?php echo e($rowData->hide_for_vendor ==1?'checked':''); ?> name="hide_for_vendor" id="hide_for_vendor">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Position</label>
                                <input type="text" class="form-control" value="<?php echo e($rowData->position); ?>" name="position" id="position">
                            </div>
                        </div>
                        
                        
                    </div>
                    
                </div>
            </div>
        </section>
        
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Commission</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Price (₹)</label>
                                <input type="text" class="form-control"value="<?php echo e($rowData->price); ?>" name="price" id="price">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput"></label>
                                <select class="form-control" name="price_unit" id="price_unit">
                                <option <?php if($rowData->price_unit == 'Per Month'): ?> selected <?php endif; ?> value="Per Month">Per Month</option>
                                <option <?php if($rowData->price_unit == 'Per Year'): ?> selected <?php endif; ?> value="Per Year">Per Year</option>
                                <option <?php if($rowData->price_unit == 'One Time'): ?> selected <?php endif; ?> value="One Time">One Time</option>
                                </select>
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Transaction fee (%)</label>
                                <input type="text" class="form-control" value="<?php echo e($rowData->txn_fees_percent); ?>" name="txn_fees_percent" id="txn_fees_percent">
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Transaction fee (₹)</label>
                                <input type="text" class="form-control" value="<?php echo e($rowData->txn_fees_rupee); ?>" name="txn_fees_rupee" id="txn_fees_rupee">
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </section>
        
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Restrictions</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Max. products</label>
                                <input type="text" class="form-control"value="<?php echo e($rowData->max_products); ?>" name="max_products" id="max_products">
                            </div>
                        </div>
                        
                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Revenue up to (₹)</label>
                                <input type="text" class="form-control" value="<?php echo e($rowData->revenue_up_to); ?>" name="revenue_up_to" id="revenue_up_to">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Vendor microstore</label><br />
                                <input type="checkbox" value="1"  style="height:30px;width:30px;" <?php echo e($rowData->micro_store ==1?'checked':''); ?> name="micro_store" id="micro_store">
                            </div>
                        </div>
                        
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
                </div>
            </div>
        </section>
        </form>
    </div>
<!-- end plugin js -->
<script>
    let saveDataURL = "<?php echo e(url('/admin/edit-vendor-plan/'.$row_id)); ?>";
    let returnURL = "<?php echo e(url('/admin/vendor-plans')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/vendor_plan/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/vendor_plan/edit-page.blade.php ENDPATH**/ ?>