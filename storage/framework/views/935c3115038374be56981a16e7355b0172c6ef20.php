

<?php $__env->startSection('content'); ?>
<form class="form w-100" id="pageForm" action="#">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Edit Vendor</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/vendors')); ?>">Vendors</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Vendor</li>
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
                <li class="nav-item" role="presentation"> <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">Info</a> </li>
                <li class="nav-item" role="presentation"> <a class="nav-link" id="seo-tab" data-bs-toggle="tab" href="#seo"
                                        role="tab" aria-controls="seo" aria-selected="false">SEO</a> </li>
                <li class="nav-item" role="presentation"> <a class="nav-link" id="description-tab" data-bs-toggle="tab" href="#description"
                                        role="tab" aria-controls="description" aria-selected="false">Description</a> </li>
                <li class="nav-item" role="presentation"> <a class="nav-link" id="logo-tab" data-bs-toggle="tab" href="#logo"
                                        role="tab" aria-controls="logo" aria-selected="false">Logo</a> </li>
                <li class="nav-item" role="presentation"> <a class="nav-link" id="plan-tab" data-bs-toggle="tab" href="#plan"
                                        role="tab" aria-controls="plan" aria-selected="false">Plan/Shipping Method</a> </li>
                <li class="nav-item" role="presentation"> <a class="nav-link" id="commission-tab" data-bs-toggle="tab" href="#commission"
                                        role="tab" aria-controls="commission" aria-selected="false">Commission</a> </li>
                <li class="nav-item" role="presentation"> <a class="nav-link" id="documents-tab" data-bs-toggle="tab" href="#documents"
                                        role="tab" aria-controls="documents" aria-selected="false">Documents</a> </li>
                <li class="nav-item" role="presentation"> <a class="nav-link" id="bank-tab" data-bs-toggle="tab" href="#bank"
                                        role="tab" aria-controls="bank" aria-selected="false">Bank Details</a> </li>
              </ul>
              <hr />
              <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Company Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" value="<?php echo e($rowData->name); ?>" name="name" id="name">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Email Address</label>
                        <input type="text" class="form-control" placeholder="Enter Email" value="<?php echo e($rowData->email); ?>" name="email" id="email">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Mobile</label>
                        <input type="text" class="form-control" maxlength="10" placeholder="Enter Mobile" value="<?php echo e($rowData->mobile); ?>" name="mobile" id="mobile">
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
                        <label for="basicInput">Language</label>
                        <select class="form-select" value="" name="language_id" id="language_id">
                          <option value="">Select Language</option>
                          
                          
                         <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                          
                          <option <?php if($detailsData->language_id == $language->id): ?> selected="selected" <?php endif; ?> value="<?php echo e($language->id); ?>"><?php echo e($language->title); ?></option>
                          
                          
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                        
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Create administrator account</label>
                        <select class="form-select" value="" name="is_admin_account" id="is_admin_account">
                          <option <?php if($detailsData->is_admin_account == 'NO'): ?> selected="selected" <?php endif; ?> value="NO">NO</option>
                          <option <?php if($detailsData->is_admin_account == 'YES'): ?> selected="selected" <?php endif; ?> value="YES">YES</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Hide Vendor From the Application</label>
                        <select class="form-select" value="" name="hide_vendor" id="hide_vendor">
                          <option <?php if($detailsData->hide_vendor == 'YES'): ?> selected="selected" <?php endif; ?> value="YES">YES</option>
                          <option <?php if($detailsData->hide_vendor == 'NO'): ?> selected="selected" <?php endif; ?> value="NO">NO</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Company Type</label>
                        <select class="form-select" value="" name="company_type_id" id="company_type_id">
                          <option value="">Select Company Type</option>
                          
                          
                                    <?php $__currentLoopData = $companyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $companyType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                          
                          <option <?php if($detailsData->company_type_id == $companyType->id): ?> selected="selected" <?php endif; ?> value="<?php echo e($companyType->id); ?>"><?php echo e($companyType->title); ?></option>
                          
                          
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                        
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Company Registration No - GST</label>
                        <input type="text" class="form-control" placeholder="Enter Company Registration No - GST" value="<?php echo e($detailsData->gst_no); ?>" name="gst_no" id="gst_no">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">License Type</label>
                            <select class="form-select" value="" name="license_type_id" id="license_type_id">
                            <option value="">Select License Type</option>
                            
                            
                            <?php $__currentLoopData = $licenceTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $licenceType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            
                            <option <?php if($detailsData->license_type_id == $licenceType->id): ?> selected="selected" <?php endif; ?> value="<?php echo e($licenceType->id); ?>"><?php echo e($licenceType->title); ?></option>
                            
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            
                            </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">License Number</label>
                        <input type="text" class="form-control" placeholder="Enter License Number" value="<?php echo e($detailsData->license_no); ?>" name="license_no" id="license_no">
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="basicInput">Regd Office Address</label>
                        <input type="text" class="form-control" placeholder="Enter Address" value="<?php echo e($rowData->address); ?>" name="address" id="address">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">City</label>
                        <input type="text" class="form-control" placeholder="Enter City" value="<?php echo e($rowData->city); ?>" name="city" id="city">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Zip/postal code</label>
                        <input type="text" class="form-control" placeholder="Enter Zipcode" value="<?php echo e($rowData->zipcode); ?>" name="zipcode" id="zipcode">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">State/Province</label>
                        <input type="text" class="form-control" placeholder="Enter State/Province" value="<?php echo e($rowData->state); ?>" name="state" id="state">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Country</label>
                        <input type="text" class="form-control" placeholder="Enter Country" value="<?php echo e($rowData->country); ?>" name="country" id="country">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">SEO Title</label>
                        <input type="text" class="form-control" value="<?php echo e($detailsData->seo_title); ?>" name="seo_title" id="seo_title">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">SEO Description</label>
                        <textarea class="form-control" name="seo_description" id="seo_description"><?php echo e($detailsData->seo_description); ?></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">SEO Keywords</label>
                        <textarea class="form-control" name="seo_keywords" id="seo_keywords"><?php echo e($detailsData->seo_keywords); ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Description</label>
                        <textarea class="form-control editorBox" name="description" id="description"><?php echo e($detailsData->description); ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="plan" role="tabpanel" aria-labelledby="permissions-tab">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Plan</label>
                        <select class="form-select" value="" name="plan_id" id="plan_id">
                          <option value="">Select Plan</option>
                          <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option <?php if($detailsData->plan_id == $plan->id): ?> selected="selected" <?php endif; ?> value="<?php echo e($plan->id); ?>"><?php echo e($plan->title); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="basicInput">Shipping Method</label>
                        <select class="form-select" value="" name="shipping_method_id" id="shipping_method_id">
                          <option value="">Select Shipping Method</option>
                          <?php $__currentLoopData = $shippingMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shippingMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option <?php if($rowData->shipping_method_id == $shippingMethod->id): ?> selected="selected" <?php endif; ?> value="<?php echo e($shippingMethod->id); ?>"><?php echo e($shippingMethod->title); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="commission" role="tabpanel" aria-labelledby="commission-tab">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Commission(%)</label>
                        <input type="text" class="form-control" value="<?php echo e($detailsData->commission); ?>" name="commission" id="commission">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Logo for the customer area</label>
                        <input type="file" class="form-control" value="" name="c_logo" id="c_logo">
                        <input type="hidden" name="old_c_logo" value="<?php echo $detailsData->c_logo; ?>" />
                    </div>
                </div>
                <?php if($detailsData->c_logo != ""): ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput">&nbsp;</label>
                            <img src="<?php echo e(URL::asset('public/img/vendors/')); ?>/<?php echo $detailsData->c_logo; ?>" width="100">
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Logo for invoices</label>
                        <input type="file" class="form-control" value="" name="i_logo" id="i_logo">
                        <input type="hidden" name="old_i_logo" value="<?php echo $detailsData->i_logo; ?>" />
                    </div>
                </div>
                <?php if($detailsData->i_logo != ""): ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput">&nbsp;</label>
                            <img src="<?php echo e(URL::asset('public/img/vendors/')); ?>/<?php echo $detailsData->i_logo; ?>" width="100">
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Text Banner Area Logo</label>
                        <input type="file" class="form-control" value="" name="t_logo" id="t_logo">
                        <input type="hidden" name="old_t_logo" value="<?php echo $detailsData->t_logo; ?>" />
                    </div>
                </div>
                <?php if($detailsData->t_logo != ""): ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput">&nbsp;</label>
                            <img src="<?php echo e(URL::asset('public/img/vendors/')); ?>/<?php echo $detailsData->t_logo; ?>" width="100">
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                </div>
                <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Firm / Company Registration Document - GST</label>
                        <input type="file" class="form-control" value="" name="gst_doc" id="gst_doc">
                        <input type="hidden" name="old_gst_doc" value="<?php echo $detailsData->gst_doc; ?>" />
                    </div>
                </div>
                <?php if($detailsData->gst_doc != ""): ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput">&nbsp;</label>
                            <a href="<?php echo e(URL::asset('public/img/vendors/')); ?>/<?php echo $detailsData->gst_doc; ?>" target="_blank">Download Now</a>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Firm / Company Pan Card</label>
                        <input type="file" class="form-control" value="" name="company_pan_card" id="company_pan_card">
                        <input type="hidden" name="old_company_pan_card" value="<?php echo $detailsData->company_pan_card; ?>" />
                    </div>
                </div>
                <?php if($detailsData->company_pan_card != ""): ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput">&nbsp;</label>
                            <a href="<?php echo e(URL::asset('public/img/vendors/')); ?>/<?php echo $detailsData->company_pan_card; ?>" target="_blank">Download Now</a>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">License Document</label>
                        <input type="file" class="form-control" value="" name="license_doc" id="license_doc">
                        <input type="hidden" name="old_license_doc" value="<?php echo $detailsData->license_doc; ?>" />
                    </div>
                </div>
                <?php if($detailsData->license_doc != ""): ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput">&nbsp;</label>
                            <a href="<?php echo e(URL::asset('public/img/vendors/')); ?>/<?php echo $detailsData->license_doc; ?>" target="_blank">Download Now</a>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Prop / Partner / Director - PAN</label>
                        <input type="file" class="form-control" value="" name="director_pan" id="director_pan">
                        <input type="hidden" name="old_director_pan" value="<?php echo $detailsData->director_pan; ?>" />
                    </div>
                </div>
                <?php if($detailsData->director_pan != ""): ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput">&nbsp;</label>
                            <a href="<?php echo e(URL::asset('public/img/vendors/')); ?>/<?php echo $detailsData->director_pan; ?>" target="_blank">Download Now</a>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Prop / Partner / Director - ID Proof</label>
                        <input type="file" class="form-control" value="" name="director_id_proff" id="director_id_proff">
                        <input type="hidden" name="old_director_id_proff" value="<?php echo $detailsData->director_id_proff; ?>" />
                    </div>
                </div>
                <?php if($detailsData->director_id_proff != ""): ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput">&nbsp;</label>
                            <a href="<?php echo e(URL::asset('public/img/vendors/')); ?>/<?php echo $detailsData->director_id_proff; ?>" target="_blank">Download Now</a>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Firm / Company Address Proof</label>
                        <input type="file" class="form-control" value="" name="comapny_address" id="comapny_address">
                        <input type="hidden" name="old_comapny_address" value="<?php echo $detailsData->comapny_address; ?>" />
                    </div>
                </div>
                <?php if($detailsData->comapny_address != ""): ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput">&nbsp;</label>
                           <a href="<?php echo e(URL::asset('public/img/vendors/')); ?>/<?php echo $detailsData->comapny_address; ?>" target="_blank">Download Now</a>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Cancelled Cheque</label>
                        <input type="file" class="form-control" value="" name="cancelled_cheque" id="cancelled_cheque">
                        <input type="hidden" name="old_cancelled_cheque" value="<?php echo $detailsData->cancelled_cheque; ?>" />
                    </div>
                </div>
                <?php if($detailsData->cancelled_cheque != ""): ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput">&nbsp;</label>
                           <a href="<?php echo e(URL::asset('public/img/vendors/')); ?>/<?php echo $detailsData->cancelled_cheque; ?>" target="_blank">Download Now</a>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Other Documents</label>
                        <input type="file" class="form-control" value="" name="other_doc" id="other_doc">
                        <input type="hidden" name="old_other_doc" value="<?php echo $detailsData->other_doc; ?>" />
                    </div>
                </div>
                <?php if($detailsData->other_doc != ""): ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput">&nbsp;</label>
                            <a href="<?php echo e(URL::asset('public/img/vendors/')); ?>/<?php echo $detailsData->other_doc; ?>" target="_blank">Download Now</a>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="basicInput">Signature Copy</label>
                        <input type="file" class="form-control" value="" name="signature_doc" id="signature_doc">
                        <input type="hidden" name="old_signature_doc" value="<?php echo $detailsData->signature_doc; ?>" />
                    </div>
                </div>
                <?php if($detailsData->signature_doc != ""): ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="basicInput">&nbsp;</label>
                           <a href="<?php echo e(URL::asset('public/img/vendors/')); ?>/<?php echo $detailsData->signature_doc; ?>" target="_blank">Download Now</a>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                
                </div>
                <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Bank Name:</label>
                        <input type="text" class="form-control" value="<?php echo e($detailsData->bank_name); ?>" name="bank_name" id="bank_name">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Account No:</label>
                        <input type="text" class="form-control" value="<?php echo e($detailsData->ac_no); ?>" name="ac_no" id="ac_no">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Account Type:</label>
                        <select class="form-select" name="ac_type" id="ac_type">
                          <option <?php if($detailsData->ac_type == 'Saving'): ?> selected="selected" <?php endif; ?> value="Saving">Saving</option>
                          <option <?php if($detailsData->ac_type == 'Current'): ?> selected="selected" <?php endif; ?> value="Current">Current</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">IFSC / SWIFT Code:</label>
                        <input type="text" class="form-control" value="<?php echo e($detailsData->ifsc); ?>" name="ifsc" id="ifsc">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Account Holder Name:</label>
                        <input type="text" class="form-control" value="<?php echo e($detailsData->ac_holder_name); ?>" name="ac_holder_name" id="ac_holder_name">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-3 col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="text-left">
                  <div> 
                    <!--begin::Submit button-->
                    
                    <button type="button" id="form_submit" class="btn btn-sm btn-success fw-bolder me-3 my-2"> <span class="indicator-label" id="formSubmit">Submit</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>
                    <!--end::Submit button--> 
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

<!-- end plugin js --> 
<script>
    let saveDataURL = "<?php echo e(url('/admin/edit-vendor/'.$row_id)); ?>";
    let returnURL = "<?php echo e(url('/admin/vendors')); ?>";
</script> 
<script src="<?php echo e(asset('public/admin/js/pages/vendors/add-page.js')); ?>"></script> 
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/vendors/edit-page.blade.php ENDPATH**/ ?>