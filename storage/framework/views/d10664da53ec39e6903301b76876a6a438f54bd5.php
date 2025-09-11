<?php $__env->startSection('content'); ?>

<div class="page-heading">
   <div class="page-title">
      <div class="row">
         <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Add New FAQ</h3>
         </div>
         <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/faqs')); ?>">FAQs</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add FAQ</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <section class="section">
      <div class="row">
         <div class="col-12 col-md-9">
            <div class="card">
               <div class="card-header">
                  <h4 class="card-title">Add FAQ</h4>
               </div>
               <div class="card-body">
                  <form class="form w-100" id="pageForm" action="#">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="basicInput">Question</label>
                              <input type="text" class="form-control" name="question" id="question" value="" placeholder="Question">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="basicInput">Answer</label>
                              <textarea class="form-control editorBox" name="answer" id="answer"></textarea>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                              <label for="basicInput">Status</label><br>
                              <input class="form-check-input" type="checkbox" value="1" id="status" name="status">
                              <label class="form-check-label" for="status">
                                    Active
                              </label>
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
         </div>
      </div>
   </section>
</div>
<script></script>
<!-- end plugin js -->

<script>
   	$('.numberonly').keypress(function(e){
		var charCode = (e.which) ? e.which : event.keyCode
		if(String.fromCharCode(charCode).match(/[^0-9+]/g)) 
		return false;
   	});
   	let saveDataURL = "<?php echo e(url('/admin/add-faq')); ?>";
   	let returnURL = "<?php echo e(url('/admin/faqs')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/faqs/add-page.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views//admin/faqs/add-page.blade.php ENDPATH**/ ?>