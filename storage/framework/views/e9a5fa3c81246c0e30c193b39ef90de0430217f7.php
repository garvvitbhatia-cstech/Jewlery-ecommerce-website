

<?php $__env->startSection('content'); ?>
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
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">Info</a>
                                </li>
                            </ul>
                            <hr />
                            <div class="tab-content mt-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        	<input type="hidden" name="row_id" id="row_id" value="<?php echo e($rowData->id); ?>"/>
                                            <label for="basicInput">Product Quantity</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Quantity" value="<?php echo e($rowData->product_qty); ?>" name="product_qty" id="product_qty">
                                        </div>
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
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <h5>Price</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="basicInput">MRP</label>
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
                                                <label for="basicInput">List Price</label>
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
                                                    <input class="form-check-input" type="radio" <?php echo e($rowData->packaging_cost_time =='One Time'?'checked':''); ?> name="packaging_cost_time" id="packaging_cost_time1" value="One Time">
                                                    <label class="form-check-label" for="packaging_cost_time1">One Time</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" <?php echo e($rowData->packaging_cost_time =='Multiple Time'?'checked':''); ?> name="packaging_cost_time" id="packaging_cost_time2" value="Multiple Time">
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
                                            <input type="checkbox"  style="height:30px;width:30px;"value="YES" name="is_tax_included" <?php echo e($rowData->is_tax_included =='YES'?'checked':''); ?> id="is_tax_included">
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
                                            <input type="checkbox"  style="height:30px;width:30px;" value="YES" name="is_free_shipping" id="is_free_shipping"  <?php echo e($rowData->is_free_shipping =='YES'?'checked':''); ?>>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="basicInput" class="w-100">Self-Ship</label>
                                            <input type="checkbox"  style="height:30px;width:30px;" value="YES" name="is_self_ship" id="is_self_ship"  <?php echo e($rowData->is_self_ship =='YES'?'checked':''); ?>>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="basicInput" class="w-100">Created</label>
                                            <input type="text" class="form-control" readonly="readonly" value="<?php echo date('d M, Y h:i A',strtotime($rowData->created_at)); ?>">
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
                              <?php if(isset($type) && $type == 'add'): ?>
                              <a href="javascript:void(0);" onclick="sellProduct('<?php echo e($rowData->id); ?>');" id="sell_this_btn_<?php echo e($rowData->id); ?>" class="btn btn-sm btn-primary"  title="Sell Product">Save</a>
                              <?php else: ?>
                              <button type="button" id="form_submit1" class="btn btn-sm btn-primary fw-bolder me-3 my-2"> <span class="indicator-label" id="formSubmit">Save</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>
                              <button type="button" id="form_submit" class="btn btn-sm btn-success fw-bolder me-3 my-2"> <span class="indicator-label" id="formSubmit">Submit</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>
                              <?php endif; ?>
                              <!--end::Submit button--> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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
    /*let ask = true;
    window.onbeforeunload = function (e) {
        if(!ask) return null
        e = e || window.event;
        //old browsers
        if (e) {e.returnValue = 'Sure?';}
        //safari, chrome(chrome ignores text)
        return 'Sure?';
    };*/
	
	//let saveDataURL = "<?php echo e(url('/admin/vendor-add-product')); ?>";
    let saveDataURL = "<?php echo e(url('/admin/vendor-edit-product/'.$row_id)); ?>";
	let returnURL = "<?php echo e(url('/admin/vendor-sell-products')); ?>";
    let editDataURL = "<?php echo e(url('/admin/vendor-sell-products')); ?>";
	
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
	
	function sellProduct(row_id){
		if(row_id != ''){
			var flag = 0;
			if($.trim($("#product_qty").val()) == ''){
				flag = 1;
				swal("Error!", 'Please Enter Product Quantity.', "error");
				return false;
			}
			if(flag == 0){
				var siteUrl = $('body').attr('data-base-url');
				$('#sell_this_btn_'+row_id).attr('disabled','true');
				$('#sell_this_btn_'+row_id).html('Processing...');
				$.ajax({
					headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
					type: 'POST',
					data: $('#pageForm').serialize(),
					url: "<?php echo e(url('/admin/vendor-add-product')); ?>",
					success: function(response){
						window.location.href = siteUrl+response;
					}
				});
				return false;
			}
		}
	}

</script>
<style>
 .dropzone {
    border: 1px solid #dce7f1;
}
</style>
<script src="<?php echo e(asset('public/admin/js/pages/products/edit-vendor-page.js')); ?>"></script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/vendor_sales/edit-page.blade.php ENDPATH**/ ?>