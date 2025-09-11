

<?php $__env->startSection('content'); ?>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add New Doctor</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/doctors')); ?>">Doctors</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Doctor</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
        <form class="form w-100" id="pageForm" action="#">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">General Info</h4>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name" value="" name="name" id="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Email Address</label>
                                <input type="text" class="form-control" placeholder="Enter Email" value="" name="email" id="email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Mobile</label>
                                <input type="text" class="form-control" placeholder="Enter Mobile" value="" name="mobile" id="mobile">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Gender</label>
                                <select class="form-select" value="" name="gender" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Date of Birth</label>
                                <input type="date" class="form-control" placeholder="Enter DOB" value="" name="dob" id="dob">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Password</label>
                                <input type="password" class="form-control" value="" name="password" id="password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Confirm Password</label>
                                <input type="password" class="form-control" value="" name="confirm_password" id="confirm_password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Profile Image</label>
                                <input type="file" class="form-control" name="profile_image" id="profile_image" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Emergency Contact Info</h4>
                </div>
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Emergency Contact Name</label>
                                <input type="text" class="form-control" placeholder="Enter Emergency Contact Name" name="emergency_contact_name" id="emergency_contact_name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Emergency Contact Mobile</label>
                                <input type="text" class="form-control" maxlength="10" placeholder="Enter Emergency Contact Mobile" name="emergency_contact_number" id="emergency_contact_number">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Emergency Contact Relation</label>

                                <select class="form-select choices" value="" name="emergency_contact_relation_id" id="emergency_contact_relation_id">
                                <option value="">Select Relation</option>
                                <?php $__currentLoopData = $relations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option  value="<?php echo e($relation->id); ?>"><?php echo e($relation->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Address Info</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Address</label>
                                <input type="text" class="form-control" placeholder="Enter Address" name="address" id="address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">City</label>
                                <input type="text" class="form-control" placeholder="Enter City" name="city" id="city">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Zipcode</label>
                                <input type="text" class="form-control" placeholder="Enter Zipcode" name="zipcode" id="zipcode">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">License Info</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">License Jurisdiction</label>

                                <select class="form-select choices" value="" name="license_jurisdiction_id" id="license_jurisdiction_id">
                                <option value="">Select License Jurisdiction</option>
                                <?php $__currentLoopData = $licenseJurisdictions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $licenseJurisdiction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option  value="<?php echo e($licenseJurisdiction->id); ?>"><?php echo e($licenseJurisdiction->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">License Issue Date</label>
                                <input type="date" class="form-control" name="license_issue_date" id="license_issue_date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">License Expiry Date</label>
                                <input type="date" class="form-control" name="license_expiry_date" id="license_expiry_date">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">License Verified</label><br />
                                <input type="checkbox"  style="height:30px;width:30px;" value="YES" value="" name="is_license_verified" id="is_license_verified">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Other Info</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Employment Verification Score</label>
                                <input type="text" class="form-control" name="employment_verification_score" id="employment_verification_score">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Doctor Level</label>
                                <select class="form-select choices" value="" name="doctor_level_id" id="doctor_level_id">
                                <option value="">Select Doctor Level</option>
                                <?php $__currentLoopData = $doctorLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $doctorLevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option  value="<?php echo e($doctorLevel->id); ?>"><?php echo e($doctorLevel->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Profile Video</label>
                                <input type="file" class="form-control" name="profile_video" id="profile_video" accept="video/*">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Premium</label><br />
                                <input type="checkbox"  style="height:30px;width:30px;" value="YES" value="" name="is_premium" id="is_premium">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Aayush Bharat</label><br />
                                <input type="checkbox"  style="height:30px;width:30px;" value="YES" value="" name="is_aayush_bharat" id="is_aayush_bharat">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Overall Score</label><br />
                                <input type="text"  value="" class="form-control"  value="" name="overall_score" id="overall_score">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Profile URL</label><br />
                                <input type="text"  value="" class="form-control"  value="" name="profile_url" id="profile_url">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Coach</label><br />
                                <input type="checkbox"  style="height:30px;width:30px;" value="YES" value="" name="is_coach" id="is_coach">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">Time Slot</label><br />
                                <select name="time_slot" id="time_slot" class="form-control">
                                	<option value="15">15 Minute</option>
                                    <option value="30">30 Minute</option>
                                    <option value="45">45 Minute</option>
                                    <option value="60">60 Minute</option>
                                    <option value="75">75 Minute</option>
                                    <option value="90">90 Minute</option>
                                    <option value="105">105 Minute</option>
                                    <option value="120">120 Minute</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Reporting Doctor</label>
                                <select class="form-select choices" value="" name="reporting_doctor_id" id="reporting_doctor_id">
                                <option value="">Select Reporting Doctor</option>
                                <?php $__currentLoopData = $reportingDoctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $reportingDoctors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option  value="<?php echo e($reportingDoctors->id); ?>"><?php echo e($reportingDoctors->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Signature Image</label>
                                <input type="file" class="form-control" name="signature_img" id="signature_img" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Qualification</label>
                                <input type="text" class="form-control" name="qualification" id="qualification">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Total Experience</label>
                               	<input type="text" class="form-control" value="<?php echo e(isset($rowDetails->experience) ? $rowDetails->experience:''); ?>" name="experience" id="experience">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="basicInput">Specilities In</label>
                                <select class="form-control choices" name="speciality_id[]" multiple="multiple" id="speciality_id">
                                 	<option value="">Select Specilities</option>
                                    <?php $__currentLoopData = $specilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $specilities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    	<option  value="<?php echo e($specilities->id); ?>"><?php echo e($specilities->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Description</label>
                                <textarea name="description" id="description" class="form-control editorBox" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
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
         </form>
        </section>
    </div>
<!-- end plugin js -->
<script>
    let saveDataURL = "<?php echo e(url('/admin/add-doctor')); ?>";
    let returnURL = "<?php echo e(url('/admin/doctors')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/doctors/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/doctors/add-page.blade.php ENDPATH**/ ?>