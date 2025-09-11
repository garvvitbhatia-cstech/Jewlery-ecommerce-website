

<?php $__env->startSection('content'); ?>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Review</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/reviews')); ?>">Reviews</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Review</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Review</h4>
                </div>
                <div class="card-body">
                <form class="form w-100" id="pageForm" action="#">
                    <div class="row">
                    
                         <?php
                        $itemName = '';
                        if($rowData->type == 'Product'){
                            $productData = Helper::getProductInfo($rowData->item_id);
                            $itemName = $productData->product_name;
                        }
                        if($rowData->type == 'Doctor'){
                            $doctorData = Helper::getUserInfo($rowData->item_id);
                            $itemName = $doctorData->name;
                        }
                        if($rowData->type == 'Vendor'){
                            $vendorData = Helper::getUserInfo($rowData->item_id);
                            $itemName = $vendorData->name;
                        }
                        if($rowData->type == 'Subscription'){
                            $subsData = Helper::getSubscriptionInfo($rowData->item_id);
                            $itemName = $subsData->title;
                        }
                        $userData = Helper::getUserInfo($rowData->user_id);
                        ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput"><strong>Type:</strong> </label>
                                <?php echo e($rowData->type); ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput"><strong>Item:</strong> </label>
                                <?php echo e($itemName); ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput"><strong>User Info:</strong> </label>
                                <?php echo e($userData->name); ?>, <?php echo e($userData->email); ?>, <?php echo e($userData->mobile); ?>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Heading</label>
                                <input type="text" class="form-control" value="<?php echo e($rowData->heading); ?>" name="heading" id="heading">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Rating</label>
                                <select class="form-control" name="rating" id="rating">
                                <option <?php if($rowData->rating == 1): ?> selected <?php endif; ?> value="1">1</option>
                                <option <?php if($rowData->rating == 2): ?> selected <?php endif; ?> value="2">2</option>
                                <option <?php if($rowData->rating == 3): ?> selected <?php endif; ?> value="3">3</option>
                                <option <?php if($rowData->rating == 4): ?> selected <?php endif; ?> value="4">4</option>
                                <option <?php if($rowData->rating == 5): ?> selected <?php endif; ?> value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="basicInput">Remark</label>
                                <textarea name="remark" id="remark" class="form-control"><?php echo e($rowData->remark); ?></textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Status</label>
                                <select onchange="$(this).val() == 3 ? $('#reject_remark_div').show() : $('#reject_remark_div').hide()" class="form-control" name="review_status" id="review_status">
                                <option value="">Select Status</option>
                                <option <?php if($rowData->review_status == 1): ?> selected <?php endif; ?> value="1">Approved</option>
                                <option <?php if($rowData->review_status == 2): ?> selected <?php endif; ?> value="2">Pending</option>
                                <option <?php if($rowData->review_status == 3): ?> selected <?php endif; ?> value="3">Reject</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-8" id="reject_remark_div" <?php if($rowData->status != 3): ?> style="display:none" <?php endif; ?>>
                            <div class="form-group">
                                <label for="basicInput">Reject Remark</label>
                               <textarea name="reject_remark" id="reject_remark" class="form-control"><?php echo e($rowData->reject_remark); ?></textarea>
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
                    </form>
                </div>
            </div>
        </section>
    </div>
    
<!-- end plugin js -->
<script>
    let saveDataURL = "<?php echo e(url('/admin/edit-reviews/'.$row_id)); ?>";
    let returnURL = "<?php echo e(url('/admin/reviews')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/reviews/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/reviews/edit-page.blade.php ENDPATH**/ ?>