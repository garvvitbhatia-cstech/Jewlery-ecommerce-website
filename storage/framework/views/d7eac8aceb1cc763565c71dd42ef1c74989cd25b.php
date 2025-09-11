<?php $__env->startSection('content'); ?>

<div class="page-heading">

   <div class="page-title">

      <div class="row">

         <div class="col-12 col-md-6 order-md-1 order-last">

            <h3>Bidding Product Management</h3>

            <p class="text-subtitle text-muted">Product list.</p>

         </div>

         <div class="col-12 col-md-6 order-md-2 order-first">

            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

               <ol class="breadcrumb">

                  <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>

                  <li class="breadcrumb-item active" aria-current="page">Bidding Products</li>

               </ol>

            </nav>

         </div>

      </div>

   </div>

   <section class="section">

      <div class="card">

         <!--begin::Card body-->

         <div class="card-body">

            <!--begin::Compact form-->

            <form id="searchForm" name="searchForm" class="float-start">

               <div class="d-flex align-items-center  w-md-800px">

                  <!--begin::Input group-->

                  

                  <div class="position-relative w-md-200px me-md-2">

                  <select id="category_id" name="category_id" confirmation="false" class="form-select" placeholder="Search By Title">
                  <option value="">Select Category</option>
                     <?php if(isset($category_list) && $category_list->count()>0): ?>                        
                        <?php $__currentLoopData = $category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($category); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php endif; ?>
                  </select>
                  </div>

                  <div class="position-relative w-md-200px me-md-2">

                     <input id="title" name="title" confirmation="false" class="form-control" placeholder="Search By Title">

                  </div>

                  <!--end::Input group-->

                  <!--begin:Action-->

                  <div class="d-flex align-items-center">

                     <button type="button" id="searchbuttons" onclick="filterData('search');" style="margin-right:10px;" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Search</button>

                     <button type="reset" class="btn btn-sm btn-dark btn-active-light-primary me-5" data-kt-menu-dismiss="true"  onclick="resetFilterForm();">Reset</button>

                  </div>

                  <!--end:Action-->

               </div>

            </form>

            <a href="<?php echo e(url('/admin/add-bidding-product')); ?>" class="btn icon btn-sm btn-outline-success float-end">Add New Bidding Product</a>

         </div>

         <!--end::Card body-->

      </div>

   </section>

   <!-- Table head options start -->

   <section class="section">

      <div class="row" id="table-head">

         <div class="col-12">

            <div class="card">

               <div class="card-content">

                  <!-- table head dark -->

                  <div class="table-responsive">

                     <table class="table mb-0">

                        <thead class="thead-dark">

                           <tr>

                           	<th>#</th>

                              <th width="20%">TITLE</th>

                              <th>CATEGORY</th>

                              <th>AMOUNT</th>

                              <th>DATE</th>

                              <th>IMAGE</th>

                              <th>STATUS</th>

                              <th>CREATED</th>

                              <th>ACTION</th>

                           </tr>

                        </thead>

                        <tbody id="replaceHtml">

                           <tr>

                              <td colspan="10" class="text-center"><img src="<?php echo e(asset('public/admin/images/svg/oval.svg')); ?>" class="me-4" style="width: 3rem" alt="audio"></td>

                           </tr>

                        </tbody>

                     </table>

                  </div>

               </div>

            </div>

         </div>

      </div>

   </section>

   <!-- Table head options end -->

</div>

<script type="text/javascript">

   $(document).ready(function(){   

       filterData('simple');   

   });

   

   function filterData(type = null){   

       	if(type =='search'){$('#searchbuttons').html('Searching..');}   

   		$.ajax({   

           	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

           	type: 'POST',   

			data: $('#searchForm').serialize(),	   

			url: "<?php echo e(url('/admin/bidding_products_paginate')); ?>",	   

			success: function(response){	   

				$('#replaceHtml').html(response);	   

				   $('#searchbuttons').html('Search');	   

			}	   

		});   	

   }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views//admin/bidding_products/index.blade.php ENDPATH**/ ?>