

<?php $__env->startSection('content'); ?>
<form class="form w-100" id="pageForm" action="#">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Edit Payment Method</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/payment-methods')); ?>">Payment Methods</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Payment Method</li>
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
                <li class="nav-item" role="presentation"> <a class="nav-link" id="seo-tab" data-bs-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">Payment Keys</a> </li>
                 <li class="nav-item" role="presentation"> <a class="nav-link" id="user-group-tab" data-bs-toggle="tab" href="#user-group" role="tab" aria-controls="user-group" aria-selected="false">User Groups</a> </li>
                                        
                
              </ul>
              <hr />
              <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">
                    
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Title</label>
                                <input type="text" class="form-control" value="<?php echo e($rowData->title); ?>" name="title" id="title">
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Type</label>
                            <select class="form-select" name="type" id="type">
                            <option <?php if($rowData->type == 'Online'): ?> selected <?php endif; ?> value="Online">Online</option>
                            <option <?php if($rowData->type == 'COD'): ?> selected <?php endif; ?> value="COD">COD</option>
                            </select>
                        </div>
                    </div>
              
                    
                   
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Surcharge (%)</label>
                            <input type="text" class="form-control" value="<?php echo e($rowData->surcharge_percentage); ?>" name="surcharge_percentage" id="surcharge_percentage">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Surcharge (INR)</label>
                            <input type="text" class="form-control" value="<?php echo e($rowData->surcharge_rupees); ?>" name="surcharge_rupees" id="surcharge_rupees">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Description</label>
                            <textarea class="form-control" name="description" id="description"><?php echo e($rowData->description); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Icon</label>
                            <input type="file" class="form-control" value="" name="file" id="file">
                            <input type="hidden" name="old_file" value="<?php echo $rowData->image; ?>" />
                        </div>
                    </div>
                    <?php if($rowData->image != ""): ?>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput">&nbsp;</label>
                                <img src="<?php echo e(URL::asset('public/img/brands/')); ?>/<?php echo $rowData->image; ?>" width="100">
                            </div>
                        </div>
                    <?php endif; ?>
                        
                  </div>
                </div>
                <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                <div class="col-md-12">
                        <div class="form-group">
                            <label for="basicInput">Key ID</label>
                            <input type="text" class="form-control" value="<?php echo e($rowData->key_id); ?>" name="key_id" id="key_id">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="basicInput">Key Secret</label>
                            <input type="text" class="form-control" value="<?php echo e($rowData->key_secret); ?>" name="key_secret" id="key_secret">
                        </div>
                    </div>
                </div>
                <?php
                $explode = explode(',',$rowData->allow_for);
                ?>
                <div class="tab-pane fade" id="user-group" role="tabpanel" aria-labelledby="user-group-tab">
                <div class="col-md-3">
                        <div class="form-group">
                            <label for="basicInput">All</label>
                            <input type="checkbox" <?php if(in_array('All',$explode)): ?> checked <?php endif; ?> name="allow_for[]" value="All">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="basicInput">Guest</label>
                            <input type="checkbox" <?php if(in_array('Guest',$explode)): ?> checked <?php endif; ?> name="allow_for[]" value="Guest">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="basicInput">Reg Users</label>
                            <input type="checkbox" <?php if(in_array('Reg Users',$explode)): ?> checked <?php endif; ?> name="allow_for[]" value="Reg Users">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="basicInput">Vendors</label>
                            <input type="checkbox" <?php if(in_array('Vendors',$explode)): ?> checked <?php endif; ?> name="allow_for[]" value="Vendors">
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
          </div>
        </div>
      </div>
    </section>
  </div>
</form>

<!-- end plugin js --> 
<script>
    let saveDataURL = "<?php echo e(url('/admin/edit-payment-method/'.$row_id)); ?>";
    let returnURL = "<?php echo e(url('/admin/payment-methods')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/payment_methods/add-page.js')); ?>"></script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/payment_methods/edit-page.blade.php ENDPATH**/ ?>