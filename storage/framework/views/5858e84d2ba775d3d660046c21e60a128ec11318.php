<?php $__env->startSection('content'); ?>

<link href="<?php echo e(URL::asset('public/admin/css/dropzone.css')); ?>" rel="stylesheet">
<script src="<?php echo e(URL::asset('public/admin/js/dropzone.js')); ?>"></script>

<div class="page-heading">

   <div class="page-title">

      <div class="row">

         <div class="col-12 col-md-6 order-md-1 order-last">

            <h3>Edit Product</h3>

         </div>

         <div class="col-12 col-md-6 order-md-2 order-first">

            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

               <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>

                  <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/products')); ?>">Products</a></li>

                  <li class="breadcrumb-item active" aria-current="page">Edit Product</li>

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

                        <li class="nav-item" role="presentation"> <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images"

                           role="tab" aria-controls="images" aria-selected="false">Images Info</a> </li>

                        <li class="nav-item" role="presentation"> <a class="nav-link" id="seo-tab" data-bs-toggle="tab" href="#seo"

                           role="tab" aria-controls="seo" aria-selected="false">SEO Info</a> </li>

                     </ul>

                     <hr />

                     <div class="tab-content mt-5" id="myTabContent">

                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                           <div class="row">

                              <input type="hidden" name="old_profile_image" id="old_profile_image" value="<?php echo e($rowData->image); ?>"  />                  	

                              <div class="col-md-3">

                                 <div class="form-group">

                                    <label for="basicInput">Category</label>

                                    <select class="form-select" placeholder="Enter Category" name="category_id" id="category_id">

                                       <option value="">Select Category</option>

                                       <?php echo e(Helper::getSubCategory($category_list,$rowData->category_id)); ?>


                                    </select>

                                 </div>

                              </div>

                              <div class="col-md-6">

                                 <div class="form-group">

                                    <label for="basicInput">Title</label>

                                    <input class="form-control" name="title" id="title" value="<?php echo e($rowData->title); ?>">

                                 </div>

                              </div>

                              <div class="col-md-3">

                                 <div class="form-group">

                                    <label for="basicInput">Price (INR)</label>

                                    <input type="text" name="amount" id="amount" maxlength="8" value="<?php echo e($rowData->amount); ?>" class="form-control numberonly" />

                                 </div>

                              </div>

                              <div class="col-md-4">

                              <div class="form-group">

                                 <label for="basicInput">Price (USD)</label>

                                 <input type="text" name="usd_price" id="usd_price" maxlength="8" value="<?php echo e($rowData->usd_price); ?>" class="form-control numberonly" />

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

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Brand</label>

                                    <select name="brand" id="brand" class="form-select">
                                       <option value="">Select Brand</option>
                                       <?php $__currentLoopData = $brand_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option <?php echo e($rowData->brand == $key?'selected':''); ?> value="<?php echo e($key); ?>"><?php echo e($brand); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>

                                 </div>

                              </div>

                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="basicInput">Rating</label>
                                    <select name="rating" id="rating" class="form-select">
                                    <option <?php echo e($rowData->rating == 1?'selected':''); ?> value="1">1 Star</option>
                                    <option <?php echo e($rowData->rating == 2?'selected':''); ?> value="2">2 Star</option>
                                    <option <?php echo e($rowData->rating == 3?'selected':''); ?> value="3">3 Star</option>
                                    <option <?php echo e($rowData->rating == 4?'selected':''); ?> value="4">4 Star</option>
                                    <option <?php echo e($rowData->rating == 5?'selected':''); ?> value="5">5 Star</option>
                                    </select>
                                 </div>
                              </div>  

                              <div class="col-md-4">

                                 <div class="form-group">

                                    <label for="basicInput">Product Quantity</label>

                                    <input type="text" class="form-control numberonly" value="<?php echo e($rowData->quantity); ?>" name="quantity" id="quantity">

                                 </div>

                              </div>

                              <div class="col-md-4">
                                 <label for="basicInput">Inventory</label><br>
                                 <div class="form-check  form-check-inline">
                                 <input class="form-check-input" type="radio" name="in_stock" value="1" <?php echo e($rowData->in_stock == 1?'checked':''); ?> id="in_stock_check">
                                 <label class="form-check-label" for="in_stock_check">
                                    In Stock
                                 </label>
                                 </div>
                                 <div class="form-check  form-check-inline">
                                    <input class="form-check-input" type="radio" name="in_stock" value="2" <?php echo e($rowData->in_stock == 2?'checked':''); ?> id="out_stock_check">
                                    <label class="form-check-label" for="out_stock_check">
                                       Out of Stock
                                    </label>
                                 </div>
                              </div>

                              <div class="col-md-4">
                                 <label for="basicInput">Exclusive</label><br>
                                 <div class="form-check  form-check-inline">
                                 <input class="form-check-input" type="checkbox" name="is_exclusive" value="1" <?php echo e($rowData->is_exclusive == 1?'checked':''); ?> id="is_exclusive">
                                 <label class="form-check-label" for="is_exclusive">
                                    Yes
                                 </label>
                                 </div>
                              </div>
                                
                              <div class="col-md-4">
                                 <label for="basicInput">Sold Out</label><br>
                                 <div class="form-check  form-check-inline">
                                 <input class="form-check-input" type="checkbox" name="is_sold" value="1" <?php echo e($rowData->is_sold == 1?'checked':''); ?> id="is_sold">
                                 <label class="form-check-label" for="is_sold">
                                    Yes
                                 </label>
                                 </div>
                              </div>
                              

                              <div class="col-md-12">

                                 <div class="form-group">

                                    <label for="basicInput">Short Description</label>

                                    <textarea class="form-control editorBox" name="content" id="content"><?php echo e($rowData->content); ?></textarea>

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

                        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">

                           <div class="row">
                           
                              <div class="col-12">
                                    <label for="basicInput">More Images</label>
                                    <div id="my-awesome-dropzone" class="dropzone"></div>
                              </div>

                              <?php if(isset($product_images) && count($product_images) > 0): ?>
                              <div class="col-12"><label for="basicInput">Product Images</label></div>
                              <div class="col-12" id="replaceHtml">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Image</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                       <th>Created</th> 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td>
                                       <a target="_blank" href="<?php echo e(URL::asset('public/admin/images/products/')); ?>/<?php echo $value->image; ?>" data-sub-html="Image"> 
                                       <img width="100px" class="img-responsive" src="<?php echo e(URL::asset('public/admin/images/products/')); ?>/<?php echo $value->image; ?>"> 
                                       </a>
                                    </td>
                                    <td> 
                                       <?php if($value->status == 1): ?>
                                       <a href="javascript:void(0);" onclick="changeStatus('product_images','<?php echo $value->id; ?>','<?php echo $value->status; ?>');" class="badge bg-success ">Active</a>
                                       <?php else: ?>
                                       <a href="javascript:void(0);" onclick="changeStatus('product_images','<?php echo $value->id; ?>','<?php echo $value->status; ?>');"  class="badge bg-danger">In-Active</a>
                                       <?php endif; ?>
                                    </td>
                                    <td><a href="javascript:void(0);" onclick="deleteData('product_images','<?php echo e($value->id); ?>');" class="btn btn-sm btn-danger"  title="Delete">
                                          <i class="bi bi-trash"></i>
                                       </a></td>
                                    <td><?php echo e(date("F jS, Y h:i A",strtotime($value->created_at))); ?></td> 
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                 </table>
                              </div>
                              <?php endif; ?> 

                           </div>

                        </div>

                        <div class="tab-pane fade " id="seo" role="tabpanel" aria-labelledby="seo-tab">

                           <div class="row">

                              <div class="col-md-12">

                                 <div class="form-group">

                                    <label for="basicInput">SEO Title</label>

                                    <textarea class="form-control" rows="3" placeholder="Enter SEO Title" name="seo_title" id="seo_title"><?php echo e($rowData->seo_title); ?></textarea>

                                 </div>

                              </div>

                              <div class="col-md-6">

                                 <div class="form-group">

                                    <label for="basicInput">SEO Description</label>

                                    <textarea class="form-control" rows="6" placeholder="Enter SEO Description" name="seo_description" id="seo_description"><?php echo e($rowData->seo_description); ?></textarea>

                                 </div>

                              </div>

                              <div class="col-md-6">

                                 <div class="form-group">

                                    <label for="basicInput">SEO Keywords</label>

                                    <textarea class="form-control" rows="6" placeholder="Enter SEO Keywords" name="seo_keyword" id="seo_keyword"><?php echo e($rowData->seo_keyword); ?></textarea>

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
   function filterData(){
      $("#replaceHtml").load(location.href + " #replaceHtml");
	}
   
	$('#my-awesome-dropzone').attr('class', 'dropzone');
	var myDropzone = new Dropzone('#my-awesome-dropzone', {
		url: "<?php echo e(url('admin/upload-product-images')); ?>",
		clickable: true,
		method: 'POST',
		maxFiles: 50,
		parallelUploads: 50,
		maxFilesize: 20,
		addRemoveLinks: false,
		dictRemoveFile: 'Remove',
		dictCancelUpload: 'Cancel',
		dictCancelUploadConfirmation: 'Confirm cancel?',
		dictDefaultMessage: 'Drop files here to upload',
		dictFallbackMessage: 'Your browser does not support drag n drop file uploads',
		dictFallbackText: 'Please use the fallback form below to upload your files like in the olden days',
		paramName: 'file',
		params: {'id':'<?php echo e($rowData->id); ?>'},
		forceFallback: false,
		createImageThumbnails: true,
		maxThumbnailFilesize: 5,
		//acceptedFiles: ".jpeg,.jpg,.webp,.png,.svg",
		acceptedFiles: "image/*",
		autoProcessQueue: true,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		init: function() {
			this.on('thumbnail', function(file) {
				if (file.width < 50 || file.height < 50) {
					//file.rejectDimensions();
					file.acceptDimensions();
				} else {
					file.acceptDimensions();
				}
			});
		},
		accept: function(file, done) {
			file.acceptDimensions = done;
			file.rejectDimensions = function() {
				done('The image must be at least 50 x 50px')
			};
		}
	});
	
	myDropzone.on("complete", function(file) {
		var status = file.status;
		if (status == 'success') {
	
		}
		console.log(file);
	});
	
	var count = 1;
	myDropzone.on("success", function(file, responseText) {
		var fnamenew = file.name;
		var fname = fnamenew.trim().replace(/["~!@#$%^&*\(\)_+=`{}\[\]\|\\:;'<>,.\/?"\- \t\r\n]+/g, '');
		$("#productsimgall").append('<input type="hidden" name="image[]" class="img_eng" id="img_eng' + fname + '" value="' + responseText + '">');
	   
		count++;
	});
	
	myDropzone.on("removedfile", function(file) {
		var fname = file.name;
		fname2 = fname.trim().replace(/["~!@#$%^&*\(\)_+=`{}\[\]\|\\:;'<>,.\/?"\- \t\r\n]+/g, '_');    
		var image = $('#img_eng'+fname2).val();
		$.ajax({
			url: "<?php echo e(url('admins/upload-wedding-images')); ?>",
			type:'POST',
			data:{imgname:image}, 
			success:function (success){
				$(this).parents('li').remove();
				$("#productsimgall #img_eng" + fname2 + "").replaceWith('');   
			}
		});	
		return false; 
	});
	
	myDropzone.on("addedfile", function(file) {
		
	});


   $('.numberonly').keypress(function(e){

   	var charCode = (e.which) ? e.which : event.keyCode

   	if (String.fromCharCode(charCode).match(/[^0-9+]/g))

   	return false;

   });

      let saveDataURL = "<?php echo e(url('/admin/edit-product/'.$row_id)); ?>";     

      let returnURL = "<?php echo e(url('/admin/edit-product/'.$row_id)); ?>";      

</script> 

<script src="<?php echo e(asset('public/admin/js/pages/products/add-page.js')); ?>"></script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views//admin/products/edit-page.blade.php ENDPATH**/ ?>