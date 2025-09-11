
<?php $__env->startSection('content'); ?>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Header Navigation</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/header-navigations')); ?>">Header Navigations</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Header Navigation</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Header Navigation</h4>
                </div>
                <div class="card-body">
                <form class="form w-100" id="pageForm" action="#">
                	<div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="basicInput">Title</label>
                                <select name="parent_id" id="parent_id" confirmation="false" class="form-control">
                                 <?php
                                    echo Helper::getNavigationCategory($headerNavigationList,$rowData->parent_id,$rowData->id);
                                 ?>
                                 </select>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="basicInput">Target Window</label>
                                <select id="target_window" name="target_window" confirmation="false" class="form-control">
                                    <option <?php echo e($rowData->target_window == 'Self' ? "selected" : ""); ?> value="Self">Self</option>
                                    <option <?php echo e($rowData->target_window == 'blank' ? "selected" : ""); ?> value="blank">Blank</option>
                                 </select>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="basicInput">Page Type</label>
                                <select id="type" name="type" confirmation="false" class="form-control">
                                    <option <?php echo e($rowData->menu_type == 'cms' ? "selected" : ""); ?> value="cms">CMS</option>
                                    <option <?php echo e($rowData->menu_type == 'custom' ? "selected" : ""); ?> value="custom">Custom</option>
                                 </select>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="basicInput">CMS Pages</label>
                                <select id="menu_page_id" name="menu_page_id" confirmation="false" class="form-control">
                                   <option value="">Select Cms Page</option>
                                   <?php if(isset($cmsPageList) && !empty($cmsPageList)): ?>                         	
                                   <?php $__currentLoopData = $cmsPageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cmsKey => $cmsVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    	<option <?php echo e($rowData->menu_page_id == $cmsKey ? "selected" : ""); ?> value="<?php echo e($cmsKey); ?>"> <?php echo e($cmsVal); ?> </option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div id="customPageDiv" style="<?php echo e($rowData->menu_type == 'custom' ? "display:block;" : "display:none;"); ?>" >
                        	<div class="col-md-7">
                                <div class="form-group">
                                    <label for="basicInput">Title</label>
                                    <input type="text" id="title" name="title" value="<?php echo e($rowData->title); ?>" confirmation="false" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="basicInput">Custom URL</label>
                                    <input type="text" id="url" name="url" value="<?php echo e($rowData->url); ?>" confirmation="false" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">SEO Title</label>
                                    <input type="text" id="seo_title" name="seo_title" value="<?php echo e($rowData->seo_title); ?>" confirmation="false" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="basicInput">SEO Description</label>
                                    <textarea id="seo_description" name="seo_description" rows="8" confirmation="false" class="form-control"><?php echo $rowData->seo_description; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="basicInput">SEO Keywords</label>
                                    <textarea id="seo_keyword" name="seo_keyword" rows="8" confirmation="false" class="form-control"><?php echo e($rowData->seo_keyword); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="basicInput">Robots</label>
                                    <select id="robot_tags" name="robot_tags" confirmation="false" class="form-control">
                                      	<option <?php echo e($rowData->robot_tags == 'index,follow' ? 'selected' : ''); ?> value="index,follow">index,follow</option>
                                        <option <?php echo e($rowData->robot_tags == 'index,nofollow' ? 'selected' : ''); ?> value="index,nofollow">index,nofollow</option>
                                        <option <?php echo e($rowData->robot_tags == 'noindex,follow' ? 'selected' : ''); ?> value="noindex,follow">noindex,follow</option>
                                        <option <?php echo e($rowData->robot_tags == 'noindex,nofollow' ? 'selected' : ''); ?> value="noindex,nofollow">noindex,nofollow</option>
                                    </select>
                                </div>
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
    let saveDataURL = "<?php echo e(url('/admin/edit-header-navigation/'.$row_id)); ?>";
    let returnURL = "<?php echo e(url('/admin/header-navigations')); ?>";
	
	$('#type').on('change', function (){
	   if(this.value == 'custom'){
		  $('#customPageDiv').css('display', 'block');
		  $('#cmsPageDiv').css('display', 'none');
	   }else{
		  $('#customPageDiv').css('display', 'none');
		  $('#cmsPageDiv').css('display', 'block');
	   }
	});
</script>
<script src="<?php echo e(asset('public/admin/js/pages/header-navigation/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/header_navigations/edit-page.blade.php ENDPATH**/ ?>