

<?php $__env->startSection('content'); ?>
<form class="form w-100" id="pageForm" action="#">
<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add New Subscription</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/subscriptions')); ?>">Subscriptions</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Subscription</li>
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
                                            <input type="text" class="form-control" placeholder="Enter Subscription Title" value="" name="title" id="title">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Category</label>
                                            <select name="category_id" id="category_id" class="form-select choices" onchange="getSubCategories();getProducts();">
                                            <option value="">Select Category</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Sub Category</label>
                                            <div id="subCategory">
                                                <select name="sub_category_id[]" id="sub_category_id" class="choices form-select multiple-remove" multiple="multiple" >
                                                <option value="">Select Sub Category</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Discount Offer</label>
                                            <input type="text" class="form-control" placeholder="Discount Offer" value="" name="discount_offer" id="discount_offer">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Wallet Points</label>
                                            <input type="text" class="form-control" placeholder="Wallet Points" value="" name="wallet_points" id="wallet_points">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Plan Cost</label>
                                            <input type="text" class="form-control" placeholder="Plan Cost" value="" name="cost" id="cost">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Doctor</label>
                                            <select name="doctor_id[]" id="doctor_id" class="choices form-select multiple-remove" multiple="multiple">
                                            <option value="">Select Doctor</option>
                                                <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Products</label>
                                            <div id="productID">
                                                <select name="product_id[]" id="product_id" class="choices form-select multiple-remove" multiple="multiple">
                                                <option value="">Select Product</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">No. Of Consultations</label>
                                            <input type="number" class="form-control" placeholder="Enter No. Of Consultations" value="" name="no_of_consultations" id="no_of_consultations">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">No. Of Products</label>
                                            <input type="number" class="form-control" placeholder="Enter No. Of Products" value="" name="no_of_products" id="no_of_products">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Expiry Date</label><br />
                                            <input type="date" class="form-control"  value="" name="expiry_date" id="expiry_date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput">Image</label>
                                            <input type="file" class="form-control" value="" name="file" id="file">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="basicInput">Description</label>
                                            <textarea name="description" id="description" class="form-control editorBox" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-left">
                                    <div>
                                        <!--begin::Submit button-->
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
<link rel="stylesheet" href="<?php echo e(asset('public/js/dropzone/dist/dropzone.css')); ?>"/>
<script type="text/javascript" src="<?php echo e(asset('public/js/dropzone/dist/dropzone.js')); ?>"></script>
<!-- end plugin js -->
<script>
    let saveDataURL = "<?php echo e(url('/admin/add-subscription')); ?>";
    let returnURL = "<?php echo e(url('/admin/subscriptions')); ?>";
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
                $('#subCategory').html("<select name='sub_category_id[]' id='sub_category_id' class='choices form-select multiple-remove' multiple='multiple'>"+response+"</select>");
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
<script src="<?php echo e(asset('public/admin/js/pages/subscriptions/add-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/subscriptions/add-page.blade.php ENDPATH**/ ?>