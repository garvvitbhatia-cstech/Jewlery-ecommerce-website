

<?php $__env->startSection('content'); ?>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add New Symptom</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/symptoms')); ?>">Symptoms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Symptom</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Symptom</h4>
                </div>
                <div class="card-body">
                <form class="form w-100" id="pageForm" action="#">
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Title</label>
                                <input type="text" class="form-control" placeholder="Enter Brand Title" value="" name="title" id="title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Ailment</label>
                                <select name="ailment_id[]" id="ailment_id" multiple="multiple" class="form-select choices multiple-remove">
                                <option value="">Select Ailment</option>
                                <?php $__currentLoopData = $ailments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ailment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($ailment->id); ?>"><?php echo e($ailment->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Specialty</label>
                                <select name="speciality_id[]" id="speciality_id" multiple="multiple" class="form-select choices multiple-remove">
                                <option value="">Select Specialty</option>
                                <?php $__currentLoopData = $specialties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $specialty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($specialty->id); ?>"><?php echo e($specialty->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">symptoms</label>
                                <select name="symptom_id[]" id="symptom_id" multiple="multiple" class="form-select choices multiple-remove">
                                <option value="">Select Symptom</option>
                                <?php $__currentLoopData = $symptoms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $symptom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($symptom->id); ?>"><?php echo e($symptom->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6" id="question_div">
                        	<label for="basicInput">Questions</label>
                            
                            <div class="form-group">
                                <input type="text" class="form-control" name="question[]">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="basicInput"></label><br />
                            <a onclick="addMoreQuestion();" class="btn btn-sm btn-success">Add More</a>
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
    <script>
	var counter = 1;
    function addMoreQuestion(){
		$('#question_div').append('<div id="row_'+counter+'" class="form-group"><input type="text" style="float:left;width:86%;" class="form-control" name="question[]"><a style="float:right" onclick="removeRow('+counter+');" class="btn btn-sm btn-danger">Delete</a><div style="clear:both"></div></div>');
		counter++;
	}
	function removeRow(count){
		$('#row_'+count).remove();
	}
    </script>
<!-- end plugin js -->
<script>
    let saveDataURL = "<?php echo e(url('/admin/add-symptom')); ?>";
    let returnURL = "<?php echo e(url('/admin/symptoms')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/symptoms/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/symptoms/add-page.blade.php ENDPATH**/ ?>