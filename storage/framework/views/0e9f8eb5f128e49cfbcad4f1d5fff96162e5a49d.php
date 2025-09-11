

<?php $__env->startSection('content'); ?>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Inner Page</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/inner-pages')); ?>">Inner Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Inner Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Inner Page</h4>
                </div>
                <div class="card-body">
                <form class="form w-100" id="pageForm" action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Title</label>
                                <input type="text" class="form-control" placeholder="Enter Title" value="<?php echo e($rowData->title); ?>" name="title" id="title">
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Heading</label>
                                <input type="text" class="form-control" placeholder="Enter Heading" value="<?php echo e($rowData->heading); ?>" name="heading" id="heading">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Sub Heading</label>
                                <input type="text" class="form-control" placeholder="Enter Sub Heading" value="<?php echo e($rowData->sub_heading); ?>" name="sub_heading" id="sub_heading">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Banner Icon</label>
                                <input type="file" class="form-control" value="" name="banner" id="banner">
                                <input type="hidden" name="old_file" value="<?php echo $rowData->banner; ?>" />
                            </div>
                        </div>                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Banner Status</label><br />                                
                                <input type="checkbox"  style="height:30px;width:30px;" value="YES" <?php if($rowData->banner_status == 1): ?> checked='checked' <?php endif; ?> ="" name="banner_status" id="banner_status">                                
                                <?php if($rowData->banner != ""): ?>
                                	<div style="float:right">
                                	<label for="basicInput">&nbsp;</label>
                                	<img src="<?php echo e(URL::asset('public/img/banners/')); ?>/<?php echo $rowData->banner; ?>" width="100">
                                    </div>
                        		<?php endif; ?>
                            </div>                             	
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">SEO Title</label>
                                <input type="text" class="form-control" placeholder="Enter SEO Title" value="<?php echo e($rowData->seo_title); ?>" name="seo_title" id="seo_title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">SEO Description</label>
                                <textarea class="form-control" rows="6" name="seo_description" id="seo_description"><?php echo e($rowData->seo_description); ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">SEO Robots</label>
                                <select class="form-control" value="<?php echo e($rowData->robot_tags); ?>" name="robot_tags" id="robot_tags">
                                	<option <?php echo e($rowData->robot_tags == 'index,follow' ? 'selected' : ''); ?> value="index,follow">index,follow</option>
                                    <option <?php echo e($rowData->robot_tags == 'index,nofollow' ? 'selected' : ''); ?> value="index,nofollow">index,nofollow</option>
                                    <option <?php echo e($rowData->robot_tags == 'noindex,follow' ? 'selected' : ''); ?> value="noindex,follow">noindex,follow</option>
                                    <option <?php echo e($rowData->robot_tags == 'noindex,nofollow' ? 'selected' : ''); ?> value="noindex,nofollow">noindex,nofollow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Description</label>
                                <textarea class="form-control editorBox" name="description" id="description"><?php echo e($rowData->description); ?></textarea>
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
    let saveDataURL = "<?php echo e(url('/admin/edit-inner-page/'.$row_id)); ?>";
    let returnURL = "<?php echo e(url('/admin/inner-pages')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/inner_pages/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/inner_pages/edit-page.blade.php ENDPATH**/ ?>