

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
                    <h3>Orders Management</h3>
                    <p class="text-subtitle text-muted">Orders List.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
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
                                <input id="keyword" name="keyword" confirmation="false" class="form-control" placeholder="Keywords..">
                            </div>
                            <?php /*?><div class="position-relative w-md-200px me-md-2">
                            <select class="form-select" id="orderStatus" name="status" >
                            <option value="">Select Order Status</option>
                                @foreach($statuses as $key => $statuse)
                                        	
                                    <option value="{{$statuse->title}}">{{$statuse->title}}</option>
                                
                                @endforeach
                            </select>
                            </div><?php */?>
                            <div class="position-relative me-md-8">
                            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $statuse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div class="o-status"><input name="status[]" value="<?php echo e($statuse->title); ?>" type="checkbox" /> <?php echo e($statuse->title); ?> </div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <a href="<?php echo e(url('/admin/add-order')); ?>" class="btn icon btn-sm btn-outline-success float-end">Add New Order</a>
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
                                            <th>ID</th>
                                            <th>INVOICE ID</th>
                                            <th>CUSTOMER</th>
                                            <th>VENDOR</th>
                                            <th>AMOUNT</th>
                                            <th>STATUS</th>
                                            <th>PAYMENT STATUS</th>
                                            <th>PRES..</th>
                                            <th>CREATED</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody id="replaceHtml">
                                        <tr>
                                            <td colspan="11" class="text-center"><img src="<?php echo e(asset('public/admin/images/svg/oval.svg')); ?>" class="me-4" style="width: 3rem" alt="audio"></td>
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
<script>
/*function cloneOrder(row_id){
	if(row_id != ''){
		var siteUrl = $('body').attr('data-base-url');
		$('#sell_this_btn_'+row_id).attr('disabled','true');
		$('#sell_this_btn_'+row_id).html('Processing...');
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			type: 'POST',
			data: {row_id:row_id},
			url: "<?php echo e(url('/admin/clone-order')); ?>",
			success: function(response){
				window.location.href = siteUrl+response;
			}
		});
		return false;
	}
}*/
$(document).ready(function(){
    filterData('simple');
});
function filterData(type = null){
    if(type =='search'){$('#searchbuttons').html('Searching..');}
	$.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
		data: $('#searchForm').serialize(),
		url: "<?php echo e(url('/admin/orders_paginate')); ?>",
		success: function(response){
			$('#replaceHtml').html(response);
            $('#searchbuttons').html('Search');
		}
	});
}
function updateStatus(rowID){
    var status = $('#order_status_'+rowID).val();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
		data: {id:rowID,status:status},
		url: "<?php echo e(url('/admin/update_order_status')); ?>",
		success: function(response){
            var obj = JSON.parse(response);
            if(obj['heading'] == "Success"){
                swal({
                    title: 'Success',
                    text: 'Order has been updated successfully.',
                    type: 'success',
                    confirmButtonText: 'Ok',
                    confirmButtonColor: "#009EF7"
                });
                filterData('search');
            }else{
                swal("Error!", obj['msg'], "error");
                return false;
            }
		}
	});
}
function ViewProfile(uid){
	var divCondition = $('#profiledtl_'+uid).is(":visible");
    $('.profilelist').hide();
	if(divCondition == false){
		$('#profiledtl_'+uid).fadeIn();
	}
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/orders/index.blade.php ENDPATH**/ ?>