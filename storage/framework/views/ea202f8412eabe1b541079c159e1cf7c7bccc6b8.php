<?php $__env->startSection('content'); ?>
<?php if(isset($inner_page->id)): ?>
<?php $__env->startSection('title',strip_tags($inner_page->seo_title)); ?>
<?php $__env->startSection('description',strip_tags($inner_page->seo_description)); ?>
<?php $__env->startSection('keywords',strip_tags($inner_page->seo_keyword)); ?>
<?php $__env->startSection('robots',strip_tags($inner_page->robot_tags)); ?>
<?php endif; ?>
<div class="hero-section innerpage-section">
  <div class="container">
    <div class="text-center d-flex align-items-center justify-content-center flex-column">
      <h2>My Biddings</h2>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Biddings</li>
        </ol>
      </nav>
    </div>
  </div>
</div>

<?php if(isset($biddings) && $biddings->count()>0): ?>
<section class="pro-carousel">
  <div class="container">    
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-12">
            <div class="accordion myOrder-tab-cls replaceHtml" id="accordionExample">
            
            	<?php $__currentLoopData = $biddings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $product_details = Helper::getProductInfo($product->product_id); ?>
					        <div class="accordion-item">
                    <div class="accordion-header" id="headingthree<?php echo e($key); ?>">
                      <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapsethree<?php echo e($key); ?>" aria-expanded="true" aria-controls="collapsethree<?php echo e($key); ?>">
                        <div class="kk-contant-boxb cart-box-cnt w-100 align-items-center  d-flex justify-content-between">
                          <div class="left-content-order">
                              <h4 class="d-block cat-head text-capitalize mb-2">Product: <span class="title-dscnt"><?php echo e($product_details->title); ?></span> </h4>
                              <div class="d-flex align-items-center"> <span class="d-flex align-items-center fs-1 ps-3"><span class="pe-2 calendar-icon"><img src="<?php echo e(asset('public/img/home/')); ?>/calendar-icon.svg" alt=""></span><?php echo e(date('d F Y',strtotime($product->created_at))); ?> at <?php echo e(date('h:iA',strtotime($product->created_at))); ?></span> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div id="collapsethree<?php echo e($key); ?>" class="accordion-collapse collapse" aria-labelledby="headingthree<?php echo e($key); ?>" data-bs-parent="#accordionExample">
                      <div class="d-flex flex-md-row flex-column shipping-address">
                        <p><strong class="text-uppercase">Start Price: ₹ <?php echo e(number_format($product->start_price,2)); ?></strong><br>
                        <strong class="text-uppercase">Bidding Price: ₹ <?php echo e(number_format($product->bidding_price,2)); ?></strong></p>
                      </div>
                      <div class="kk-contant-boxb cart-box-cnt">
                        <span class="d-block mb-2"><?php echo nl2br($product->comment); ?></span>
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
  
  </div>
</section>
<?php else: ?>
<section class="pro-carousel">
  <div class="container">
    <div class="row">
    <div class="col-md-12 col-lg-12 text-center alert alert-danger">No Orders Found!</div>
    </div>
</section>
<?php endif; ?>

<?php echo $__env->make('element.process_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">

$(document).on('click','#searchBtn',function(e) {
  search();
});

  function search(){
    var flag = 1;
    if($('.search-box-field').val() == ''){
      //swal("Error!", 'Please Enter Order ID', "error");
      //flag = 0;
    }
    if(flag == 1){
      var oid = $('.search-box-field').val();
      $.ajax({
        type:'POST',
        url:"<?php echo e(url('/search-order')); ?>", 
        async:false,
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{oid:oid},
        success: function(response){
          $('.replaceHtml').html(response);
        },error: function(ts){
          console.log(ts);
          swal("Error!", 'Something went wrong.', "error");
        }							
      });
      return false;
    }
  }
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views/pages/my_biddings.blade.php ENDPATH**/ ?>