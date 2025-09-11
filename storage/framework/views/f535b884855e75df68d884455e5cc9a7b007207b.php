<?php $__env->startSection('content'); ?>
<div class="page-heading">
<div class="page-title">
  <div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
      <h3>View Bidding History</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/user-biddings')); ?>">Bidding History</a></li>
          <li class="breadcrumb-item active" aria-current="page">View Bidding History</li>
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
            <div class="row"> 
              <div class="col-md-12">
                <div class="form-group">
                  <label for="basicInput"><b>Product :</b> <?php echo e(Helper::getBiddingProduct($rowData->product_id,'title')); ?></label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="basicInput"><b>User :</b> <?php echo e(Helper::getUserName($rowData->user_id)); ?> (<?php echo e(Helper::getUserInfo($rowData->user_id,'email')); ?>)</label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="basicInput"><b>Start Price :</b> ₹ <?php echo e(number_format($rowData->start_price,2)); ?></label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="basicInput"><b>Bidding Price :</b> ₹ <?php echo e(number_format($rowData->bidding_price,2)); ?></label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="basicInput"><b>Comment :</b> <?php echo nl2br($rowData->comment); ?></label>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views//admin/user_biddings/view-page.blade.php ENDPATH**/ ?>