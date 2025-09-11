

<?php $__env->startSection('content'); ?>
<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Products Management</h3>
                    <p class="text-subtitle text-muted">Products list.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
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
                    <a onclick="exportData();" id="exportCsvBtn" class="btn icon btn-sm btn-outline-primary float-end" style="margin-left:10px">Export CSV</a>
                     <a data-bs-toggle="modal" data-bs-target="#uploadCsvModal" class="btn icon btn-sm btn-outline-warning float-end" style="margin-left:10px">Import CSV</a>
                    <a href="<?php echo e(url('/admin/add-product')); ?>" style="margin-left:10px" class="btn icon btn-sm btn-outline-success float-end">Add New Product</a>
                    
                    
                    <a data-bs-toggle="modal" data-bs-target="#uploadProductsModal" class="btn icon btn-sm btn-outline-warning float-end" style="margin-left:10px">Upload Products</a>
                    
                    <div class="float-end updateModerationStatus d-none" style="margin-right:10px">
                        <div class="input-group float-end">
                            <button class="btn icon btn-sm btn-outline-primary float-end dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void();" onclick="DeleteAll()">Delete</a></li>
                                <li><a class="dropdown-item" href="javascript:void();" onclick="UpdateStatusAll(2)">Active</a></li>
                                <li><a class="dropdown-item" href="javascript:void();" onclick="UpdateStatusAll(1)">Inactive</a></li>
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
        <!-- Table head options end -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="uploadCsvModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import CSV</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
            <label for="basicInput">Choose File</label>
            <input type="file" class="form-control" name="upload_csv_file" id="upload_csv_file">
            </div>
          </div>
          <div class="modal-footer">
          <a href="<?php echo e(url('/storage/sample-csv/product.csv')); ?>" target="_blank" class="btn btn-success">Download Sample CSV</a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" onclick="UploadCSV();" id="uploadCsvBtn" class="btn btn-primary">Upload</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="uploadProductsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import CSV</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group">
            <label for="basicInput">Choose File</label>
            <input type="file" class="form-control" name="upload_csv_file2" id="upload_csv_file2">
            </div>
          </div>
          <div class="modal-footer">
          <a href="<?php echo e(url('/storage/sample-csv/product.csv')); ?>" target="_blank" class="btn btn-success">Download Sample CSV</a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" onclick="UploadProductsCSV();" id="uploadCsvBtn2" class="btn btn-primary">Upload</button>
          </div>
        </div>
      </div>
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
                    	<input type="hidden" id="disapprove_pid" value=""/>
                        <textarea placeholder="Enter Reason" id="decline_reason" colspan="3" class="form-control" style="height:100px"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1" onclick="declineDisapproveProducts()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Decline</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- full size modal-->
        
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
function exportData(){
	$('#exportCsvBtn').html('......');
	$.ajax({
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		type: "POST",
		url: "<?php echo e(route('exports.product')); ?>",
		data: $('#searchForm').serialize(),
		success: function(msg){
			$('#exportCsvBtn').html('Export CSV');
			window.location.href = msg;
		},error: function(ts){
            $('#error500').modal('show');
        }
	});
}
function UploadProductsCSV(){
	if($.trim($('#upload_csv_file2').val()) != ''){
		var file_data = $('#upload_csv_file2').prop('files')[0];
		var form_data = new FormData();
		form_data.append('file', file_data);
		
		$('#uploadCsvBtn2').html('......');
		$.ajax({
			type: 'POST',
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url: "<?php echo e(route('imports.products')); ?>",
			dataType: 'text',  // <-- what to expect back from the PHP script, if anything
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,			
			success: function(msg){				
				$('#uploadCsvBtn2').html('Upload');
				
				if(msg == 'Success'){
					$('#uploadProductsModal').modal('hide');
					swal("", "CSV Uploaded successfully", "success").then((value) => {});
					resetFilterForm();
				}else if(msg == 'InvalidFileType'){
					swal("Error!", 'Please select valid file format', "error");
				}else if(msg == 'ChoseFile'){
					swal("Error!", 'Please choose file', "error");
				}
				
			},error: function(ts){
				$('#error500').modal('show');
			}
		});
	}
}
function UploadCSV(){
	if($.trim($('#upload_csv_file').val()) != ''){
		var file_data = $('#upload_csv_file').prop('files')[0];
		var form_data = new FormData();
		form_data.append('file', file_data);
		
		$('#uploadCsvBtn').html('......');
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url: "<?php echo e(route('imports.product')); ?>",
			dataType: 'text',  // <-- what to expect back from the PHP script, if anything
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post',
			success: function(msg){
				
				$('#uploadCsvBtn').html('Upload');
				
				if(msg == 'Success'){
					$('#uploadCsvModal').modal('hide');
					swal("", "CSV Uploaded successfully", "success").then((value) => {});
					resetFilterForm();
				}else if(msg == 'InvalidFileType'){
					swal("Error!", 'Please select valid file format', "error");
				}else if(msg == 'ChoseFile'){
					swal("Error!", 'Please choose file', "error");
				}
				
			},error: function(ts){
				$('#error500').modal('show');
			}
		});
	}
}
function filterData(type = null){
    if(type =='search'){$('#searchbuttons').html('Searching..');}
	$.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
		data: $('#searchForm').serialize(),
		url: "<?php echo e(url('/admin/products_paginate')); ?>",
		success: function(response){
			$('#replaceHtml').html(response);
            $('#searchbuttons').html('Search');
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



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/products/index.blade.php ENDPATH**/ ?>