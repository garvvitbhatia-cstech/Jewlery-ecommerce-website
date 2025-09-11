

<?php $__env->startSection('content'); ?>
<style>
	.label:after{
	 	content:"*" ;
		color:red    
	}
</style>
<form class="form w-100" id="pageForm" action="#">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Edit <?php echo e($rowData->product_name); ?> (<?php echo e($rowData->product_code); ?>)</h3>
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
      <div class="row">
      <div class="col-9 col-md-9">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation"> <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">Info</a> </li>
              <li class="nav-item" role="presentation"> <a class="nav-link" id="price-tab" data-bs-toggle="tab" href="#price"
                                        role="tab" aria-controls="price" aria-selected="false">Prices</a> </li>
              <li class="nav-item" role="presentation"> <a class="nav-link" id="discounts-tab" data-bs-toggle="tab" href="#discounts"
                                        role="tab" aria-controls="discounts" aria-selected="false">Quantity Discounts</a> </li>
              <li class="nav-item" role="presentation"> <a class="nav-link" id="permissions-tab" data-bs-toggle="tab" href="#permissions"
                                        role="tab" aria-controls="permissions" aria-selected="false">Permissions</a> </li>
              <li class="nav-item" role="presentation"> <a class="nav-link" id="sizes-tab" data-bs-toggle="tab" href="#sizes"
                                        role="tab" aria-controls="sizes" aria-selected="false">Sizes</a> </li>
              <li class="nav-item" role="presentation"> <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images"
                                        role="tab" aria-controls="images" aria-selected="false">Images</a> </li>
              <li class="nav-item" role="presentation"> <a class="nav-link" id="ingredients-tab" data-bs-toggle="tab" href="#ingredients"
                                        role="tab" aria-controls="ingredients" aria-selected="false">Ingredients</a> </li>
              <li class="nav-item" role="presentation"> <a class="nav-link" id="description-tab" data-bs-toggle="tab" href="#description"
                                        role="tab" aria-controls="description" aria-selected="false">Description</a> </li>
              <li class="nav-item" role="presentation"> <a class="nav-link" id="seo-tab" data-bs-toggle="tab" href="#seo"
                                        role="tab" aria-controls="seo" aria-selected="false">SEO Content</a> </li>
            </ul>
            <hr />
            <div class="tab-content mt-5" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <input type="hidden" id="page_path" value="edit"/>
                      <label for="basicInput" class="label">Product Name</label>
                      <input type="text" class="form-control" placeholder="Enter Product Name" value="<?php echo e($rowData->product_name); ?>" name="product_name" id="product_name">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput" class="label">Category</label>
                      <select name="category_id" id="category_id" class="form-select choices" onchange="getSubCategories();">
                        <option value="">Select Category</option>
                        
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <option value="<?php echo e($category->id); ?>" <?php echo e($rowData->category_id == $category->id ?'selected':''); ?>><?php echo e($category->title); ?></option>
        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput" class="label">Sub Category</label>
                      <?php
                      $SubCategoriesArr = array();
                      if(!empty($rowData->sub_category_id)){
                      $SubCategoriesArr = explode(',',$rowData->sub_category_id);
                      }
                      ?>
                      <div id="subCategory">
                        <select name="sub_category_id[]" id="sub_category_id" class="choices form-select multiple-remove" multiple="multiple">
                          <option value="">Select Sub Category</option>
                          
                      		<?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                          		<option value="<?php echo e($subcategory->id); ?>" <?php echo e(in_array($subcategory->id, $SubCategoriesArr) ?'selected':''); ?>><?php echo e($subcategory->title); ?></option>
                          
                       		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput" class="label">Brand</label>
                      <select name="brand_id" id="brand_id" class="form-select">
                        <option value="">Select Brand</option>
                        
             			<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                        	<option value="<?php echo e($brand->id); ?>"  <?php echo e($rowData->brand_id == $brand->id ?'selected':''); ?>><?php echo e($brand->title); ?></option>
                        
             			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput" class="label">Product Type</label>
                      <select name="product_type" id="product_type" class="form-select">
                        
                    	<?php if($admin_type == 'Admin'): ?>
                                            
                        	<option value="GLOBAL" <?php echo e($rowData->product_type == "GLOBAL" ?'selected':''); ?>>GLOBAL</option>
                        
                      	<?php endif; ?>
                                            
                        <option value="PROPRITRY" <?php echo e($rowData->product_type == "PROPRITRY" ?'selected':''); ?>>PROPRITRY</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput">Product Varient</label>
                      <select name="product_varient" id="product_varient" class="form-select">
                        <option value="">Select Product Varient</option>
                        
                     	<?php $__currentLoopData = $productVarients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productVarient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                        	<option value="<?php echo e($productVarient->id); ?>" <?php echo e($rowData->product_varient == $productVarient->id ?'selected':''); ?>><?php echo e($productVarient->product_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput" class="label">HSN Code</label>
                      <input type="text" class="form-control" placeholder="Enter HSN Code" value="<?php echo e($rowData->hsn_code); ?>" name="hsn_code" id="hsn_code">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput" class="label">Product Quantity</label>
                      <input type="text" class="form-control" placeholder="Enter Product Quantity" value="<?php echo e($rowData->product_qty); ?>" name="product_qty" id="product_qty">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="basicInput">Out of stock</label>
                      <br />
                      <input type="checkbox" value="YES"  style="height:30px;width:30px;" <?php echo e($rowData->stock =='YES'?'checked':''); ?> name="stock" id="stock"> </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group  <?php echo e($rowData->stock =='YES'?'':'d-none'); ?>" id="stockDate">
                      <label for="basicInput">Out of Stock Date</label>
                      <br />
                      <input type="date" class="form-control"  value="<?php echo e($rowData->stock_date); ?>" name="stock_date" id="stock_date">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput" class="label">Ailment</label>
                      <select name="ailment_id[]" id="ailment_id" class="choices form-select multiple-remove" multiple="multiple">
                        
                        <?php
                        $AlimentsArr = array();
                        if(!empty($rowData->ailment_id)){
                            $AlimentsArr = explode(',',$rowData->ailment_id);
                        }
                        ?>
                        <?php $__currentLoopData = $ailments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ailment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                        	<option value="<?php echo e($ailment->id); ?>" <?php echo e(in_array($ailment->id, $AlimentsArr) ?'selected':''); ?>><?php echo e($ailment->title); ?></option>
                        
               			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput" class="label">Pack Size</label>
                      <fieldset>
                        <div class="input-group">
                          <select name="pack_unit" id="pack_unit" class="form-select" style="max-width: 150px;">
                            
                     		<?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            
                            	<option value="<?php echo e($unit->title); ?>" <?php echo e($unit->title == $rowData->pack_unit ?'selected':''); ?>><?php echo e($unit->title); ?></option>
                            
                			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    
                          </select>
                          <input type="text" name="pack_size" id="pack_size" value="<?php echo e($rowData->pack_size); ?>" class="form-control" placeholder="Enter Pack Size">
                        </div>
                      </fieldset>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="basicInput">Prescription Required</label>
                      <br />
                      <input type="checkbox" value="YES" style="height:30px;width:30px;" <?php echo e($rowData->is_prescription_required =='YES'?'checked':''); ?> name="is_prescription_required" id="is_prescription_required"> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput">Minimum Order Qty</label>
                      <input type="text" class="form-control" placeholder="Enter Minimum Order Qty" value="<?php echo e($rowData->minimum_order_qty); ?>" name="minimum_order_qty" id="minimum_order_qty">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput">Maximum Order Qty</label>
                      <input type="text" class="form-control" placeholder="Enter Maximum Order Qty" value="<?php echo e($rowData->maximum_order_qty); ?>" name="maximum_order_qty" id="maximum_order_qty">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput">Created</label>
                      <input type="text" class="form-control" readonly="readonly" value="<?php echo date('d M, Y h:i A',strtotime($rowData->created_at)); ?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="price" role="tabpanel"
                                aria-labelledby="price-tab">
                <div class="row">
                  <div class="row mb-2">
                    <div class="col-md-12">
                      <h5>Price</h5>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput" class="label">MRP</label>
                      <input type="text" class="form-control" placeholder="Enter MRP" value="<?php echo e($rowData->mrp); ?>" name="mrp" id="mrp" onkeyup="calculatePrice()">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput">Discount</label>
                      <input type="text" class="form-control" placeholder="Enter Discounted Price" value="<?php echo e($rowData->discounted_price); ?>" name="discounted_price" id="discounted_price" onkeyup="calculatePrice()">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput" class="label">List Price</label>
                      <input type="text" class="form-control" placeholder="Enter List Price" value="<?php echo e($rowData->list_price); ?>" name="list_price" id="list_price">
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-12">
                      <h5>Packaging Cost</h5>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput">Packaging Cost</label>
                      <input type="text" class="form-control" placeholder="Enter Packaging Cost" value="<?php echo e($rowData->packaging_cost); ?>" name="packaging_cost" id="packaging_cost">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <label for="basicInput">Packaging Cost</label>
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" <?php echo e($rowData->
                        packaging_cost_time =='One Time'?'checked':''); ?> name="packaging_cost_time" id="packaging_cost_time1" value="One Time">
                        <label class="form-check-label" for="packaging_cost_time1">One Time</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" <?php echo e($rowData->
                        packaging_cost_time =='Multiple Time'?'checked':''); ?> name="packaging_cost_time" id="packaging_cost_time2" value="Multiple Time">
                        <label class="form-check-label" for="packaging_cost_time2">Multiple Time</label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-12">
                      <h5>Tax</h5>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput">Tax</label>
                      <select type="text" class="form-select" value="" name="tax" id="tax" onchange="setTax();">
                        <option value="0">Select Tax</option>
                        
                            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <option value="<?php echo e($tax->tax_group); ?>" <?php echo e($rowData->tax == $tax->tax_group ?'selected':''); ?>><?php echo e($tax->tax_group); ?>%</option>
    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <!--<option value="other">Other</option>-->
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4 d-none" id="otherTax">
                    <div class="form-group">
                      <label for="basicInput">Other Tax</label>
                      <input type="text" class="form-control" placeholder="Enter Other Tax" value="" name="other_tax" id="other_tax">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="basicInput" class="w-100">Tax Included</label>
                      <input type="checkbox"  style="height:30px;width:30px;"value="YES" name="is_tax_included" <?php echo e($rowData->is_tax_included =='YES'?'checked':''); ?> id="is_tax_included"> </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-12">
                      <h5>Shipping Cost</h5>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput">Shipping Cost</label>
                      <input type="text" class="form-control" placeholder="Enter Shipping Cost" value="<?php echo e($rowData->shipping_cost); ?>" name="shipping_cost" id="shipping_cost">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="basicInput">Shipping Cost</label>
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" <?php echo e($rowData->shipping_cost_time =='One Time'?'checked':''); ?> type="radio" name="shipping_cost_time" id="shipping_cost1" value="One Time">
                        <label class="form-check-label" for="shipping_cost1">One Time</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" <?php echo e($rowData->shipping_cost_time =='Multiple Time'?'checked':''); ?> type="radio" name="shipping_cost_time" id="shipping_cost2" value="Multiple Time">
                        <label class="form-check-label" for="shipping_cost2">Multiple Time</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="basicInput" class="w-100">Free Shipping</label>
                      <input type="checkbox"  style="height:30px;width:30px;" value="YES" name="is_free_shipping" id="is_free_shipping"  <?php echo e($rowData->is_free_shipping =='YES'?'checked':''); ?>> </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="basicInput" class="w-100">Self-Ship</label>
                      <input type="checkbox"  style="height:30px;width:30px;" value="YES" name="is_self_ship" id="is_self_ship"  <?php echo e($rowData->is_self_ship =='YES'?'checked':''); ?>> </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="discounts" role="tabpanel"
                                aria-labelledby="discounts-tab">
                <div class="doctor_section">
                  <div class="row mb-2">
                    <div class="col-md-12">
                      <h5>Doctor Discounts</h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <label for="basicInput">Quantity</label>
                    </div>
                    <div class="col-md-2">
                      <label for="basicInput">Value</label>
                    </div>
                    <div class="col-md-3">
                      <label for="basicInput">Type</label>
                    </div>
                    <div class="col-md-3">
                      <label for="basicInput">User Group</label>
                    </div>
                  </div>
                  <?php if(count($drProductDiscounts) > 0): ?>
                  <?php $__currentLoopData = $drProductDiscounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $drProductDiscount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="row mt-2" id="dr_rowID<?php echo e($drProductDiscount->id); ?>">
                    <input type="hidden" value="<?php echo e($drProductDiscount->id); ?>" name="dr_disc_id[]"  id="dr_disc_id<?php echo e($drProductDiscount->id); ?>">
                    <div class="col-md-2">
                      <input type="tel" name="old_dr_qty[]"  class="form-control" value="<?php echo e($drProductDiscount->quantity); ?>">
                    </div>
                    <div class="col-md-2">
                      <input type="number" name="old_dr_val[]"  class="form-control" value="<?php echo e($drProductDiscount->value); ?>">
                    </div>
                    <div class="col-md-3">
                      <select name="old_dr_type[]" class="form-select">
                        <option value="Absolute" <?php echo e($drProductDiscount->discount_type == "Absolute" ?'selected':''); ?>>Absolute (₹)</option>
                        <option value="Percent" <?php echo e($drProductDiscount->discount_type == "Percent" ?'selected':''); ?>>Percent (%)</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <select name="old_dr_user_group[]" class="form-select">
                        <option value="All" <?php echo e($drProductDiscount->user_group == "All" ?'selected':''); ?>>All</option>
                        <option value="Guest" <?php echo e($drProductDiscount->user_group == "Guest" ?'selected':''); ?>>Guest</option>
                        <option value="Registered User" <?php echo e($drProductDiscount->user_group == "Registered User" ?'selected':''); ?>>Registered User</option>
                      </select>
                    </div>
                    <div class="col-md-2"> <a href="javascript:void(0);" onclick="deleteData('product_quantity_discounts','<?php echo e($drProductDiscount->id); ?>');" class="btn btn-sm btn-danger">Remove</a> </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  <div class="row <?php echo e(count($drProductDiscounts) == 0 ? '':'d-none'); ?>" id="dr_rowID0">
                    <div class="col-md-2">
                      <input type="tel" name="dr_qty[]"  class="form-control" placeholder="">
                    </div>
                    <div class="col-md-2">
                      <input type="number" name="dr_val[]"  class="form-control" placeholder="">
                    </div>
                    <div class="col-md-3">
                      <select name="dr_type[]" class="form-select">
                        <option value="Absolute">Absolute (₹)</option>
                        <option value="Percent">Percent (%)</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <select name="dr_user_group[]" class="form-select">
                        <option value="All">All</option>
                        <option value="Guest">Guest</option>
                        <option value="Registered User">Registered User</option>
                      </select>
                    </div>
                  </div>
                  <div id="addNewDoctorDis"></div>
                  <div class="row" >
                    <div class="col-md-12 text-center mt-5"> <a href="javascript:void(0);" onclick="addMoreDRDiscount();" class="btn btn-sm btn-success">Add More</a> </div>
                  </div>
                </div>
                <div class="user_section">
                  <div class="row mb-2">
                    <div class="col-md-12">
                      <h5>User Discounts</h5>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <label for="basicInput">Quantity</label>
                    </div>
                    <div class="col-md-2">
                      <label for="basicInput">Value</label>
                    </div>
                    <div class="col-md-3">
                      <label for="basicInput">Type</label>
                    </div>
                    <div class="col-md-3">
                      <label for="basicInput">User Group</label>
                    </div>
                  </div>
                  <?php if(count($userProductDiscounts) > 0): ?>
                  <?php $__currentLoopData = $userProductDiscounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $userProductDiscount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="row mt-2" id="user_rowID<?php echo e($userProductDiscount->id); ?>">
                    <input type="hidden" value="<?php echo e($userProductDiscount->id); ?>" name="user_disc_id[]"  id="user_disc_id<?php echo e($userProductDiscount->id); ?>">
                    <div class="col-md-2">
                      <input type="tel" name="old_user_qty[]"  class="form-control" value="<?php echo e($userProductDiscount->quantity); ?>">
                    </div>
                    <div class="col-md-2">
                      <input type="number" name="old_user_val[]"  class="form-control" value="<?php echo e($userProductDiscount->value); ?>">
                    </div>
                    <div class="col-md-3">
                      <select name="old_user_type[]" class="form-select">
                        <option value="Absolute" <?php echo e($userProductDiscount->discount_type == "Absolute" ?'selected':''); ?>>Absolute (₹)</option>
                        <option value="Percent" <?php echo e($userProductDiscount->discount_type == "Percent" ?'selected':''); ?>>Percent (%)</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <select name="old_user_user_group[]" class="form-select">
                        <option value="All" <?php echo e($userProductDiscount->user_group == "All" ?'selected':''); ?>>All</option>
                        <option value="Guest" <?php echo e($userProductDiscount->user_group == "Guest" ?'selected':''); ?>>Guest</option>
                        <option value="Registered User" <?php echo e($userProductDiscount->user_group == "Registered User" ?'selected':''); ?>>Registered User</option>
                      </select>
                    </div>
                    <div class="col-md-2"> <a href="javascript:void(0);" onclick="deleteData('product_quantity_discounts','<?php echo e($userProductDiscount->id); ?>');" class="btn btn-sm btn-danger">Remove</a> </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  <div class="row <?php echo e(count($userProductDiscounts) == 0 ? '':'d-none'); ?>" id="user_rowID0">
                    <div class="col-md-2">
                      <input type="tel" name="user_qty[]"  class="form-control" placeholder="">
                    </div>
                    <div class="col-md-2">
                      <input type="number" name="user_val[]"  class="form-control" placeholder="">
                    </div>
                    <div class="col-md-3">
                      <select name="user_type[]" class="form-select">
                        <option value="Absolute">Absolute (₹)</option>
                        <option value="Percent">Percent (%)</option>
                      </select>
                    </div>
                    <div class="col-md-3">
                      <select name="user_user_group[]" class="form-select">
                        <option value="All">All</option>
                        <option value="Guest">Guest</option>
                        <option value="Registered User">Registered User</option>
                      </select>
                    </div>
                  </div>
                  <div id="addNewUserDis"></div>
                  <div class="row" >
                    <div class="col-md-12 text-center mt-5"> <a href="javascript:void(0);" onclick="addMoreUserDiscount();" class="btn btn-sm btn-success">Add More</a> </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="permissions" role="tabpanel"
                                aria-labelledby="permissions-tab">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput" style="vertical-align: top;" class="w-100">Show All Users</label>
                      <input type="checkbox"  style="height:30px;width:30px;" <?php echo e($rowData->
                      is_show_all_user =='YES'?'checked':''); ?> value="YES" name="is_show_all_user" id="is_show_all_user"> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput" style="vertical-align: top;" class="w-100">Show Guest User</label>
                      <input type="checkbox"  style="height:30px;width:30px; " <?php echo e($rowData->
                      is_show_guest_user =='YES'?'checked':''); ?> value="YES" name="is_show_guest_user" id="is_show_guest_user"> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput" style="vertical-align: top;" class="w-100">Show Register User</label>
                      <input type="checkbox"  style="height:30px;width:30px; " value="YES" <?php echo e($rowData->
                      is_show_register_user =='YES'?'checked':''); ?> name="is_show_register_user" id="is_show_register_user"> </div>
                  </div>
                  <?php if($admin_type == 'Admin'): ?>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput" style="vertical-align: top;">Vendor</label>
                      <select name="vendor_id" id="vendor_id" class="form-select">
                        <option value="0">All Vendor</option>
                        
                            <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <option value="<?php echo e($vendor->id); ?>" <?php echo e($rowData->vendor_id == $vendor->id ?'selected':''); ?>><?php echo e($vendor->name); ?></option>
        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                      </select>
                    </div>
                  </div>
                  <?php else: ?>
                  <input type="hidden" name="vendor_id" id="vendor_id" value="<?php echo e($admin_id); ?>"/>
                  <?php endif; ?> </div>
              </div>
              <div class="tab-pane fade" id="sizes" role="tabpanel"
                                aria-labelledby="sizes-tab">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="basicInput" class="label">Product Weight</label>
                      <input type="text" class="form-control" placeholder="Enter Product Weight" value="<?php echo e($rowData->product_weight); ?>" name="product_weight" id="product_weight">
                      <small>Product weight 0.000 kg</small> </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="basicInput" class="label">Product Width</label>
                      <input type="text" class="form-control" placeholder="Enter Product Width" value="<?php echo e($rowData->product_width); ?>" name="product_width" id="product_width">
                      <small>Product width cm</small> </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="basicInput" class="label">Product Height</label>
                      <input type="text" class="form-control" placeholder="Enter Product Height" value="<?php echo e($rowData->product_height); ?>" name="product_height" id="product_height">
                      <small>Product height cm</small> </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="basicInput" class="label">Product Length</label>
                      <input type="text" class="form-control" placeholder="Enter Product Length" value="<?php echo e($rowData->product_length); ?>" name="product_length" id="product_length">
                      <small>Product length cm</small> </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                <div class="row imgSection">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="basicInput">Product Images (Click to the box for multiple image upload)</label>
                      <div id="my-awesome-dropzone" class="dropzone form-control"></div>
                      <small>Click to the box for multiple image upload</small> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput">Product Image Urls</label>
                      <textarea name="image_urls" id="image_urls" class="form-control" placeholder="https://www.aayushbharat.com/image1.jpg, https://www.aayushbharat.com/image2.jpg" rows="5"></textarea>
                      <small>Enter Image URLs with comma separated</small> </div>
                  </div>
                  <div class="col-lg-12" id="imgorder" style="position:relative;">
                    <hr />
                    <?php if(isset($productImages) && !empty($productImages)): ?>
                    <?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($val->image)): ?>
                    	<input type="hidden" id="images_field" class="images_field" value="1"/>
                    	<div style="position:relative; display:inline-block" id="item_<?php echo e($val->id); ?>"> <img src="<?php echo e(URL::asset('public/img/products/')); ?>/<?php echo $val->image; ?>" class="img-rounded" title="<?php echo e($val->image_title); ?>" alt="<?php echo e($val->image_alt); ?>" style="margin: 3px 3px 40px 7px;width: 150px;height: auto;"> <a class="btn btn-danger" title="Remove Product Image" href="javascript:void(0);" style="padding: 5px 6px 0; position: absolute; bottom: 0px; right: 4px;" aria-label="Delete" onclick="deleteData('product_images','<?php echo e($val->id); ?>');"> <i class="bi bi-trash" aria-hidden="true"></i> </a>
                      	<input type="text" name="img_alt_title[]" id="" placeholder="Alt Title" class="ordering" value="<?php echo e($val->img_alt_title); ?>" style="width: 110px;max-width: 100%;height: auto;bottom: 0px; left:5px;position: absolute;"/>
                      	<input type="hidden" name="orderingEditId[]" value="<?php echo e($val->id); ?>"/>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?> </div>
                </div>
                <hr />
                <!--------------------insert multiple labels-------------->
                <div class="row imgSection">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="basicInput">Label Images (Click to the box for multiple image upload)</label>
                      <div id="my-awesome-dropzone-product-label" class="dropzone form-control"></div>
                      <small>Click to the box for multiple image upload</small> </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="basicInput">Label Image Urls</label>
                      <textarea name="label_urls" id="label_urls" class="form-control" placeholder="https://www.aayushbharat.com/image1.jpg, https://www.aayushbharat.com/image2.jpg" rows="5"></textarea>
                      <small>Enter Image URLs with comma separated</small> </div>
                  </div>
                  <div class="col-lg-12" id="imgorder" style="position:relative;">
                    <hr />
                    <?php if(isset($productLabelImages) && !empty($productLabelImages)): ?>
                    <?php $__currentLoopData = $productLabelImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($val->image)): ?>
                    	<div style="position:relative; display:inline-block" id="item_<?php echo e($val->id); ?>"> <img src="<?php echo e(URL::asset('public/img/labels/')); ?>/<?php echo $val->image; ?>" class="img-rounded" title="<?php echo e($val->image_title); ?>" alt="<?php echo e($val->image_alt); ?>" style="margin: 3px 3px 40px 7px;width: 150px;height: auto;"> <a class="btn btn-danger" title="Remove Product Label Image" href="javascript:void(0);" style="padding: 5px 6px 0; position: absolute; bottom: 0px; right: 4px;" aria-label="Delete" onclick="deleteData('product_label_images','<?php echo e($val->id); ?>');"> <i class="bi bi-trash" aria-hidden="true"></i> </a>
                      <input type="text" name="img_alt_title[]" id="" placeholder="Alt Title" class="ordering" value="<?php echo e($val->img_alt_title); ?>" style="width: 110px;max-width: 100%;height: auto;bottom: 0px; left:5px;position: absolute;"/>
                      <input type="hidden" name="orderingEditId[]" value="<?php echo e($val->id); ?>"/>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?> </div>
                </div>
                <!----------------------------------------------------> 
              </div>
              <div class="tab-pane fade" id="ingredients" role="tabpanel"
                                aria-labelledby="ingredients-tab">
                <div class="row">
                  <div class="col-md-3">
                    <label for="basicInput" class="label">Ingredient Name</label>
                  </div>
                  <div class="col-md-5">
                    <label for="basicInput" class="label">Ingredient Description</label>
                  </div>
                </div>
                <?php if(count($productIngredients) > 0): ?>
                <?php $__currentLoopData = $productIngredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productIngredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row mt-2" id="item_<?php echo e($productIngredient->id); ?>">
                  <input type="hidden" value="<?php echo e($productIngredient->id); ?>" name="ingredient_id[]"  id="indID<?php echo e($productIngredient->id); ?>">
                  <div class="col-md-3">
                    <select name="old_ingredient_name[]" class="ingredient_name choices form-select">
                      <option value="">Select Ingredient</option>
                      
                        <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                                <option value="<?php echo e($ingredient->title); ?>" <?php echo e($productIngredient->ingredient_name == $ingredient->title ?'selected':''); ?>><?php echo e($ingredient->title); ?></option>
  
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                    </select>
                  </div>
                  <div class="col-md-6">
                    <textarea name="old_description[]" id="description<?php echo e($key); ?>"  class="description form-control" rows="2" placeholder="Enter Ingredient Description"><?php echo e($productIngredient->description); ?></textarea>
                  </div>
                  <div class="col-md-2"> 
                  <a href="javascript:void(0);" onclick="deleteData('product_ingredients','<?php echo e($productIngredient->id); ?>');" class="btn btn-sm btn-danger">Remove</a> </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="row <?php echo e(count($productIngredients) == 0 ? '':'d-none'); ?>" id="item_0">
                  <div class="col-md-3">
                    <select name="ingredient_name[]" class="ingredient_name choices form-select">
                      <option value="">Select Ingredient</option>
                      
                        <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <option value="<?php echo e($ingredient->title); ?>"><?php echo e($ingredient->title); ?></option>
      
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                    </select>
                  </div>
                  <div class="col-md-6">
                    <textarea name="description[]"  class="description form-control" rows="2" placeholder="Enter Ingredient Description"></textarea>
                  </div>
                  <div class="col-md-1"> <a href="javascript:void(0);" onclick="deleteData('product_ingredients','0');" class="btn btn-sm btn-danger">Remove</a></div>
                </div>
                <div id="addNewIngredient"></div>
                <div class="row" >
                  <div class="col-md-12 text-center mt-5"> <a href="javascript:void(0);" onclick="addMore();" class="btn btn-sm btn-success">Add More</a> </div>
                </div>
              </div>
              <div class="tab-pane fade" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="basicInput" class="label">Short Description</label>
                      <textarea name="short_description" id="short_description" class="form-control editorBox" rows="3"><?php echo e($rowData->short_description); ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="basicInput" class="label">Description</label>
                      <textarea name="long_description" id="long_description" class="form-control editorBox" rows="3"><?php echo e($rowData->long_description); ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="seo" role="tabpanel"
                                aria-labelledby="seo-tab">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="basicInput" class="label">SEO Title</label>
                      <input type="text" name="seo_title" id="seo_title" class="form-control" value="<?php echo e($rowData->seo_title); ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="basicInput" class="label">SEO Keywords</label>
                      <input type="text" name="seo_keywords" id="seo_keywords" class="form-control" value="<?php echo e($rowData->seo_keywords); ?>">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="basicInput" class="label">SEO Description</label>
                      <textarea type="text" name="seo_description" id="seo_description" class="form-control" ><?php echo e($rowData->seo_description); ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-3 col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="basicInput">Special Notes</label>
                  <textarea name="special_notes" id="special_notes" class="form-control" rows="10"><?php echo e($rowData->special_notes); ?></textarea>
                </div>
              </div>
              <div class="text-left">
                <div> 
                  <!--begin::Submit button-->
                  <button type="button" id="form_submit1" class="btn btn-sm btn-primary fw-bolder me-3 my-2"> <span class="indicator-label" id="formSubmit">Save</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>
                  <button type="button" id="form_submit" class="btn btn-sm btn-success fw-bolder me-3 my-2"> <span class="indicator-label" id="formSubmit">Submit</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>
                  <!--end::Submit button--> 
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
        <?php if($rowData->moderation_decline_reason != ''): ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">                    	
                    	<div class="form-group">
                          <p><?php echo $rowData->moderation_decline_reason; ?></p>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if(isset($productsDeclineReasons) && $productsDeclineReasons->count() > 0): ?>
        <div class="card">
          <div class="card-body">
            <div class="row">
            <div class="col-md-12"> 
            	<b>Decline Reasons</b>
            	<?php $__currentLoopData = $productsDeclineReasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $decline_reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
              		<div class="form-group">
                      <p><?php echo $decline_reason->reason; ?></p>
                      <p><strong>Date Time:</strong> <?php echo date('d M, Y h:i A',strtotime($decline_reason->created_at)); ?></p>
                    </div>
              		<hr />
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
              
        
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    	<div class="form-group" id="error_refresh_div"></div>
                        <div class="form-group" id="error_div" style="color:#F00;">
                            <div id="info_error_div"></div>
                            <div id="price_error_div"></div>
                            <div id="qtydis_error_div"></div>
                            <div id="permission_error_div"></div>
                            <div id="sizes_error_div"></div>
                            <div id="image_error_div"></div>
                            <div id="ingrediants_error_div"></div>
                            <div id="description_error_div"></div>
                            <div id="seo_error_div"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
