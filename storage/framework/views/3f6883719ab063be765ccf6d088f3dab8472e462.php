

<?php $__env->startSection('content'); ?>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add Cms Page</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/inner-pages')); ?>">Cms Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Cms Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Cms Page</h4>
                </div>
                <div class="card-body">
                <form class="form w-100" id="pageForm" action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Title</label>
                                <input type="text" class="form-control" placeholder="Enter Title" name="title" id="title">
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">SEO Title</label>
                                <input type="text" class="form-control" placeholder="Enter SEO Title"name="seo_title" id="seo_title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">SEO Description</label>
                                <textarea class="form-control" rows="6" name="seo_description" id="seo_description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">SEO Robots</label>
                                <select class="form-control" name="robot_tags" id="robot_tags">
                                	<option value="index,follow">index,follow</option>
                                    <option value="index,nofollow">index,nofollow</option>
                                    <option value="noindex,follow">noindex,follow</option>
                                    <option value="noindex,nofollow">noindex,nofollow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Description</label>
                                <textarea class="form-control editorBox" name="description" id="description"></textarea>
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
    let saveDataURL = "<?php echo e(url('/admin/add-cms-page')); ?>";
    let returnURL = "<?php echo e(url('/admin/cms-pages')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/cms_pages/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/cms_pages/add-page.blade.php ENDPATH**/ ?>