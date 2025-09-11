

<?php $__env->startSection('content'); ?>
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Add Prescription</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/prescription-orders')); ?>">Prescription Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Prescription</li>
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
                <li class="nav-item" role="presentation"> <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General Info</a> </li>
              </ul>
              <hr />
              <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">
                    
                    <div class="col-md-4">
                      <div class="form-group">
                      	<input type="hidden" name="temp_add"/>
                        <label for="basicInput">Prescription Image</label>
                        <input type="file" class="form-control" name="prescription_image" id="prescription_image" accept="image/*">
                      </div>
                    </div>                    
                    <div class="text-left  p-3 p-l-20"> 
                    	<!--begin::Submit button-->
                        <button type="button" id="form_submit" class="btn btn-sm btn-primary fw-bolder me-3 my-2"> <span class="indicator-label" id="formSubmit">Submit</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>
                        <!--end::Submit button--> 
                    </div>                
                  </div>
                </div>
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
    let saveDataURL = "<?php echo e(url('/admin/add-prescription-order')); ?>";
    let returnURL = "<?php echo e(url('/admin/prescription-orders')); ?>";
</script> 
<script src="<?php echo e(asset('public/admin/js/pages/prescription_orders/add-page.js')); ?>"></script> 
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/prescription_orders/add-order.blade.php ENDPATH**/ ?>