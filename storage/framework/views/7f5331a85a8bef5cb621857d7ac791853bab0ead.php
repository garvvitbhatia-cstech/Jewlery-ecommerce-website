

<?php $__env->startSection('content'); ?>

  <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <p class="text-subtitle text-muted">Contacts List.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo e(url('/admin/contacts')); ?>">Contacts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Contact</li>                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    <div class="row">
    <div class="col-xs-12 col-md-6 col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for=""><strong>Name:</strong> </label>
                <?php echo e($rowData->name); ?> 
              </div>
              <div class="form-group">
                <label for=""><strong>Email:</strong> </label>
                <?php echo e($rowData->email); ?> 
              </div>
              <div class="form-group">
                <label for=""><strong>Contact:</strong> </label>
                <?php echo e($rowData->contact); ?> 
              </div>
              <div class="form-group">
                <label for=""><strong>Subject:</strong> </label>
                <?php echo e($rowData->subject); ?> 
              </div>
              <div class="form-group">
                <label for=""><strong>Message:</strong> </label>
                <br />
                <?php echo nl2br($rowData->message); ?> 
              </div>
            </div>            
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- end plugin js --> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/contacts/view-page.blade.php ENDPATH**/ ?>