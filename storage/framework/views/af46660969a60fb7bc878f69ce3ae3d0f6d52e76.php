<?php $__env->startSection('content'); ?>
<?php if(isset($inner_page->id)): ?>
<?php $__env->startSection('title',strip_tags($inner_page->seo_title)); ?>
<?php $__env->startSection('description',strip_tags($inner_page->seo_description)); ?>
<?php $__env->startSection('keywords',strip_tags($inner_page->seo_keyword)); ?>
<?php $__env->startSection('robots',strip_tags($inner_page->robot_tags)); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>

<style>
  .single-faq {
    border: 1px solid #CCC;
    padding: 17px;
    margin-bottom: 15px;
}
.single-faq span {
    font-weight: bold;
}
.single-faq div {
    margin-top: 10px;
}
</style>

<div class="hero-section innerpage-section">
    <div class="container">
        <div class="text-center d-flex align-items-center justify-content-center flex-column">
            <h2><?php echo e($inner_page->heading); ?></h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e($inner_page->heading); ?></li>                
                </ol>
            </nav>
        </div>
    </div>
</div>



<?php if(isset($faqs) && $faqs->count()>0): ?>
<section class="pro-carousel">
  <div class="container">
<div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-12">
            <div class="accordion myOrder-tab-cls replaceHtml" id="accordionExample">
      <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="accordion-item">
            <div class="accordion-header" id="headingthree<?php echo e($key); ?>">
              <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapsethree<?php echo e($key); ?>" aria-expanded="true" aria-controls="collapsethree<?php echo e($key); ?>">
                <div class="kk-contant-boxb cart-box-cnt w-100 align-items-center  d-flex justify-content-between">
                  <div class="left-content-order">
                    <h4 class="d-block cat-head text-capitalize mb-2">Q<?php echo e($key+1); ?>: <?php echo e($faq->question); ?> </h4>
                  </div>
                </div>
              </div>
            </div>
            <div id="collapsethree<?php echo e($key); ?>" class="accordion-collapse collapse " aria-labelledby="headingthree<?php echo e($key); ?>" data-bs-parent="#accordionExample">
              <div class="d-flex flex-md-row">
                <p class="d-flex">
                <?php echo $faq->answer; ?>

                </p>
              </div>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
</section>
<?php else: ?>
<section class="pro-carousel">
  <div class="container">
    <div class="row">
    <div class="col-md-12 col-lg-12 text-center alert alert-danger">No Faq's Found!</div>
    </div>
</section>
<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views//pages/faqs.blade.php ENDPATH**/ ?>