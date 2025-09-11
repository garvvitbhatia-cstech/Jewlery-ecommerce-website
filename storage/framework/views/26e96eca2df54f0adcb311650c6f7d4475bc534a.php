<?php $__env->startSection('content'); ?>



<div class="page-heading">

   <div class="page-title">

      <div class="row">

         <div class="col-12 col-md-6 order-md-1 order-last">

            <h3>Edit Bidding Product</h3>

         </div>

         <div class="col-12 col-md-6 order-md-2 order-first">

            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

               <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>

                  <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/bidding-products')); ?>">Bidding Products</a></li>

                  <li class="breadcrumb-item active" aria-current="page">Edit Bidding Product</li>

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

                              <input type="hidden" name="old_profile_image" id="old_profile_image" value="<?php echo e($rowData->image); ?>"  />                  	

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Category</label>

                                    <select class="form-select" placeholder="Enter Category" name="category_id" id="category_id">

                                       <option value="">Select Category</option>

                                       <?php echo e(Helper::getSubCategory($category_list,$rowData->category_id)); ?>


                                    </select>

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Actual Amount</label>

                                    <input type="text" name="amount" id="amount" maxlength="8" value="<?php echo e($rowData->amount); ?>" class="form-control numberonly" />

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Start Price</label>

                                    <input type="text" name="start_price" id="start_price" maxlength="8" value="<?php echo e($rowData->start_price); ?>" class="form-control numberonly" />

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Start Date</label>

                                    <input type="datetime-local" name="start_date" id="start_date" value="<?php echo e($rowData->start_date); ?>"  class="form-control"/>

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">End Date</label>

                                    <input type="datetime-local" name="end_date" id="end_date"  value="<?php echo e($rowData->end_date); ?>"  class="form-control"/>

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Quantity</label>

                                    <input type="text" name="quantity" id="quantity"  value="<?php echo e($rowData->quantity); ?>" class="form-control numberonly"/>

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Gross Weight</label>

                                    <input type="text" class="form-control" value="<?php echo e($rowData->gross_weight); ?>" name="gross_weight" id="gross_weight">

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Rubellite Weight</label>

                                    <input type="text" class="form-control" value="<?php echo e($rowData->rubellite_weight); ?>" name="rubellite_weight" id="rubellite_weight">

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Tanzanite Weight</label>

                                    <input type="text" class="form-control" value="<?php echo e($rowData->tanzanite_weight); ?>" name="tanzanite_weight" id="tanzanite_weight">

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Spinal Weight</label>

                                    <input type="text" class="form-control" value="<?php echo e($rowData->spinal_weight); ?>" name="spinal_weight" id="spinal_weight">

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Emerald Weight</label>

                                    <input type="text" class="form-control" value="<?php echo e($rowData->emerald_weight); ?>" name="emerald_weight" id="emerald_weight">

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Blue Sapphire Weight</label>

                                    <input type="text" class="form-control" value="<?php echo e($rowData->blue_sapphire_weight); ?>" name="blue_sapphire_weight" id="blue_sapphire_weight">

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Multi Sapphire Weight</label>

                                    <input type="text" class="form-control" value="<?php echo e($rowData->multi_supphire_weight); ?>" name="multi_supphire_weight" id="multi_supphire_weight">

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Rosecut Weight</label>

                                    <input type="text" class="form-control" value="<?php echo e($rowData->rosecut_weight); ?>" name="rosecut_weight" id="rosecut_weight">

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Diamond Polkies Weight</label>

                                    <input type="text" class="form-control" value="<?php echo e($rowData->diamond_polkies_weight); ?>" name="diamond_polkies_weight" id="diamond_polkies_weight">

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Basra Pearls Weight</label>

                                    <input type="text" class="form-control" value="<?php echo e($rowData->basra_pearls_weight); ?>" name="basra_pearls_weight" id="basra_pearls_weight">

                                 </div>

                              </div>

                              <div class="col-md-12">

                                 <div class="form-group">

                                    <label for="basicInput">Title</label>

                                    <input type="text" class="form-control" value="<?php echo e($rowData->title); ?>" name="title" id="title"/>

                                 </div>

                              </div>

                              <div class="col-md-12">

                                 <div class="form-group">

                                    <label for="basicInput">Content</label>

                                    <textarea class="form-control editorBox" value="" name="content" id="content"><?php echo e($rowData->content); ?></textarea>

                                 </div>

                              </div>

                              <div class="col-md-12">

                                 <div class="form-group">

                                    <label for="basicInput">Heading</label>

                                    <input type="text" class="form-control" value="<?php echo e($rowData->heading); ?>" name="heading" id="heading">

                                 </div>

                              </div>

                              <div class="col-md-12">

                                 <div class="form-group">

                                    <label for="basicInput">Description</label>

                                    <textarea class="form-control editorBox" value="" name="description" id="description"><?php echo e($rowData->description); ?></textarea>

                                 </div>

                              </div>

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Image</label>

                                    <input type="file" class="form-control" name="image" id="image" accept="image/*">

                                 </div>

                              </div>

                              <?php if($rowData->image != ""): ?>

                              <div class="col-md-2">

                                 <div class="form-group">

                                    <label for="basicInput">&nbsp;</label>

                                    <img src="<?php echo e(URL::asset('public/admin/images/teams/')); ?>/<?php echo $rowData->image; ?>"  style="max-width: 80px;height: auto;"> 

                                 </div>

                              </div>

                              <?php endif; ?>

                           </div>

                        </div>

                        <div class="tab-pane fade " id="seo" role="tabpanel" aria-labelledby="seo-tab">

                           <div class="row">

                              <div class="col-md-12">

                                 <div class="form-group">

                                    <label for="basicInput">SEO Title</label>

                                    <textarea class="form-control" rows="3" name="seo_title" id="seo_title"><?php echo e($rowData->seo_title); ?></textarea>

                                 </div>

                              </div>

                              <div class="col-md-6">

                                 <div class="form-group">

                                    <label for="basicInput">SEO Description</label>

                                    <textarea class="form-control" rows="6" name="seo_description" id="seo_description"><?php echo e($rowData->seo_description); ?></textarea>

                                 </div>

                              </div>

                              <div class="col-md-6">

                                 <div class="form-group">

                                    <label for="basicInput">SEO Keywords</label>

                                    <textarea class="form-control" rows="6" name="seo_keyword" id="seo_keyword"><?php echo e($rowData->seo_keyword); ?></textarea>

                                 </div>

                              </div>

                              <div class="col-md-6">

                                 <div class="form-group">

                                    <label for="basicInput">SEO Robots</label>

                                    <select id="robot_tags" name="robot_tags" value="index,nofollow" class="form-select">

                                    <option <?php echo e($rowData->robot_tags == 'index,follow'?'selected':''); ?> value="index,follow">index,follow</option>

                                    <option <?php echo e($rowData->robot_tags == 'index,nofollow'?'selected':''); ?> value="index,nofollow">index,nofollow</option>

                                    <option <?php echo e($rowData->robot_tags == 'noindex,follow'?'selected':''); ?> value="noindex,follow">noindex,follow</option>

                                    <option <?php echo e($rowData->robot_tags == 'noindex,nofollow'?'selected':''); ?> value="noindex,nofollow">noindex,nofollow</option>

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

      let saveDataURL = "<?php echo e(url('/admin/edit-bidding-product/'.$row_id)); ?>";     

      let returnURL = "<?php echo e(url('/admin/edit-bidding-product/'.$row_id)); ?>";     

</script> 

<script src="<?php echo e(asset('public/admin/js/pages/bidding_products/add-page.js')); ?>"></script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views//admin/bidding_products/edit-page.blade.php ENDPATH**/ ?>