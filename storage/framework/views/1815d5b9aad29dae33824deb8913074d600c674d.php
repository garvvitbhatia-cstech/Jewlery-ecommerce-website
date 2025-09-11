<?php $__env->startSection('content'); ?>

<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Edit Testimonial</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/testimonials')); ?>">Testimonials</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Testimonial</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <section class="section">
    <form class="form w-100" id="pageForm" action="#">
      <div class="row">
        <div class="col-9 col-md-9">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation"> <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                                    role="tab" aria-controls="home" aria-selected="true">General Info</a> </li>               
              </ul>
              <hr />
              <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">
                  <div class="col-md-5">
                      <div class="form-group">
                        <label for="basicInput">Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" value="<?php echo $rowData->title; ?>" name="title" id="title">
                      </div>
                    </div> 
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Image</label>
                        <input type="file" class="form-control" placeholder="Enter Title" value="" name="image" id="image">
                      </div>
                    </div>    
                    <?php if($rowData->image != ""): ?>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="basicInput">&nbsp;</label>
                        <img src="<?php echo e(URL::asset('public/admin/images/testimonials/')); ?>/<?php echo $rowData->image; ?>" style="max-width: 80px;height: auto;"> 
                      </div>
                    </div>
                    <?php endif; ?> 
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Description</label>
                        <textarea class="form-control editorBox" name="description" rows="6" placeholder="Description" id="description"><?php echo $rowData->description; ?></textarea>
                      </div>
                    </div>         
                  </div>                
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3 col-md-3 ">
          <div class="card">
            <div class="col-md-12">
              <div class="text-left  p-3 p-l-20"> 
                <!--begin::Submit button-->
                <button type="button" id="form_submit" class="btn btn-sm btn-primary fw-bolder me-3 my-2"> <span class="indicator-label" id="formSubmit">Submit</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>
                <!--end::Submit button--> 
              </div>
            </div>
          </div>
        </div>
      </div> 
    </form>
  </section>
</div>
<!-- end plugin js -->
<script>
    $(document).ready(function(){ 
		$('.numberonly').keypress(function(e){
			var charCode = (e.which) ? e.which : event.keyCode
			if(String.fromCharCode(charCode).match(/[^0-9+]/g))
				return false;
		});
    });
    let saveDataURL = "<?php echo e(url('/admin/edit-brand/'.$row_id)); ?>";
    let returnURL = "<?php echo e(url('/admin/brands')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/brands/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views//admin/brands/edit-page.blade.php ENDPATH**/ ?>