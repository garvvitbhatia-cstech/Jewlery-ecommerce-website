

<?php $__env->startSection('content'); ?>

<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Moderation Products Management</h3>
                    <p class="text-subtitle text-muted">Products list.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Moderation Products</li>
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
                                <input id="product_name" name="product_name" confirmation="false" class="form-control" value="" class="form-control" placeholder="Keywords..">
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
                    <div class="float-end updateModerationStatus d-none">
                        <a href="javascript:void(0);" class="btn icon btn-sm btn-success"  onclick="acceptProducts()">Accept</a>
                        <a href="javascript:void(0);" class="btn icon btn-sm btn-danger"  data-bs-toggle="modal" data-bs-target="#declineProduct">Decline</a>
                    </div>
                    <div class="float-end updateModerationStatus d-none" style="margin-right:10px">
                        <div class="input-group float-end">
                            <button class="btn icon btn-sm btn-outline-primary float-end dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void();" onclick="DeleteAll()">Delete</a></li>
                            </ul>
                        </div>
                    </div>
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
                                            <th><input type="checkbox" class="form-check-input form-check-primary form-check-glow" id="select_all" /></th>
											<th>IMAGE</th>
                                            <th>PRODUCT NAME</th>
                                            <th>SELLING PRICE</th>
                                            <th>MRP</th>
                                            <th>QUANTITY</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody id="replaceHtml">
                                        <tr>
                                            <td colspan="15" class="text-center"><img src="<?php echo e(asset('public/admin/images/svg/oval.svg')); ?>" class="me-4" style="width: 3rem" alt="audio"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="float-end updateModerationStatus d-none">
            <a href="javascript:void(0);" class="btn icon btn-sm btn-success" onclick="acceptProducts()">Accept</a>
            <a href="javascript:void(0);" class="btn icon btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#declineProduct">Decline</a>
        </div>
        <!-- Table head options end -->
    </div>
    <!--login form Modal -->
    <div class="modal fade text-left" id="declineProduct" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header"> 
                    <h4 class="modal-title" id="myModalLabel33">Decline Product</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Decline Reason: </label>
                    <div class="form-group">
                        <textarea placeholder="Enter Reason" id="decline_reason" colspan="3" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" onclick="declineProducts()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Decline</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- full size modal-->
<div class="modal fade text-left" id="declinedReasonPopup" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel20" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel20">Decline Reason</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body" id="declinedReasonBox"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    filterData('simple');
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.mod_products').each(function(){
                this.checked = true;
            });
            $('.updateModerationStatus').removeClass('d-none');
        }else{
             $('.mod_products').each(function(){
                this.checked = false;
            });
            $('.updateModerationStatus').addClass('d-none');
        }
    });
});
function setReason(reason){
    $('#declinedReasonBox').html(reason);
}
function filterData(type = null){
    if(type =='search'){$('#searchbuttons').html('Searching..');}
	$.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
		data: $('#searchForm').serialize(),
		url: "<?php echo e(url('/admin/moderation_products_paginate')); ?>",
		success: function(response){
			$('.updateModerationStatus').addClass('d-none');
			$('#replaceHtml').html(response);
            $('#searchbuttons').html('Search');
		}
	});
}
</script>
<style>
.modal-backdrop {
    background-color: #000 !important;
}
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/moderation_products/index.blade.php ENDPATH**/ ?>