

<?php $__env->startSection('content'); ?>
<style>
.o-status {
    float: left;
    margin-left: 10px;
    margin-right: 10px;
    border: 1px solid #e1e1e1;
    padding: 5px 10px;
    border-radius: 4px;
}
</style>
<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Sales Report</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sales</li>
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
                    <form id="searchForm" name="searchForm" class="float-starts">
                        <div class="d-flex align-items-center">
                            <!--begin::Input group-->
                            <div class="position-relative w-md-200px me-md-2">
                            	<select id="type" name="type" onchange="getFilter(this.value)" class="form-control">
                                	<option value="">Select Type</option>
                                    <option value="Customer">Customer</option>
                                  	<?php if(Session::get('admin_type') == 'Admin'): ?>
                                    	<option value="Vendor">Vendor</option>
                                    <?php endif; ?>
                                    <option value="Location">Location</option>
                                    <option value="Product">Product</option>
                                    <option value="OrderStatus">Order Status</option>
                                    <option value="PaymentMethodType">Payment Method Type</option>
                                    <option value="ShippingMethod">Shipping Method</option>
                                    <option value="TrackingNo">Tracking No</option>
                                    <option value="TransactionId">Transaction ID</option>
                                    <option value="SettlementUtr">Settlement UTR</option>
                                </select>
                            </div>
                            
                            <div class="position-relative w-md-200px me-md-2">
                            	<div class="filters" style="display:none" id="Customer" style="display:none;">
                            	<select class="form-select choices" name="Customer">
                                	<option value="">Select Customer</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                            	
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>                                              
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                                <?php if(Session::get('admin_type') == 'Admin'): ?>
                                <div class="filters" style="display:none" id="Vendor" style="display:none;">
                            	<select class="form-select choices" name="Vendor">
                                	<option value="">Select Vendor</option>
                                    <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                            	
                                        <option value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->name); ?></option>                                              
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                                <?php endif; ?>
                                <div class="filters" style="display:none" id="Product" style="display:none;">
                                <select class="form-select choices" name="Product">
                                	<option value="">Select Product</option>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                            	
                                        <option value="<?php echo e($product->id); ?>"><?php echo e($product->product_name); ?></option>                                              
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                                
                                <div class="filters" style="display:none" id="OrderStatus">
                                <select class="form-select choices" name="OrderStatus">
                                	<option value="">Select Order Status</option>
                                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $statuse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>:
                                    <option value="<?php echo e($statuse->title); ?>"><?php echo e($statuse->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                                
                                <select class="filters form-select" id="PaymentMethodType" onchange="$(this).val() == 'COD' ? $('#payment_method_div').hide() : $('#payment_method_div').show()" name="PaymentMethodType" style="display:none">
                                	<option value="">Select Payment Method Type</option>
                                    <option value="COD">COD</option>
                                    <option value="PREPAID">PREPAID</option>
                                </select>
                                
                                <select class="filters form-select" id="Location" onchange="$(this).val() != '' ? $('#CustomerLocation').show() : $('#CustomerLocation').hide()" name="Location" style="display:none">
                                	<option value="">Select Location</option>
                                    <option value="CustomerLocation">Billing Contact</option>
                                    <option value="CustomerLocation">Billing Email</option>
                                    <option value="CustomerLocation">Address</option>
                                    <option value="CustomerLocation">Country</option>
                                    <option value="CustomerLocation">State</option>
                                    <option value="CustomerLocation">City</option>
                                    <option value="CustomerLocation">Zipcode</option>
                                </select>
                                
                                <input id="CustomerLocation" name="CustomerLocation" confirmation="false" placeholder="Search Keywords..." class="filters form-control" style="display:none">
                                
                                <div class="filters" style="display:none" id="ShippingMethod">
                                <select class="form-select choices" name="ShippingMethod">
                                	<option value="">Select Shipping Method</option>
                                    <?php $__currentLoopData = $shipping_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shipping_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($shipping_method->id); ?>"><?php echo e($shipping_method->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>                                
                                <select id="TransactionId" name="TransactionId" confirmation="false" class="filters form-control" placeholder="TransactionId" style="display:none">
                                	<option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                
                                </select>
                                <select id="SettlementUtr" name="SettlementUtr" confirmation="false" class="filters form-control" placeholder="SettlementUtr" style="display:none">
                                	<option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                
                                </select>
                                <select id="TrackingNo" name="TrackingNo" confirmation="false" class="filters form-control" placeholder="TrackingNo" style="display:none">
                                	<option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                
                                </select>
                            </div>
                                
                                <div style="display:none" class="position-relative w-md-200px me-md-2 filters form-group" id="payment_method_div">
                                    <select name="PaymentMethod" id="PaymentMethod" class="form-select">
                                        <option value="">Select</option>
                                        <option value="PAYTM">PAYTM</option>
                                        <option value="HDFC ETC">HDFC ETC</option>
                                    </select>
                                </div>
                             
                            <div class="position-relative w-md-200px me-md-2">
                            	<input type="date" id="FromDate" name="FromDate" confirmation="false" class="filters form-control" placeholder="FromDate" style="display:none">
                            </div>
                            
                            <div class="position-relative w-md-200px me-md-2">
                            	<input type="date" id="ToDate" name="ToDate" confirmation="false" class="filters form-control" placeholder="ToDate" style="display:none">
                            </div>
                            
                            <!--end::Input group-->
                            <!--begin:Action-->
                            <div class="d-flex align-items-center" >
                                <button type="button" id="searchbuttons" onclick="filterData('search');" style="display:none; margin-right:10px;" class="filters btn btn-sm btn-primary" data-kt-menu-dismiss="true">Load Data</button>
                            </div>
                            <!--end:Action-->                                                         
                     		<a onclick="exportData();" id="exportCsvBtn" class="filters btn icon btn-sm btn-outline-primary float-right" style="display:none; margin-left:10px">Export CSV</a>
                        </div>
                    </form>
                    
                </div>
                <!--end::Card body-->
            </div>
        </section>
        <!-- Table head options start -->
        <section class="section render_results" style="display:none;">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <!-- table head dark -->
                            <div class="table-responsive">
                                <table class="table mb-0" id="replaceHtml">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Table head options end -->
    </div>
<input type="hidden" id="page_name" name="page_name" value="AddOrder"/>
<input type="hidden" id="vendor_id" name="vendor_id" value="0"/>
<input type="hidden" id="export_url" value="<?php echo e(route('exports.sales')); ?>"/>
<script>
function exportData(){
	$('#exportCsvBtn').html('......');
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: "POST",
		url: $('#export_url').val(),
		data: $('#searchForm').serialize(),
		success: function(msg){
			$('#exportCsvBtn').html('Export CSV');
			window.location.href = msg;
		},error: function(ts){
            $('#error500').modal('show');
        }
	});
}
function getFilter(type){
	$('#searchForm')[0].reset();
	$('.filters').hide();
	if(type != ''){
		$('#export_url').val("<?php echo e(route('exports.sales')); ?>")
		$('#type').val(type);
		$('#'+type).show();		
		$('#FromDate').show();
		$('#ToDate').show();
		$('#searchbuttons').show();
		$('#reset_btn').show();
		if(type == 'Product'){
			$('#export_url').val("<?php echo e(route('exports.product.sales')); ?>")	
		}
	}
}
$(document).ready(function(){
    //filterData('simple');
});
function filterData(type = null){
    if(type =='search'){$('#searchbuttons').html('Searching..');}
	$.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
		data: $('#searchForm').serialize(),
		url: "<?php echo e(url('/admin/get-sales-records')); ?>",
		success: function(response){			
			$('#replaceHtml').html(response);
			$('.render_results').show();
            $('#searchbuttons').html('Load Data');
			$('#exportCsvBtn').show();
		}
	});
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/report/get_sales.blade.php ENDPATH**/ ?>