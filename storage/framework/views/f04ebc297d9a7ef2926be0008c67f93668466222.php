

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
                    <h3>Add New Product</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/products')); ?>">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">Info</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="price-tab" data-bs-toggle="tab" href="#price"
                                        role="tab" aria-controls="price" aria-selected="false">Prices</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="discounts-tab" data-bs-toggle="tab" href="#discounts"
                                        role="tab" aria-controls="discounts" aria-selected="false">Quantity Discounts</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="permissions-tab" data-bs-toggle="tab" href="#permissions"
                                        role="tab" aria-controls="permissions" aria-selected="false">Permissions</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="sizes-tab" data-bs-toggle="tab" href="#sizes"
                                        role="tab" aria-controls="sizes" aria-selected="false">Sizes</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images"
                                        role="tab" aria-controls="images" aria-selected="false">Images</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="ingredients-tab" data-bs-toggle="tab" href="#ingredients"
                                        role="tab" aria-controls="ingredients" aria-selected="false">Ingredients</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="description-tab" data-bs-toggle="tab" href="#description"
                                        role="tab" aria-controls="description" aria-selected="false">Description</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="seo-tab" data-bs-toggle="tab" href="#seo"
                                        role="tab" aria-controls="seo" aria-selected="false">SEO Content</a>
                                </li>
                            </ul>
                            <hr />
                            <div class="tab-content mt-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        	<input type="hidden" id="page_path" value="add"/>
                                            <label for="basicInput" class="label">Product Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Name" value="" name="product_name" id="product_name">
                                            <span id="product_nameError" style="color:#F00"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" class="label">Category</label>
                                            <select name="category_id" id="category_id" class="form-select choices" onchange="getSubCategories();">
                                            <option value="">Select Category</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>                                            
                                        </div>
                                        <span id="category_idError" style="color:#F00"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" class="label">Sub Category</label>
                                            <div id="subCategory">
                                                <select name="sub_category_id[]" id="sub_category_id" class="choices form-select multiple-remove" multiple="multiple">
                                                <option value="">Select Sub Category</option>
                                                </select>
                                            </div>
                                            <span id="sub_category_idError" style="color:#F00"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" class="label">Brand</label>
                                            <select name="brand_id" id="brand_id" class="form-select">
                                            <option value="">Select Brand</option>
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span id="brand_idError" style="color:#F00"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" class="label">
                                            <label for="basicInput" class="label">Product Type</label>
                                            <select name="product_type" id="product_type" class="form-select">
                                            <?php if($admin_type == 'Admin'): ?>
                                            <option value="GLOBAL">GLOBAL</option>
                                            <?php endif; ?>
                                            <option value="PROPRITRY">PROPRITRY</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Product Varient</label>
                                            <select name="product_varient" id="product_varient" class="form-select">
                                            <option value="">Select Product Varient</option>
                                            <?php $__currentLoopData = $productVarients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productVarient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($productVarient->id); ?>"><?php echo e($productVarient->product_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" class="label">
                                            <label for="basicInput" class="label">HSN Code</label>
                                            <input type="text" class="form-control" placeholder="Enter HSN Code" value="" name="hsn_code" id="hsn_code">
                                            <span id="hsn_codeError" style="color:#F00"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" class="label">Product Quantity</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Quantity" value="" name="product_qty" id="product_qty">
                                            <span id="product_qtyError" style="color:#F00"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="basicInput">Out of stock</label><br />
                                            <input type="checkbox" value="YES"  style="height:30px;width:30px;" name="stock" id="stock">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group d-none" id="stockDate">
                                            <label for="basicInput">Out of Stock Date</label><br />
                                            <input type="date" class="form-control"  value="" name="stock_date" id="stock_date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" class="label">Ailment</label>
                                            <select name="ailment_id[]" id="ailment_id" class="choices form-select multiple-remove" multiple="multiple">
                                            <?php $__currentLoopData = $ailments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ailment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($ailment->id); ?>"><?php echo e($ailment->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>                                            
                                        </div>
                                        <span id="ailment_idError" style="color:#F00"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" class="label">Pack Size</label>
                                            <fieldset>
                                                <div class="input-group">
                                                    <select name="pack_unit" id="pack_unit" class="form-select" style="max-width: 150px;">
                                                        <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($unit->title); ?>"><?php echo e($unit->title); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <input type="text" name="pack_size" id="pack_size" value="" class="form-control" placeholder="Enter Pack Size">                                                </div>
                                                    <span id="pack_sizeError" style="color:#F00"></span>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="basicInput">Prescription Required</label><br />
                                            <input type="checkbox" value="YES" style="height:30px;width:30px;" name="is_prescription_required" id="is_prescription_required">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Minimum Order Qty</label>
                                            <input type="text" class="form-control" placeholder="Enter Minimum Order Qty" value="" name="minimum_order_qty" id="minimum_order_qty">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Maximum Order Qty</label>
                                            <input type="text" class="form-control" placeholder="Enter Maximum Order Qty" value="" name="maximum_order_qty" id="maximum_order_qty">
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
                                                <input type="text" class="form-control" placeholder="Enter MRP" value="" name="mrp" id="mrp" onkeyup="calculatePrice()">
                                                <span id="mrpError" style="color:#F00"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">Discount</label>
                                                <input type="text" class="form-control" placeholder="Enter Discounted Price" value="" name="discounted_price" id="discounted_price" onkeyup="calculatePrice()">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput" class="label">List Price</label>
                                                <input type="text" class="form-control" placeholder="Enter List Price" value="" name="list_price" id="list_price">
                                                <span id="list_priceError" style="color:#F00"></span>
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
                                                <input type="text" class="form-control" placeholder="Enter Packaging Cost" value="" name="packaging_cost" id="packaging_cost">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                        <label for="basicInput">Packaging Cost</label>
                                            <div class="form-group">                                                
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" checked="true" name="packaging_cost_time" id="packaging_cost_time1" value="One Time">
                                                    <label class="form-check-label" for="packaging_cost_time1">One Time</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="packaging_cost_time" id="packaging_cost_time2" value="Multiple Time">
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
                                                    <option value="<?php echo e($tax->tax_group); ?>"><?php echo e($tax->tax_group); ?>%</option>
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
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="basicInput" class="w-100">Tax Included</label>
                                            <input type="checkbox"  style="height:30px;width:30px;"value="YES" name="is_tax_included" id="is_tax_included">
                                        </div>
                                    </div>
									<div class="row mb-2">
                                        <div class="col-md-12">
                                            <h5>Shipping Cost</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Shipping Cost</label>
                                            <input type="text" class="form-control" placeholder="Enter Shipping Cost" value="" name="shipping_cost" id="shipping_cost">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="basicInput">Shipping Cost</label>
                                        <div class="form-group">                                                
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" checked="true" name="shipping_cost_time" id="shipping_cost1" value="One Time">
                                                <label class="form-check-label" for="shipping_cost1">One Time</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="shipping_cost_time" id="shipping_cost2" value="Multiple Time">
                                                <label class="form-check-label" for="shipping_cost2">Multiple Time</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="basicInput" class="w-100">Free Shipping</label>
                                            <input type="checkbox"  style="height:30px;width:30px;" value="YES" name="is_free_shipping" id="is_free_shipping">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="basicInput" class="w-100">Self-Ship</label>
                                            <input type="checkbox"  style="height:30px;width:30px;" value="YES" name="is_self_ship" id="is_self_ship">
                                        </div>
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
                                        <div class="col-md-2"> <label for="basicInput">Quantity</label> </div>
                                        <div class="col-md-2"> <label for="basicInput">Value</label> </div>
                                        <div class="col-md-3"> <label for="basicInput">Type</label> </div>
                                        <div class="col-md-3"> <label for="basicInput">User Group</label> </div>
                                    </div>
                                    <div class="row" id="dr_rowID0">
                                        <div class="col-md-2"> <input type="tel" name="dr_qty[]"  class="form-control" placeholder=""></div>
                                        <div class="col-md-2"> <input type="number" name="dr_val[]"  class="form-control" placeholder=""></div>
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
                                        <div class="col-md-2"> <a href="javascript:void(0);" onclick="addMoreDRDiscount();" class="btn btn-sm btn-success">Add More</a></div>
                                    </div>
                                    <div id="addNewDoctorDis">
                                    </div>
                                </div>

                                <div class="user_section">
                                    <div class="row ">
                                        <div class="col-md-12 mb-2">
                                            <h5 class="pt-5">User Discounts</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2"> <label for="basicInput">Quantity</label> </div>
                                        <div class="col-md-2"> <label for="basicInput">Value</label> </div>
                                        <div class="col-md-3"> <label for="basicInput">Type</label> </div>
                                        <div class="col-md-3"> <label for="basicInput">User Group</label> </div>
                                    </div>
                                    <div class="row" id="user_rowID0">
                                        <div class="col-md-2"> <input type="tel" name="user_qty[]"  class="form-control" placeholder=""></div>
                                        <div class="col-md-2"> <input type="number" name="user_val[]"  class="form-control" placeholder=""></div>
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
                                        <div class="col-md-2"> <a href="javascript:void(0);" onclick="addMoreUserDiscount();" class="btn btn-sm btn-success">Add More</a></div>
                                    </div>
                                    <div id="addNewUserDis">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="permissions" role="tabpanel"
                                aria-labelledby="permissions-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" style="vertical-align: top;" class="w-100">Show All Users</label>
                                            <input type="checkbox"  style="height:30px;width:30px;" value="YES" name="is_show_all_user" id="is_show_all_user">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" style="vertical-align: top;" class="w-100">Show Guest User</label>
                                            <input type="checkbox"  style="height:30px;width:30px; " value="YES" name="is_show_guest_user" id="is_show_guest_user">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" style="vertical-align: top;" class="w-100">Show Register User</label>
                                            <input type="checkbox"  style="height:30px;width:30px; " value="YES" name="is_show_register_user" id="is_show_register_user">
                                        </div>
                                    </div>
                                    <?php if($admin_type == 'Admin'): ?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" style="vertical-align: top;">Vendor</label>
                                            <select name="vendor_id" id="vendor_id" class="form-select">
                                            <option value="0">All Vendor</option>
                                            <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <input type="hidden" name="vendor_id" id="vendor_id" value="<?php echo e($admin_id); ?>"/>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sizes" role="tabpanel"
                                aria-labelledby="sizes-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput" class="label">Product Weight</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Weight" value="" name="product_weight" id="product_weight">
                                            <small>Product weight 0.000 kg</small>
                                            <span id="product_weightError" style="color:#F00"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput" class="label">Product Width</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Width" value="" name="product_width" id="product_width">
                                            <small>Product width cm</small>
                                            <span id="product_widthError" style="color:#F00"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput" class="label">Product Height</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Height" value="" name="product_height" id="product_height">
                                            <small>Product height cm</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput" class="label">Product Length</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Length" value="" name="product_length" id="product_length">
                                            <small>Product length cm</small>
                                            <span id="product_lengthError" style="color:#F00"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="images" role="tabpanel"
                                aria-labelledby="images-tab">
                                <div class="row imgSection">
                                    <div class="col-md-8">
                                        <div class="form-group" class="label">
                                            <label for="basicInput">Images (Click to the box for multiple image upload)</label>
                                            <div id="my-awesome-dropzone" class="dropzone form-control"></div>
                                            <small>Click to the box for multiple image upload</small>
                                            <span id="imageError" style="color:#F00"></span>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="basicInput">Image Urls</label>
                                        <textarea name="image_urls" id="image_urls" class="form-control" placeholder="https://www.aayushbharat.com/image1.jpg, https://www.aayushbharat.com/image2.jpg" rows="5"></textarea>
                                        <small>Enter Image URLs with comma separated</small>
                                    </div>
                                </div>
                                </div>
                                <hr />
                               <!--------------------insert multiple labels-------------->
                               <div class="row imgSection">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="basicInput">Label Images (Click to the box for multiple image upload)</label>
                                            <div id="my-awesome-dropzone-product-label" class="dropzone form-control"></div>
                                            <small>Click to the box for multiple image upload</small>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="basicInput">Label Image Urls</label>
                                        <textarea name="label_urls" id="label_urls" class="form-control" placeholder="https://www.aayushbharat.com/image1.jpg, https://www.aayushbharat.com/image2.jpg" rows="5"></textarea>
                                        <small>Enter Image URLs with comma separated</small>
                                    </div>
                                </div>
                                </div>
                                <!---------------------------------------------------->
                            </div>

                            <div class="tab-pane fade" id="ingredients" role="tabpanel"
                                aria-labelledby="ingredients-tab">

                                <div class="row">
                                    <div class="col-md-3"> <label for="basicInput" class="label">Ingredient Name</label> </div>
                                    <div class="col-md-5"> <label for="basicInput" class="label">Ingredient Description</label> </div>
                                </div>
                                <div class="row" id="rowID0">
                                    <div class="col-md-3">
                                        <select name="ingredient_name[]" class="ingredient_name choices form-select">
                                            <option value="">Select Ingredient</option>
                                            <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($ingredient->title); ?>"><?php echo e($ingredient->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                </div>
                                    <div class="col-md-6"> <textarea name="description[]" class="description form-control" rows="2" placeholder="Enter Ingredient Description"></textarea> </div>
                                    <div class="col-md-1"> <a href="javascript:void(0);" onclick="addMore();" class="btn btn-sm btn-success">Add More</a></div>
                                </div>
                                <div id="addNewIngredient">

                                </div>
                            </div>

                            <div class="tab-pane fade" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="basicInput" class="label">Short Description</label>
                                            <textarea name="short_description" id="short_description" class="form-control editorBox" rows="3"></textarea>
                                            <span id="short_descriptionError" style="color:#F00"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="basicInput" class="label">Description</label>
                                            <textarea name="long_description" id="long_description" class="form-control editorBox" rows="3"></textarea>
                                            <span id="long_descriptionError" style="color:#F00"></span>
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
                                            <input type="text" name="seo_title" id="seo_title" class="form-control" value="">
                                            <span id="seo_titleError" style="color:#F00"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput" class="label">SEO Keywords</label>
                                            <input type="text" name="seo_keywords" id="seo_keywords" class="form-control" value="">
                                            <span id="seo_keywordsError" style="color:#F00"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="basicInput" class="label">SEO Description</label>
                                            <textarea type="text" name="seo_description" id="seo_description" class="form-control" ></textarea>
                                            <span id="seo_descriptionError" style="color:#F00"></span>
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
                                        <textarea name="special_notes" id="special_notes" class="form-control" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="text-left">
                                    <div>
                                        <!--begin::Submit button-->
                                        <button type="button" id="form_submit1" class="btn btn-sm btn-primary fw-bolder me-3 my-2">
                                            <span class="indicator-label" id="formSubmit">Save</span>
                                            <span class="indicator-progress d-none">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>

                                        <button type="button" id="form_submit" class="btn btn-sm btn-success fw-bolder me-3 my-2">
                                            <span class="indicator-label" id="formSubmit">Submit</span>
                                            <span class="indicator-progress d-none">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                        <!--end::Submit button-->
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                	<div class="form-group" style="float:right;" id="error_refresh_div"></div>
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
            </div>
        </section>
    </div>
</form>
<link rel="stylesheet" href="<?php echo e(asset('public/js/dropzone/dist/dropzone.css')); ?>"/>
<script type="text/javascript" src="<?php echo e(asset('public/js/dropzone/dist/dropzone.js')); ?>"></script>
<!-- end plugin js -->
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
    let saveDataURL = "<?php echo e(url('/admin/add-product')); ?>";
    let returnURL = "<?php echo e(url('/admin/products')); ?>";
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
            $('#pageForm').append('<input type="hidden" class="images_field" name="images[]" value="'+obj.data+'">');
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

    var counter = 1;
    var ingredientOptions = "";
    <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        ingredientOptions +='<option value="<?php echo e($ingredient->title); ?>"><?php echo e($ingredient->title); ?></option>';
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    function addMore(){
        $('#addNewIngredient').append('<div class="row mt-2" id="rowID'+counter+'">\
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
    function removeIngredient(rowID){
        $('#rowID'+rowID).remove();
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
</script>
<style>
 .dropzone {
    border: 1px solid #dce7f1;
}
</style>
<script src="<?php echo e(asset('public/admin/js/pages/products/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/products/add-page.blade.php ENDPATH**/ ?>