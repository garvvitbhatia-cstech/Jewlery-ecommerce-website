

<?php $__env->startSection('content'); ?>
<form class="form w-100" id="pageForm" action="#">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Edit Blog</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/blogs')); ?>">Blogs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="row">
        <div class="col-9 col-md-9">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation"> <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General Info</a> </li>
              </ul>
              <hr />
              <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">
                  
                  <div class="col-md-12">
                  	<input type="hidden" name="old_file" value="<?php echo e($rowData->banner); ?>"/>
                    
                            <div class="form-group">
                                <label for="basicInput">Heading</label>
                                <input type="text" class="form-control" value="<?php echo e($rowData->heading); ?>" name="heading" id="heading">
                            </div>
                        </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="basicInput">Description</label>
                            <textarea class="form-control editorBox" name="description" id="description"><?php echo e($rowData->description); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Banner</label>
                            <input type="file" class="form-control" value="<?php echo e($rowData->banner); ?>" name="banner" id="banner">
                        </div>
                    </div>
                    <?php if($rowData->banner != ""): ?>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="basicInput">&nbsp;</label>
                                <img src="<?php echo e(URL::asset('public/img/blogs/')); ?>/<?php echo $rowData->banner; ?>" width="100">
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="col-md-12">
                    <button type="button" id="form_submit" class="btn btn-sm btn-primary fw-bolder me-3 my-2">
                        <span class="indicator-label" id="formSubmit">Submit</span>
                        <span class="indicator-progress d-none">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                    </div>
                        
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </section>
  </div>
</form>

<script>
    let saveDataURL = "<?php echo e(url('/admin/edit-blog/'.$row_id)); ?>";
    let returnURL = "<?php echo e(url('/admin/blogs')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/blogs/add-page.js')); ?>"></script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/blogs/edit-page.blade.php ENDPATH**/ ?>