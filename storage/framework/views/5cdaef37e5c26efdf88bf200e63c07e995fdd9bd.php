

<?php $__env->startSection('content'); ?>
<form class="form w-100" id="pageForm" action="#">
<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Sub Category</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/sub-categories')); ?>">Sub Categories</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Sub Category</h4>
                </div>
                <div class="card-body">
                <?php
                $explode = explode(',',$rowData->category_id);
                ?>

                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Category</label>
                                <select name="category_id[]" id="category_id" multiple="multiple" class="form-select choices multiple-remove">
                                <option value="">Select Category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if(in_array($category->id,$explode)): ?> selected="selected" <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Title</label>
                                <input type="text" class="form-control" placeholder="Enter Category Title" value="<?php echo e($rowData->title); ?>" name="title" id="title">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput" style="vertical-align: top;">Show All Users</label>
                            <input type="checkbox"  style="height:30px;width:30px; margin-left:20px;" value="YES" name="is_show_all_user" id="is_show_all_user" <?php echo e($rowData->is_show_all_user =='YES'?'checked':''); ?>>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput" style="vertical-align: top;">Show Guest User</label>
                            <input type="checkbox"  style="height:30px;width:30px; margin-left:20px;" value="YES" name="is_show_guest_user" id="is_show_guest_user" <?php echo e($rowData->is_show_guest_user =='YES'?'checked':''); ?>>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput" style="vertical-align: top;">Show Register User</label>
                            <input type="checkbox"  style="height:30px;width:30px; margin-left:20px;" value="YES" name="is_show_register_user" <?php echo e($rowData->is_show_register_user =='YES'?'checked':''); ?> id="is_show_register_user">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="card">
                <div class="card-body">
                <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="basicInput">SEO Title</label>
                                <input type="text" name="seo_title" id="seo_title" class="form-control" value="<?php echo e($rowData->seo_title); ?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="basicInput">SEO Keywords</label>
                                <input type="text" name="seo_keywords" id="seo_keywords" class="form-control" value="<?php echo e($rowData->seo_keywords); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">SEO Description</label>
                                <textarea type="text" name="seo_description" id="seo_description" class="form-control" ><?php echo e($rowData->seo_description); ?></textarea>
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
    </div>
    </form>
<!-- end plugin js -->
<script>
    let saveDataURL = "<?php echo e(url('/admin/edit-sub-category/'.$row_id)); ?>";
    let returnURL = "<?php echo e(url('/admin/sub-categories')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/sub_categories/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/sub_categories/edit-page.blade.php ENDPATH**/ ?>