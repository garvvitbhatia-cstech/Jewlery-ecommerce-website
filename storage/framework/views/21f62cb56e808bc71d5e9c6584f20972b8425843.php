
<?php $__env->startSection('content'); ?>

<div class="page-heading">
   <div class="page-title">
      <div class="row">
         <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Add Bidding Product</h3>
         </div>
         <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/bidding_products')); ?>">Bidding Products</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Bidding Product</li>
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
                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation"> <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                           role="tab" aria-controls="home" aria-selected="true">General Info</a> </li>
                        <li class="nav-item" role="presentation"> <a class="nav-link" id="seo-tab" data-bs-toggle="tab" href="#seo"
                           role="tab" aria-controls="seo" aria-selected="false">SEO Info</a> </li>
                     </ul>
                     <hr />
                     <div class="tab-content mt-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="basicInput">Category</label>
                                    <select class="form-select" placeholder="Enter Category" name="category_id" id="category_id">
                                       <option value="">Select Category</option>
                                       <?php echo e(Helper::getSubCategory($category_list)); ?>

                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="basicInput">Actual Price</label>
                                    <input type="text" name="amount" id="amount" maxlength="5" placeholder="Actual Price" class="form-control numberonly" />
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="basicInput">Start Price</label>
                                    <input type="text" name="start_price" id="start_price" maxlength="5" placeholder="Start Price" class="form-control numberonly" />
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="basicInput">Title</label>
                                    <textarea class="form-control" placeholder="Enter Description" rows="3" value="" name="title" id="title"></textarea>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="basicInput">Content</label>
                                    <textarea class="form-control editorBox" placeholder="Enter Content" value="" name="content" id="content"></textarea>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="basicInput">Heading</label>
                                    <input type="text" class="form-control" placeholder="Enter Heading" value="" name="heading" id="heading">
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="basicInput">Description</label>
                                    <textarea class="form-control editorBox" placeholder="Enter Description" value="" name="description" id="description"></textarea>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="basicInput">Image</label>
                                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade " id="seo" role="tabpanel" aria-labelledby="seo-tab">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="basicInput">SEO Title</label>
                                    <textarea class="form-control" rows="6" placeholder="Enter SEO Title" name="seo_title" id="seo_title"></textarea>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="basicInput">SEO Description</label>
                                    <textarea class="form-control" rows="6" placeholder="Enter SEO Description" name="seo_description" id="seo_description"></textarea>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="basicInput">SEO Keywords</label>
                                    <textarea class="form-control" rows="6" placeholder="Enter SEO Keywords" name="seo_keyword" id="seo_keyword"></textarea>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="basicInput">SEO Robots</label>
                                    <select id="robot_tags" name="robot_tags" value="index,nofollow" class="form-select">
                                       <option value="index,follow">index,follow</option>
                                       <option value="index,nofollow">index,nofollow</option>
                                       <option value="noindex,follow">noindex,follow</option>
                                       <option value="noindex,nofollow">noindex,nofollow</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-3 col-md-3 ">
               <div class="card">
                  <div class="col-md-12">
                     <div class="text-left  p-3 p-l-20">
                        <!--begin::Submit button-->
                        <button type="button" id="form_submit" class="btn btn-sm btn-primary fw-bolder me-3 my-2"> <span class="indicator-label" id="formSubmit">Submit</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>
                        <!--end::Submit button--> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </section>
</div>
<!-- end plugin js --> 

<script>
   $('.numberonly').keypress(function(e){
		var charCode = (e.which) ? e.which : event.keyCode
		if (String.fromCharCode(charCode).match(/[^0-9+]/g))
		return false;
   });
      let saveDataURL = "<?php echo e(url('/admin/add-bidding-product')); ?>";
      let returnURL = "<?php echo e(url('/admin/bidding-products')); ?>";
</script> 
<script src="<?php echo e(asset('public/admin/js/pages/bidding_products/add-page.js')); ?>"></script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8.2\htdocs\laraval_ecommerce_admin\resources\views//admin/bidding_products/add-page.blade.php ENDPATH**/ ?>