</form>

<!-- end plugin js -->
<link rel="stylesheet" href="<?php echo e(asset('public/js/dropzone/dist/dropzone.css')); ?>"/>
<script type="text/javascript" src="<?php echo e(asset('public/js/dropzone/dist/dropzone.js')); ?>"></script> 
<script>
    let ask = true;
    window.onbeforeunload = function (e) {
        if(!ask) return null
        e = e || window.event;
        //old browsers
        if (e) {e.returnValue = 'Sure?';}
        //safari, chrome(chrome ignores text)
        return 'Sure?';
    };

    let saveDataURL = "<?php echo e(url('/admin/edit-product/'.$row_id)); ?>";
	let returnURL = "<?php echo e(url('/admin/edit-product/'.$row_id)); ?>";
   // let returnURL = "<?php echo e(url('/admin/products')); ?>";
    let getServicesURL = "<?php echo e(url('/admin/get-sub-categories')); ?>";
    let saveImage = "<?php echo e(url('/admin/upload-product-images')); ?>";
	let saveLabel = "<?php echo e(url('/admin/upload-product-label-images')); ?>";
    let editDataURL = "<?php echo e(url('/admin/edit-product')); ?>";

    function getSubCategories(){
        var category_id = $('#category_id').val();
        $('#sub_category_id').html('<option value="">Select Sub Category</option>');
        if(category_id  > 0){
            $.ajax({
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: getServicesURL,
            data: {category_id:category_id},
            success: function(response){
                $('#subCategory').html("<select name='sub_category_id[]' id='sub_category_id'  class='choices form-select multiple-remove' multiple='multiple'>"+response+"</select>");
                var choices = new Choices($("#sub_category_id")[0]);
            }
        });
        }
    }
	/////////////// upload product ///////////////////
    $('#my-awesome-dropzone').attr('class', 'dropzone');
    var myDropzone = new Dropzone('#my-awesome-dropzone', {
        url: saveImage,
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
        forceFallback: false,
        createImageThumbnails: true,
        maxThumbnailFilesize: 5,
        acceptedFiles: ".jpeg,.jpg,.webp",
        //acceptedFiles: "image/*",
        autoProcessQueue: true,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        init: function() {
            this.on('thumbnail', function(file) {
                if (file.width < 300 || file.height < 300){
                    //file.rejectDimensions();
                } else {
                    //file.acceptDimensions();
                }
				file.acceptDimensions();
            });
        },
        accept: function(file, done) {
            file.acceptDimensions = done;
            file.rejectDimensions = function() {
                done('The image must be at least 300 x 300px')
            };
        },
        success: function(file, response) {
            var obj = JSON.parse(response);
            $('#pageForm').append('<input type="hidden" name="images[]" class="images_field" value="'+obj.data+'">');
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
        count++;
    });

    myDropzone.on("removedfile", function(file) {
        var fname = file.name;
        fname2 = fname.trim().replace(/["~!@#$%^&*\(\)_+=`{}\[\]\|\\:;'<>,.\/?"\- \t\r\n]+/g, '_');
    });

    myDropzone.on("addedfile", function(file) {

    });
	//////////////////////////////////////////////////
	
	
	/////////////// upload product label ///////////////////
    $('#my-awesome-dropzone-product-label').attr('class', 'dropzone');
    var myDropzone = new Dropzone('#my-awesome-dropzone-product-label', {
        url: saveLabel,
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
        forceFallback: false,
        createImageThumbnails: true,
        maxThumbnailFilesize: 5,
        acceptedFiles: ".jpeg,.jpg,.webp",
        //acceptedFiles: "image/*",
        autoProcessQueue: true,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        init: function() {
            this.on('thumbnail', function(file) {
                if (file.width < 300 || file.height < 300){
                    //file.rejectDimensions();
                } else {
                    //file.acceptDimensions();
                }
				file.acceptDimensions();
            });
        },
        accept: function(file, done) {
            file.acceptDimensions = done;
            file.rejectDimensions = function() {
                done('The image must be at least 300 x 300px')
            };
        },
        success: function(file, response) {
            var obj = JSON.parse(response);
            $('#pageForm').append('<input type="hidden" name="labels[]" value="'+obj.data+'">');
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
        count++;
    });

    myDropzone.on("removedfile", function(file) {
        var fname = file.name;
        fname2 = fname.trim().replace(/["~!@#$%^&*\(\)_+=`{}\[\]\|\\:;'<>,.\/?"\- \t\r\n]+/g, '_');
    });

    myDropzone.on("addedfile", function(file) {

    });
	//////////////////////////////////////////////////
	
    var counter = <?php echo e(count($productIngredients)); ?>;
    var ingredientOptions = "";
    <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        ingredientOptions +='<option value="<?php echo e($ingredient->title); ?>"><?php echo e($ingredient->title); ?></option>';
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    function addMore(){
        $('#addNewIngredient').append('<div class="row mt-2" id="item_'+counter+'">\
            <div class="col-md-3">\
            <select name="ingredient_name[]" class="choices form-select" id="ingredient_name_'+counter+'">\
                <option value="">Select Ingredient</option>'+ingredientOptions+'</select>\
            </div>\
            <div class="col-md-6"><textarea name="description[]"  class="form-control" rows="2" placeholder="Enter Ingredient Description"></textarea></div>\
            <div class="col-md-1"><a href="javascript:void(0);" onclick="removeIngredient('+counter+');" class="btn btn-sm btn-danger">Remove</a></div>\
        </div>');
        var choices = new Choices($("#ingredient_name_"+counter)[0]);
        counter++;
    }
    function removeIngredient(item_){
        $('#item_000'+item_).remove();
    }
    $(document).ready(function(){
        $("#stock").click(function() {
            $('#stock_date').val('');
            if($(this).is(":checked")) {
                $("#stockDate").removeClass('d-none');
            } else {
                $("#stockDate").addClass('d-none');
            }
        });
    });
    function setTax(){
        var tax = $('#tax').val();
        $('#other_tax'). val();
        $("#otherTax").addClass('d-none');
        if(tax == "other"){
            $("#otherTax").removeClass('d-none');
        }
    }
    function calculatePrice(){
        var MRP = $('#mrp').val();
        var discountedPrice = $('#discounted_price').val();
        var listPrice = MRP;
        if(MRP > 0 && discountedPrice > 0){
            var discountPrice = parseFloat(discountedPrice / 100) * parseFloat(MRP);
            if(parseFloat(discountPrice) > 0){
                listPrice = parseFloat(MRP) - parseFloat(discountPrice);
            }

        }
        $('#list_price').val(listPrice.toFixed(2));

    }

    $(function(){
        $( "#imgorder" ).sortable({
            update: function(){
                setImgOrdering();
            }
        });
    });

    function setImgOrdering(){
            $.ajaxSetup({
                headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
			var order = $("#imgorder").sortable("serialize");
			$.post("<?php echo e(url('/admin/product/set-img-ordering/')); ?>",order,function(theResponse){
			});
		}

        var dr_counter = 1;
    function addMoreDRDiscount(){
        $('#addNewDoctorDis').append('<div class="row mt-2" id="dr_rowID'+dr_counter+'">\
        <div class="col-md-2"> <input type="tel" name="dr_qty[]"  class="form-control" placeholder=""></div>\
        <div class="col-md-2"> <input type="number" name="dr_val[]"  class="form-control" placeholder=""></div>\
        <div class="col-md-3">\
            <select name="dr_type[]" class="form-select">\
                <option value="Absolute">Absolute (₹)</option>\
                <option value="Percent">Percent (%)</option>\
            </select>\
        </div>\
        <div class="col-md-3">\
            <select name="dr_user_group[]" class="form-select">\
                <option value="All">All</option>\
                <option value="Guest">Guest</option>\
                <option value="Registered User">Registered User</option>\
            </select>\
        </div>\
            <div class="col-md-2"><a href="javascript:void(0);" onclick="removeDrDis('+dr_counter+');" class="btn btn-sm btn-danger">Remove</a></div>\
        </div>');
        counter++;
    }
    function removeDrDis(rowID){
        $('#dr_rowID'+rowID).remove();
    }

    var user_counter = 1;
    function addMoreUserDiscount(){
        $('#addNewUserDis').append('<div class="row mt-2" id="user_rowID'+user_counter+'">\
        <div class="col-md-2"> <input type="tel" name="user_qty[]"  class="form-control" placeholder=""></div>\
        <div class="col-md-2"> <input type="number" name="user_val[]"  class="form-control" placeholder=""></div>\
        <div class="col-md-3">\
            <select name="user_type[]" class="form-select">\
                <option value="Absolute">Absolute (₹)</option>\
                <option value="Percent">Percent (%)</option>\
            </select>\
        </div>\
        <div class="col-md-3">\
            <select name="user_user_group[]" class="form-select">\
                <option value="All">All</option>\
                <option value="Guest">Guest</option>\
                <option value="Registered User">Registered User</option>\
            </select>\
        </div>\
            <div class="col-md-2"><a href="javascript:void(0);" onclick="removeUserDis('+user_counter+');" class="btn btn-sm btn-danger">Remove</a></div>\
        </div>');
        counter++;
    }
    function removeUserDis(rowID){
        $('#user_rowID'+rowID).remove();
    }
</script>
<style>
 .dropzone {
    border: 1px solid #dce7f1;
}
</style>
<script src="<?php echo e(asset('public/admin/js/pages/products/add-page.js')); ?>"></script> 
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/products/edit-page.blade.php ENDPATH**/ ?>