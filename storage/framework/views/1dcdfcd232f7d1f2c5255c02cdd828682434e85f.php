

<?php $__env->startSection('content'); ?>
<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>View Product</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/moderation-products')); ?>">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="basicInput">Product Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Product Name" value="<?php echo e($rowData->product_name); ?>" readonly id="product_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="basicInput">Category</label>
                                    <select id="category_id" class="form-select" disabled>
                                    <option value="">Select Category</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e($rowData->category_id == $category->id ?'selected':''); ?>><?php echo e($category->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="basicInput">Sub Category</label>
                                    <select disabled class="form-select">
                                    <option value="">Select Sub Category</option>
                                    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($subcategory->id); ?>" <?php echo e($rowData->sub_category_id == $subcategory->id ?'selected':''); ?>><?php echo e($subcategory->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="basicInput">Brand</label>
                                    <select disabled class="form-select">
                                    <option value="">Select Brand</option>
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($brand->id); ?>"  <?php echo e($rowData->brand_id == $brand->id ?'selected':''); ?>><?php echo e($brand->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="basicInput">Product Type</label>
                                    <select disabled class="form-select">
                                    <option value="GLOBAL" <?php echo e($rowData->product_type == "GLOBAL" ?'selected':''); ?>>GLOBAL</option>
                                    <option value="PROPRITRY" <?php echo e($rowData->product_type == "PROPRITRY" ?'selected':''); ?>>PROPRITRY</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="basicInput">Product Varient</label>
                                    <select disabled class="form-select">
                                    <option value="">Select Product Varient</option>
                                    <?php $__currentLoopData = $productVarients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productVarient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($productVarient->id); ?>" <?php echo e($rowData->product_varient == $productVarient->id ?'selected':''); ?>><?php echo e($productVarient->product_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="basicInput">Product Code</label>
                                    <input type="text" class="form-control" placeholder="Enter Product Code" value="<?php echo e($rowData->product_code); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="basicInput">HSN Code</label>
                                    <input type="text" class="form-control" placeholder="Enter HSN Code" value="<?php echo e($rowData->hsn_code); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="basicInput">Product Quantity</label>
                                    <input type="text" class="form-control" placeholder="Enter Product Quantity" value="<?php echo e($rowData->product_qty); ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="basicInput">Out of stock</label><br />
                                    <input type="checkbox" value="YES"  style="height:30px;width:30px;" <?php echo e($rowData->stock =='YES'?'checked':''); ?> disabled>
                                </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group  <?php echo e($rowData->stock =='YES'?'':'d-none'); ?>" id="stockDate">
                                <label for="basicInput">Out of Stock Date</label><br />
                                <input type="date" class="form-control"  value="<?php echo e($rowData->stock_date); ?>" readonly>
                            </div>
                        </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="basicInput">Ailment</label>
                                    <select disabled class="form-select" multiple style="height:100px;">
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
                                    <label for="basicInput">Created</label>                                    
                                    <input type="text" class="form-control" value="<?php echo date('d M, Y h:i A',strtotime($rowData->created_at)); ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="basicInput">MRP</label>
                                        <input type="text" class="form-control" placeholder="Enter MRP" value="<?php echo e($rowData->mrp); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="basicInput">Discount</label>
                                        <input type="text" class="form-control" placeholder="Enter Discounted Price" value="<?php echo e($rowData->discounted_price); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="basicInput">List Price</label>
                                        <input type="text" class="form-control" placeholder="Enter List Price" value="<?php echo e($rowData->list_price); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="basicInput">Tax</label>
                                        <select type="text" class="form-select" value="" disabled>
                                        <option value="0">Select Tax</option>
                                        <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($tax->title); ?>" <?php echo e($rowData->tax == $tax->title ?'selected':''); ?>><?php echo e($tax->title); ?>%</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 d-none" id="otherTax">
                                <div class="form-group">
                                    <label for="basicInput">Other Tax</label>
                                    <input type="text" class="form-control" placeholder="Enter Other Tax" value="" readonly>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="basicInput">Tax Included</label>
                                    <input type="checkbox"  style="height:30px;width:30px;"value="YES" disabled <?php echo e($rowData->is_tax_included =='YES'?'checked':''); ?> id="is_tax_included">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="basicInput">Shipping Cost</label>
                                    <input type="text" class="form-control" placeholder="Enter Shipping Cost" value="<?php echo e($rowData->shipping_cost); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="basicInput">Free Shipping</label>
                                    <input type="checkbox"  style="height:30px;width:30px;" value="YES" disabled  <?php echo e($rowData->is_free_shipping =='YES'?'checked':''); ?>>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput" style="vertical-align: top;">Show All Users</label>
                                <input type="checkbox"  style="height:30px;width:30px; margin-left:20px;" <?php echo e($rowData->is_show_all_user =='YES'?'checked':''); ?> value="YES" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput" style="vertical-align: top;">Show Guest User</label>
                                <input type="checkbox"  style="height:30px;width:30px; margin-left:20px;" <?php echo e($rowData->is_show_guest_user =='YES'?'checked':''); ?> value="YES" disabled>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="basicInput" style="vertical-align: top;">Show Register User</label>
                                <input type="checkbox"  style="height:30px;width:30px; margin-left:20px;" value="YES" <?php echo e($rowData->is_show_register_user =='YES'?'checked':''); ?> disabled>
                            </div>
                        </div>

                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="basicInput" style="vertical-align: top;">Vendor</label>
                                    <select readonly class="form-select">
                                    <option value="0">All Vendor</option>
                                    <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($vendor->id); ?>" <?php echo e($rowData->vendor_id == $vendor->id ?'selected':''); ?>><?php echo e($vendor->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                    <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="basicInput">Product Weight</label>
                                    <input type="text" class="form-control" placeholder="Enter Product Weight" value="<?php echo e($rowData->product_weight); ?>" readonly>
                                    <small>Product weight 0.000 kg</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="basicInput">Product Width</label>
                                    <input type="text" class="form-control" placeholder="Enter Product Width" value="<?php echo e($rowData->product_width); ?>" readonly>
                                    <small>Product width cm</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="basicInput">Product Height</label>
                                    <input type="text" class="form-control" placeholder="Enter Product Height" value="<?php echo e($rowData->product_height); ?>" readonly>
                                    <small>Product height cm</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="basicInput">Product Length</label>
                                    <input type="text" class="form-control" placeholder="Enter Product Length" value="<?php echo e($rowData->product_length); ?>" readonly>
                                    <small>Product length cm</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row imgSection">
                        <div class="col-lg-12">
                            <hr />
                                <?php if(isset($productImages) && !empty($productImages)): ?>
                                    <?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($val->image)): ?>
                                        <div style="position:relative; display:inline-block" id="rowID<?php echo e($val->id); ?>">
                                            <img src="<?php echo e(URL::asset('public/img/products/')); ?>/<?php echo $val->image; ?>" class="img-rounded" title="<?php echo e($val->image_title); ?>" alt="<?php echo e($val->image_alt); ?>" style="margin: 3px 3px 40px 7px;max-width: 150px;height: auto;">

                                        </div>
                                            <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3"> <label for="basicInput">Ingredient Name</label> </div>
                            <div class="col-md-5"> <label for="basicInput">Ingredient Description</label> </div>
                        </div>
                        <?php if(count($productIngredients) > 0): ?>
                            <?php $__currentLoopData = $productIngredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productIngredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mt-2" id="rowID<?php echo e($productIngredient->id); ?>">
                                <input type="hidden" value="<?php echo e($productIngredient->id); ?>" name="ingredient_id[]"  id="indID<?php echo e($productIngredient->id); ?>">
                                <div class="col-md-3">
                                    <select disabled  class="form-select" >
                                    <option value="">Select Ingredient</option>
                                    <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ingredient->title); ?>" <?php echo e($productIngredient->ingredient_name == $ingredient->title ?'selected':''); ?>><?php echo e($ingredient->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                                <div class="col-md-6"> <textarea readonly  class="form-control" rows="2" placeholder="Enter Ingredient Description"><?php echo e($productIngredient->description); ?></textarea> </div>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                    <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Short Description</label>
                                    <textarea readonly class="form-control" rows="3"><?php echo e($rowData->short_description); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Description</label>
                                    <textarea readonly class="form-control" rows="3"><?php echo e($rowData->long_description); ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="basicInput">SEO Title</label>
                                    <input type="text" readonly class="form-control" value="<?php echo e($rowData->seo_title); ?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="basicInput">SEO Keywords</label>
                                    <input type="text" readonly class="form-control" value="<?php echo e($rowData->seo_keywords); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">SEO Description</label>
                                    <textarea type="text" readonly class="form-control" ><?php echo e($rowData->short_description); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/moderation_products/view-page.blade.php ENDPATH**/ ?>