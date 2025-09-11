

<?php $__env->startSection('content'); ?>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Doctor Hospital</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/doctor-hospitals')); ?>">Doctor Hospitals</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Doctor Hospital</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Doctor Hospital</h4>
                </div>
                <div class="card-body">
                <form class="form w-100" id="pageForm" action="#">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Doctor</label>
                                <select name="doctor_id" id="doctor_id" class="choices form-select">
                                <option value="">Select Doctor</option>
                                <?php $__currentLoopData = $Doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($doctor->id); ?>" <?php if($rowData->doctor_id == $doctor->id): ?> selected="selected" <?php endif; ?>><?php echo e($doctor->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Hospitals</label>
                                <select name="hospital_id" id="hospital_id" class="choices form-select" onchange="getHospitalDepartments();">
                                <option value="">Select Hospital</option>
                                    <?php $__currentLoopData = $Hospitals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $Hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($Hospital->id); ?>" <?php if($rowData->hospital_id == $Hospital->id): ?> selected="selected" <?php endif; ?>><?php echo e($Hospital->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Hospital Department</label>
                                <select name="hospital_department_id" id="hospital_department_id" class="form-select">
                                    <option value="">Select Hospital Department</option>
                                    <?php $__currentLoopData = $HospitalDepartments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $HospitalDepartment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($HospitalDepartment->id); ?>" <?php if($rowData->hospital_department_id == $HospitalDepartment->id): ?> selected="selected" <?php endif; ?>><?php echo e($HospitalDepartment->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Full Time</label>
                                <select name="is_full_time" id="is_full_time" class="form-select">
                                <option value="1" <?php if($rowData->is_full_time == "1"): ?> selected="selected" <?php endif; ?>>Yes</option>
                                <option value="2" <?php if($rowData->is_full_time == "2"): ?> selected="selected" <?php endif; ?>>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Visit Time</label>
                                <input type="time" class="form-control" value="<?php echo e($rowData->std_visit_time); ?>" name="std_visit_time" id="std_visit_time">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Walkin Fees</label>
                                <input type="number" class="form-control" value="<?php echo e($rowData->std_walkin_fees); ?>" name="std_walkin_fees" id="std_walkin_fees" pattern="\d*" onKeyPress="if(this.value.length==6) return false;">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Chat Fees</label>
                                <input type="number" class="form-control" value="<?php echo e($rowData->std_chat_fees); ?>" name="std_chat_fees" id="std_chat_fees" pattern="\d*" onKeyPress="if(this.value.length==6) return false;">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Audio Fees</label>
                                <input type="number" class="form-control" value="<?php echo e($rowData->std_audio_fees); ?>" name="std_audio_fees" id="std_audio_fees" pattern="\d*" onKeyPress="if(this.value.length==6) return false;">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Video Fees</label>
                                <input type="number" class="form-control" value="<?php echo e($rowData->std_video_fees); ?>" name="std_video_fees" id="std_video_fees" pattern="\d*" onKeyPress="if(this.value.length==6) return false;">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Coach Fees</label>
                                <input type="number" class="form-control" value="<?php echo e($rowData->std_coach_fees); ?>" name="std_coach_fees" id="std_coach_fees" pattern="\d*" onKeyPress="if(this.value.length==6) return false;">
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
    let saveDataURL = "<?php echo e(url('/admin/edit-doctor-hospital/'.$row_id)); ?>";
    let returnURL = "<?php echo e(url('/admin/doctor-hospitals')); ?>";
    let getHospitalDepartmentURL = "<?php echo e(url('/admin/get-hospital-departments')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/doctor_hospitals/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/doctor_hospitals/edit-page.blade.php ENDPATH**/ ?>