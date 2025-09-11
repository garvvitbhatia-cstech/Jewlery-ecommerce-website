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
            <h2>Our Products</h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Products</li>                
                </ol>
            </nav>
        </div>
    </div>
</div>


<?php if(isset($categories) && $categories->count()>0): ?>
<section class="pro-carousel">
  <div class="container">
  <div class="product-carousel owl-carousel owl-theme">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="item">
      <a class="product-box-pt" href="<?php echo e(url('products/')); ?>/<?php echo e($category->slug); ?>">
        <?php if($category->icon != ''): ?>
        <img src="<?php echo e(asset('public/admin/images/teams/')); ?>/<?php echo e($category->icon); ?>" class="img-fluid" alt="">
        <?php endif; ?>
      </a>
      <a href="<?php echo e(url('products/')); ?>/<?php echo e($category->slug); ?>"><p class="text-dark text-center"><?php echo e($category->title); ?></p></a>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
</section>
<?php endif; ?>

<section class="prodct-pt mb-5 wow fadeInUp">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-lg-2">
        <div class="accordion" id="accordionExample">
          <?php if(isset($categories) && $categories->count()>0): ?>
          <div class="card pt-0">
            <div class="card-head" id="headingOne">
              <h4 class="mb-0" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Collection
              </h4>
            </div>

            
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body py-0">
                <ul>
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="<?php echo e($key == 0?'active':''); ?>">
                  <div class="form-check">
                    <input class="form-check-input category_ids" <?php echo e($cat_slug == $category->id?'checked':''); ?> type="checkbox" onclick="checkCategory(this.value)" name="category_ids" value="<?php echo e($category->id); ?>" id="cat_<?php echo e($category->id); ?>">
                    <label class="form-check-label" for="cat_<?php echo e($category->id); ?>">
                      <?php echo e($category->title); ?>

                    </label>
                  </div>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <li><a href="#"><strong class="text-dark">+ View More</strong></a></li>
                </ul>
              </div>
            </div>
            
          </div>
          <?php endif; ?>

          <div class="card">
            <div class="card-head" id="headingTwo">
              <h4 class="mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                Availability
              </h4>
            </div>
            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body py-0">
                <ul>
                  <li>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="stock_status" value="1" onclick="checkStock(this.value)"  id="in_stock">
                      <label class="form-check-label" for="in_stock">
                        In Stock (<?php echo e($in_stock_count); ?>)
                      </label>
                    </div>  
                  <li>
                  <li>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="stock_status" value="2" onclick="checkStock(this.value)"  id="out_stock">
                      <label class="form-check-label" for="out_stock">
                        Out of Stock (<?php echo e($out_stock_count); ?>)
                      </label>
                    </div>  
                  <li>
                </ul>
              </div>
            </div>
          </div>
          
          <?php if(isset($brands) && $brands->count() > 0): ?>
          <div class="card">
            <div class="card-head" id="Brand">
              <h4 class="mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#Brandee" aria-expanded="true" aria-controls="Brandee">
                Brand
              </h4>
            </div>

            <div id="Brandee" class="collapse show" aria-labelledby="Brand" data-parent="#accordionExample">
              <div class="card-body py-0">
                <ul>
                  
                  <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="<?php echo e($key == 0?'active':''); ?>">
                    <div class="form-check">
                      <input class="form-check-input brand_ids" type="checkbox" name="brand_ids" value="<?php echo e($brand->id); ?>" onclick="checkBrand(this.value)" id="brand_<?php echo e($brand->id); ?>">
                      <label class="form-check-label" for="brand_<?php echo e($brand->id); ?>">
                        <?php echo e($brand->title); ?>

                      </label>
                    </div>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                  <li><strong class="text-dark">+ View More</strong></li>
                </ul>
              </div>
            </div>

          </div>
          <?php endif; ?>

          <div class="card">
            <div class="card-head" id="Products">
              <h4 class="mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#Productee" aria-expanded="true" aria-controls="Productee">
                Size
              </h4>
            </div>
            <div id="Productee" class="collapse show" aria-labelledby="Products" data-parent="#accordionExample">
              <div class="card-body py-0">
               <ul class="d-flex align-items-center">
                <li class="size">5 (1) </li>
                <li class="size">6 (1) </li>
                <li class="size">7 (1) </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-9 col-lg-10">
     <div class="row right" id="replaceHtml">     
  
    </div>
  </div>  

</div>
</div>
</section>

<input type="hidden" id="category_id"/>
<input type="hidden" id="brand_id"/>
<input type="hidden" id="stock_status"/>
<input type="hidden" id="category_slug" value="<?php echo e($slug); ?>"/>

<script type="text/javascript">  
  function checkStock(){
    let stock_status_value = [];
    $("input:checkbox[name=stock_status]:checked").each(function(){
      stock_status_value.push($(this).val());
    });
    $('#stock_status').val(stock_status_value);
    filterData();
  }

  function checkCategory(){
    $('#category_slug').val('');
    let cat_id_value = [];
    $("input:checkbox[name=category_ids]:checked").each(function(){
      cat_id_value.push($(this).val());
    });
    $('#category_id').val(cat_id_value);
    filterData();
  }

  function checkBrand(){
    let brand_id_value = [];
    $("input:checkbox[name=brand_ids]:checked").each(function(){
      brand_id_value.push($(this).val());
    });
    $('#brand_id').val(brand_id_value);
    filterData();
  }

  $('#replaceHtml').on('click', '.pagination a', function(){
		var url = $(this).attr('href');
		$('#replaceHtml').load(url);
		return false;
	});
  $(document).ready(function(){
    filterData();
  });
  function filterData(type = null){
      var category_id = $('#category_id').val();
      var brand_id = $('#brand_id').val();
      var stock_status = $('#stock_status').val();
      var slug = $('#category_slug').val();
      
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        data: {category_id:category_id,brand_id:brand_id,stock_status:stock_status,slug:slug},
        url: "<?php echo e(url('/products_filter')); ?>",
        success: function(response){
          $('#replaceHtml').html(response);
        }
      });
  }
</script>

<?php echo $__env->make('element.process_section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views/products/products.blade.php ENDPATH**/ ?>