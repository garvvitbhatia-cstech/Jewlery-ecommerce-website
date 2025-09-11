<?php if(isset($section7->id) || isset($section8->id) || isset($section9->id)): ?>
      <div class="del-section section-padding wow fadeInUp">
        <div class="container">
          <div class="row">
            <?php if(isset($section7->id)): ?>
            <div class="col-md-4">
              <div class="del-box text-center">
                <?php if($section7->banner != '' && $section7->banner_status == 1): ?>
                <img src="<?php echo e(URL::asset('public/admin/images/banners')); ?>/<?php echo $section7->banner; ?>" class="img-fluid" alt="">
                <?php endif; ?>
                <h6><?php echo e($section7->heading); ?></h6>
                <p><span><?php echo $section7->content; ?></span></p>
              </div>
            </div>
            <?php endif; ?>

            <?php if(isset($section8->id)): ?>
            <div class="col-md-4">
              <div class="del-box text-center">
              <?php if($section8->banner != '' && $section8->banner_status == 1): ?>
                <img src="<?php echo e(URL::asset('public/admin/images/banners')); ?>/<?php echo $section8->banner; ?>" class="img-fluid" alt="">
                <?php endif; ?>
                <h6><?php echo e($section8->heading); ?></h6>
                <p><span><?php echo $section8->content; ?></span></p>
              </div>
            </div>
            <?php endif; ?>

            <?php if(isset($section9->id)): ?>
            <div class="col-md-4">
              <div class="del-box text-center">
                <?php if($section9->banner != '' && $section9->banner_status == 1): ?>
                <img src="<?php echo e(URL::asset('public/admin/images/banners')); ?>/<?php echo $section9->banner; ?>" class="img-fluid" alt="">
                <?php endif; ?>
                <h6><?php echo e($section9->heading); ?></h6>
                <p><span><?php echo $section9->content; ?></span></p>
              </div>
            </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
      <?php endif; ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views/element/process_section.blade.php ENDPATH**/ ?>