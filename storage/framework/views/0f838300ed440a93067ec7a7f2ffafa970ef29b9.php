

<?php $__env->startSection('content'); ?>
<form class="form w-100" id="pageForm" action="#">
<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Subscription</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/subscriptions')); ?>">Subscriptions</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Subscription</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="basicInput">Title</label>
                                        <input type="text" class="form-control" placeholder="Enter Subscription Title" value="<?php echo e($rowData->title); ?>" name="title" id="title">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <?php
                                        $CompaniesArr = array();
                                        if(!empty($rowData->company_ids)){
                                            $CompaniesArr = explode(',',$rowData->company_ids);
                                        }
                                        ?>
                                        <label for="basicInput">Company</label>
                                        <select name="company_ids[]" id="company_ids" class="form-select choices multiple-remove" multiple="multiple">
                                        <option value="">Select Company</option>
                                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($company->id); ?>" <?php echo e(in_array($company->id, $CompaniesArr) ?'selected':''); ?>><?php echo e($company->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="basicInput">Category</label>
                                        <select name="category_id" id="category_id" class="form-select choices" onchange="getSubCategories();getProducts();">
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
                                        <label for="basicInput">Discount Offer</label>
                                        <input type="text" class="form-control" placeholder="Discount Offer" value="<?php echo e($rowData->discount_offer); ?>" name="discount_offer" id="discount_offer">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="basicInput">Wallet Points</label>
                                        <input type="text" class="form-control" placeholder="Wallet Points" value="<?php echo e($rowData->wallet_points); ?>" name="wallet_points" id="wallet_points">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="basicInput">Cost</label>
                                        <input type="text" class="form-control" placeholder="Cost" value="<?php echo e($rowData->cost); ?>" name="cost" id="cost">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Doctor</label>
                                            <?php
                                            $DoctorsArr = array();
                                            if(!empty($rowData->doctor_id)){
                                                $DoctorsArr = explode(',',$rowData->doctor_id);
                                            }
                                            ?>

                                            <select name="doctor_id[]" id="doctor_id" class="choices form-select multiple-remove" multiple="multiple">
                                            <option value="">Select Doctor</option>
                                                <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($doctor->id); ?>" <?php echo e(in_array($doctor->id, $DoctorsArr) ?'selected':''); ?>><?php echo e($doctor->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <?php
                                            $ProductsArr = array();
                                            if(!empty($rowData->product_id)){
                                                $ProductsArr = explode(',',$rowData->product_id);
                                            }
                                            ?>
                                            <label for="basicInput">Products</label>
                                            <div id="productID">
                                                <select name="product_id[]" id="product_id" class="choices form-select multiple-remove" multiple="multiple">
                                                <option value="">Select Product</option>
                                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($product->id); ?>" <?php echo e(in_array($product->id, $ProductsArr) ?'selected':''); ?>><?php echo e($product->product_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">No. Of Consultations</label>
                                            <input type="number" class="form-control" placeholder="Enter No. Of Consultations" value="<?php echo e($rowData->no_of_consultations); ?>" name="no_of_consultations" id="no_of_consultations">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">No. Of Products</label>
                                            <input type="number" class="form-control" placeholder="Enter No. Of Products" value="<?php echo e($rowData->no_of_products); ?>" name="no_of_products" id="no_of_products">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Expiry Date</label><br />
                                            <input type="date" class="form-control"  name="expiry_date" id="expiry_date" value="<?php echo e($rowData->expiry_date); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="basicInput">Image</label>
                                            <input type="file" class="form-control" value="" name="file" id="file">
                                            <input type="hidden" name="old_file" value="<?php echo $rowData->image; ?>" />
                                        </div>
                                    </div>
                                    <?php if($rowData->image != ""): ?>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="basicInput">&nbsp;</label>
                                                <img src="<?php echo e(URL::asset('public/img/subscriptions/')); ?>/<?php echo $rowData->image; ?>" width="100">
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="basicInput">Description</label>
                                            <textarea name="description" id="description" class="form-control editorBox" rows="3"><?php echo e($rowData->description); ?></textarea>
                                        </div>
                                    </div>


                                <div class="text-left">
                                    <div>

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
                </div>
            </div>
        </section>
    </div>
    </form>

<!-- end plugin js -->
<link rel="stylesheet" href="<?php echo e(asset('public/js/dropzone/dist/dropzone.css')); ?>"/>
<script type="text/javascript" src="<?php echo e(asset('public/js/dropzone/dist/dropzone.js')); ?>"></script>
<script>
    let saveDataURL = "<?php echo e(url('/admin/edit-corporate-subscription/'.$row_id)); ?>";
    let returnURL = "<?php echo e(url('/admin/corporate-subscriptions')); ?>";
    let getServicesURL = "<?php echo e(url('/admin/get-sub-categories')); ?>";
    let getProductsURL = "<?php echo e(url('/admin/get-category-products')); ?>";

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
    function getProducts(){
        var category_id = $('#category_id').val();
        var sub_category_id = $('#sub_category_id').val();
        $('#product_id').html('<option value="">Select Product</option>');
        if(category_id  > 0){
            $.ajax({
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: getProductsURL,
            data: {category_id:category_id,sub_category_id:sub_category_id},
            success: function(response){
                $('#productID').html("<select name='product_id[]' id='product_id' class='choices form-select multiple-remove' multiple='multiple'>"+response+"</select>");
                var choices = new Choices($("#product_id")[0]);
            }
        });
        }
    }
</script>
<style>
 .dropzone {
    border: 1px solid #dce7f1;
}
</style>
<script src="<?php echo e(asset('public/admin/js/pages/corporate_subscriptions/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/corporate_subscriptions/edit-page.blade.php ENDPATH**/ ?>