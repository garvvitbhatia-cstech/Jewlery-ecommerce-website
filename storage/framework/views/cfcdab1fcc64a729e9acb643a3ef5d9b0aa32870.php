

<?php $__env->startSection('content'); ?>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Doctor</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/doctors')); ?>">Doctor</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Doctor</li>
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
                                            <input type="text" class="form-control" placeholder="Enter Name" value="<?php echo e($rowData->name); ?>" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Email Address</label>
                                            <input type="text" class="form-control" placeholder="Enter Email" value="<?php echo e($rowData->email); ?>" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Mobile</label>
                                            <input type="text" class="form-control" placeholder="Enter Mobile" value="<?php echo e($rowData->mobile); ?>" name="mobile" id="mobile">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Gender</label>
                                            <select class="form-select" name="gender" id="gender">
                                            <option value="Male" <?php echo e($rowData->gender == 'Male' ?'selected':''); ?>>Male</option>
                                            <option value="Female" <?php echo e($rowData->gender == 'Female' ?'selected':''); ?>>Female</option>
                                            <option value="Other" <?php echo e($rowData->gender == 'Other' ?'selected':''); ?>>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Date of Birth</label>
                                            <input type="date" class="form-control" placeholder="Enter DOB" value="<?php echo e($rowData->dob); ?>" name="dob" id="dob">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Profile Image</label>
                                            <input type="file" class="form-control" name="profile_image" id="profile_image" accept="image/*">
                                            <input type="hidden" name="old_profile_image" value="<?php echo $rowData->photo; ?>" />
                                        </div>
                                    </div>
                                    <?php if($rowData->photo != ""): ?>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="basicInput">&nbsp;</label>
                                                <img src="<?php echo e(URL::asset('public/img/users/')); ?>/<?php echo $rowData->photo; ?>"  style="max-width: 80px;height: auto;">
                                            </div>
                                        </div>
                                    <?php endif; ?>
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
                                            <input type="text" class="form-control" placeholder="Enter Emergency Contact Name" value="<?php echo e($rowData->emergency_contact_name); ?>" name="emergency_contact_name" id="emergency_contact_name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Emergency Contact Mobile</label>
                                            <input type="text" class="form-control" maxlength="10" placeholder="Enter Emergency Contact Mobile" value="<?php echo e($rowData->emergency_contact_number); ?>" name="emergency_contact_number" id="emergency_contact_number">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Emergency Contact Relation</label>

                                            <select class="form-select choices" name="emergency_contact_relation_id" id="emergency_contact_relation_id">
                                            <option value="">Select Relation</option>
                                            <?php $__currentLoopData = $relations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($relation->id); ?>" <?php echo e($rowData->emergency_contact_relation_id == $relation->id ?'selected':''); ?>><?php echo e($relation->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Time Slot</h4>
                            </div>
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Start Date</label>
                                            <input type="date" class="form-control" placeholder="" value="<?php echo e($rowData->time_slot_start_date); ?>" name="time_slot_start_date" id="time_slot_start_date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">End Date</label>
                                            <input type="date" class="form-control" placeholder="" value="<?php echo e($rowData->time_slot_start_date); ?>" name="time_slot_end_date" id="time_slot_end_date">
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="replace_working_days">
                                        <div class="form-group">
                                            <label for="basicInput">Working Days</label>
                                            <div class="form-group">
                                                <label class="checkbox-inline" for="mon">
                                                  <input type="checkbox" value="" id="mon"> Monday
                                                </label>
                                                <label class="checkbox-inline" for="tue">
                                                  <input type="checkbox" value="" id="tue"> Tuesday
                                                </label>
                                                <label class="checkbox-inline" for="wed">
                                                  <input type="checkbox" value="" id="wed"> Wednesday
                                                </label>
                                                <label class="checkbox-inline" for="thur">
                                                  <input type="checkbox" value="" id="thur"> Thursday
                                                </label>
                                                <label class="checkbox-inline" for="fri">
                                                  <input type="checkbox" value="" id="fri"> Friday
                                                </label>
                                                <label class="checkbox-inline" for="sat">
                                                  <input type="checkbox" value="" id="sat"> Saturday
                                                </label>
                                                <label class="checkbox-inline" for="sun">
                                                  <input type="checkbox" value="" id="sun"> Sunday
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    	<label for="basicInput">Working Time One</label>
                                        <div class="form-group">                                            
                                            <label for="basicInput">From</label>
                                            <input type="date" class="form-control" placeholder="Enter Emergency Contact Name" value="<?php echo e($rowData->emergency_contact_name); ?>" name="emergency_contact_name" id="emergency_contact_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    	<label for="basicInput">&nbsp;</label>
                                        <div class="form-group">
                                            <label for="basicInput">To</label>
                                            <input type="date" class="form-control" maxlength="10" placeholder="Enter Emergency Contact Mobile" value="<?php echo e($rowData->emergency_contact_number); ?>" name="emergency_contact_number" id="emergency_contact_number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    	<label for="basicInput">Working Time Two</label>
                                        <div class="form-group">                                            
                                            <label for="basicInput">From</label>
                                            <input type="date" class="form-control" placeholder="Enter Emergency Contact Name" value="<?php echo e($rowData->emergency_contact_name); ?>" name="emergency_contact_name" id="emergency_contact_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    	<label for="basicInput">&nbsp;</label>
                                        <div class="form-group">
                                            <label for="basicInput">To</label>
                                            <input type="date" class="form-control" maxlength="10" placeholder="Enter Emergency Contact Mobile" value="<?php echo e($rowData->emergency_contact_number); ?>" name="emergency_contact_number" id="emergency_contact_number">
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
                                            <input type="text" class="form-control" placeholder="Enter Address" name="address" id="address" value="<?php echo e($rowData->address); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">City</label>
                                            <input type="text" class="form-control" placeholder="Enter City" name="city" id="city" value="<?php echo e($rowData->city); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Zipcode</label>
                                            <input type="text" class="form-control" placeholder="Enter Zipcode" name="zipcode" id="zipcode" value="<?php echo e($rowData->zipcode); ?>">
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

                                            <select class="form-select choices" name="license_jurisdiction_id" id="license_jurisdiction_id">
                                            <option value="">Select License Jurisdiction</option>
                                            <?php $__currentLoopData = $licenseJurisdictions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $licenseJurisdiction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($licenseJurisdiction->id); ?>" <?php echo e(isset($rowDetails->license_jurisdiction_id) && $rowDetails->license_jurisdiction_id == $licenseJurisdiction->id ? 'selected' : ''); ?>><?php echo e($licenseJurisdiction->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">License Issue Date</label>
                                            <input type="date" class="form-control" name="license_issue_date" id="license_issue_date" value="<?php echo e(isset($rowDetails->license_issue_date) && $rowDetails->license_issue_date  ? $rowDetails->license_issue_date:''); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">License Expiry Date</label>
                                            <input type="date" class="form-control" name="license_expiry_date" id="license_expiry_date" value="<?php echo e(isset($rowDetails->license_expiry_date) && $rowDetails->license_expiry_date  ? $rowDetails->license_expiry_date:''); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="basicInput">License Verified</label><br />
                                            <input type="checkbox"  style="height:30px;width:30px;" value="YES" name="is_license_verified" id="is_license_verified" <?php echo e(isset($rowDetails->is_license_verified) && $rowDetails->is_license_verified == 1 ? 'checked':''); ?>>
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
                                            <input type="text" class="form-control" name="employment_verification_score" id="employment_verification_score" value="<?php echo e(isset($rowDetails->employment_verification_score) && $rowDetails->employment_verification_score ? $rowDetails->employment_verification_score:''); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Doctor Level</label>
                                            <select class="form-select choices" name="doctor_level_id" id="doctor_level_id">
                                            <option value="">Select Doctor Level</option>
                                            <?php $__currentLoopData = $doctorLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $doctorLevel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($doctorLevel->id); ?>" <?php echo e(isset($rowDetails->doctor_level_id) && $rowDetails->doctor_level_id == $doctorLevel->id ?'selected':''); ?>><?php echo e($doctorLevel->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                    $isVideoFile = "No";
                                    if(isset($rowDetails->profile_video) && $rowDetails->profile_video != "" && file_exists(public_path('img/doctors/'.$rowDetails->profile_video))){
                                        $isVideoFile = "Yes";
                                    }
                                    ?>
                                    <div class="col-md-<?php echo e($isVideoFile == 'Yes' ? '3':'4'); ?>">
                                        <div class="form-group">
                                            <label for="basicInput">Profile Video</label>
                                            <input type="file" class="form-control" name="profile_video" id="profile_video" accept="video/*">
                                            <input type="hidden" name="old_profile_video" value="<?php echo e(isset($rowDetails->profile_video) ? $rowDetails->profile_video:''); ?>" />
                                        </div>
                                    </div>
                                    <?php if($isVideoFile == 'Yes'): ?>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="basicInput"> &nbsp; Old Video</label>
                                                <a href="<?php echo e(URL::asset('public/img/doctors/')); ?>/<?php echo $rowDetails->profile_video; ?>" target="_blank" class="btn btn-sm btn-primary">View Video</a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="basicInput">Premium</label><br />
                                            <input type="checkbox"  style="height:30px;width:30px;" value="YES" name="is_premium" id="is_premium"  <?php echo e(isset($rowDetails->is_premium) && $rowDetails->is_premium == 1 ? 'checked':''); ?>>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="basicInput">Aayush Bharat</label><br />
                                            <input type="checkbox"  style="height:30px;width:30px;" value="YES" name="is_aayush_bharat" id="is_aayush_bharat"  <?php echo e(isset($rowDetails->is_aayush_bharat) && $rowDetails->is_aayush_bharat == 1 ? 'checked':''); ?>>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Overall Score</label><br />
                                            <input type="text" class="form-control"  value="<?php echo e(isset($rowDetails->overall_score) ? $rowDetails->overall_score:''); ?>" name="overall_score" id="overall_score">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Profile URL</label><br />
                                            <input type="text" class="form-control"  value="<?php echo e(isset($rowDetails->profile_url) ? $rowDetails->profile_url:''); ?>" name="profile_url" id="profile_url">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="basicInput">Coach</label><br />
                                            <input type="checkbox" style="height:30px;width:30px;" value="YES" name="is_coach" id="is_coach"  <?php echo e(isset($rowDetails->is_coach) && $rowDetails->is_coach == 1 ? 'checked':''); ?>>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="basicInput">Time Slot</label><br />
                                            <select name="time_slot" id="time_slot" class="form-control">
                                                <option <?php echo e(isset($rowDetails->time_slot) && $rowDetails->time_slot == 15 ? 'selected':''); ?> value="15">15 Minute</option>
                                                <option <?php echo e(isset($rowDetails->time_slot) && $rowDetails->time_slot == 30 ? 'selected':''); ?> value="30">30 Minute</option>
                                                <option <?php echo e(isset($rowDetails->time_slot) && $rowDetails->time_slot == 45 ? 'selected':''); ?> value="45">45 Minute</option>
                                                <option <?php echo e(isset($rowDetails->time_slot) && $rowDetails->time_slot == 60 ? 'selected':''); ?> value="60">60 Minute</option>
                                                <option <?php echo e(isset($rowDetails->time_slot) && $rowDetails->time_slot == 75 ? 'selected':''); ?> value="75">75 Minute</option>
                                                <option <?php echo e(isset($rowDetails->time_slot) && $rowDetails->time_slot == 90 ? 'selected':''); ?> value="90">90 Minute</option>
                                                <option <?php echo e(isset($rowDetails->time_slot) && $rowDetails->time_slot == 105 ? 'selected':''); ?> value="105">105 Minute</option>
                                                <option <?php echo e(isset($rowDetails->time_slot) && $rowDetails->time_slot == 120 ? 'selected':''); ?> value="120">120 Minute</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Reporting Doctor</label>
                                            <select class="form-select choices" name="reporting_doctor_id" id="reporting_doctor_id">
                                            <option value="">Select Reporting Doctor</option>
                                            <?php $__currentLoopData = $reportingDoctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $reportingDoctors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  value="<?php echo e($reportingDoctors->id); ?>" <?php echo e(isset($rowDetails->reporting_doctor_id) && $rowDetails->reporting_doctor_id == $reportingDoctors->id? 'selected':''); ?>><?php echo e($reportingDoctors->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                    $isSignatureImage = 'No';
                                    if(isset($rowDetails->signature_img) && $rowDetails->signature_img != "" && file_exists(public_path('img/doctors/'.$rowDetails->signature_img))){
                                        $isSignatureImage = 'Yes';
                                    }
                                    ?>
                                    <div class="col-md-<?php echo e($isSignatureImage == 'Yes'?'3':'4'); ?>">
                                        <div class="form-group">
                                            <label for="basicInput">Signature Image</label>
                                            <input type="file" class="form-control" name="signature_img" id="signature_img" accept="image/*">
                                            <input type="hidden" name="old_profile_image" value="<?php echo isset($rowDetails->signature_img) ? $rowDetails->signature_img: ''; ?>" />
                                        </div>
                                    </div>
                                    <?php if($isSignatureImage == 'Yes'): ?>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                            <label for="basicInput"> &nbsp; Old Image</label>
                                                <img src="<?php echo e(URL::asset('public/img/doctors/')); ?>/<?php echo $rowDetails->signature_img; ?>"  style="max-width: 80px;height: auto;">
                                            </div>
                                        </div>
                                    <?php endif; ?>
									<div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Qualification</label>
                                            <input type="text" class="form-control" value="<?php echo e(isset($rowDetails->qualification) ? $rowDetails->qualification:''); ?>" name="qualification" id="qualification">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Total Experience</label>
                                                <input type="text" class="form-control" value="<?php echo e(isset($rowDetails->experience) ? $rowDetails->experience:''); ?>" name="experience" id="experience">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Specilities In</label>
                                            <select class="form-control choices" name="speciality_id[]" multiple="multiple" id="speciality_id">
                                                <option value="">Select Specilities</option>                                                
                                                <?php
                                                $specialityArr = array();
                                                if(!empty($rowDetails->speciality_id)){
                                                    $specialityArr = explode(',',$rowDetails->speciality_id);
                                                }
                                                ?>
                                                <?php $__currentLoopData = $specilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $specilities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        
                                                    <option value="<?php echo e($specilities->id); ?>" <?php echo e(in_array($specilities->id, $specialityArr) ?'selected':''); ?>><?php echo e($specilities->title); ?></option>                                                
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="basicInput">Description</label>
                                            <textarea name="description" id="description" class="form-control editorBox" rows="5"><?php echo e(isset($rowDetails->description) ? $rowDetails->description:''); ?></textarea>
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
                </div>
            </div>
        </section>
    </div>
<!-- end plugin js -->
<script>
	$(document).on('change','#time_slot_end_date',function(){
		
	});

    let saveDataURL = "<?php echo e(url('/admin/edit-doctor/'.$row_id)); ?>";
    let returnURL = "<?php echo e(url('/admin/doctors')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/doctors/edit-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/doctors/edit-page.blade.php ENDPATH**/ ?>