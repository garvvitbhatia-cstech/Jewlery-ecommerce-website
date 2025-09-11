

<?php $__env->startSection('content'); ?>
<style>
.p_dropdown{position: absolute;
    border: 1px solid #c1c1c1;
    width: 51%;
    background: #fff;
    height: 270px;
    overflow-y: auto; display:none}
.p_dropdown ul{    list-style-type: none;
    padding: 0px;
    width: 99%;}	
.p_dropdown ul li{border-bottom: 1px solid #c1c1c1;
    min-height: 76px;
    padding: 10px;
    font-size: 13px; cursor:pointer}
.p_dropdown ul li:hover{ background:#435ebe; color:#fff}
</style>
<form class="form w-100" id="orderForm" action="#">
<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add New Order</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/orders')); ?>">Orders</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Order</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="">
            <div class="row">
                <div class="col-xs-12 col-md-2 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="tab-content" id="myTabContent">
                            	<div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="customer-tab">
									<div class="row">
                                        <div class="col-lg-12 col-sm-12 col-xs-12 col-sm-12">
                                        
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                	<input type="hidden" id="prescription_order_id" name="prescription_order_id" value="<?php echo e($prescription_order_id); ?>"/>
                                                    <input type="hidden" class="customer_info_value" id="customer_id_value" name="customer_id_value" value="" />
                                                    <label for="basicInput">Customer Information</label>
                                                    <select id="customer_name" class="customer_info_value form-select" name="customer_name">
                                                        <option value="">Select Customer</option>
                                                        <option value="">New Customer</option>
                                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                            	
                                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>                                              
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                
                                                <div class="" id="edit_user_div" style="display:none;float:right">
                                                    <button type="button" class="btn btn-primary" id="edit_user_btn">
                                                      Edit
                                                    </button>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-md-12" id="replace_customer">
                                            	
                                            </div>
                                                                                   
                                    </div>                          
                                    <div class="col-md-12">
                                    	<div class="form-group" id="replaceProducts"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-xs-12 col-md-7 col-sm-12">
                	<div class="card">
                    	<div class="card-body">
                        	<div class="row">
                            	
                            
                            <hr />
                            <div class="table-responsive">
                                <input type="hidden" name="cod_percent" id="cod_percent" value="<?php echo e($codPercent); ?>"/>
                                <input type="hidden" name="cod_amt" id="cod_amt" value="<?php echo e($codAmt); ?>"/>
                                <input type="hidden" name="shipping_tax_amt" id="shipping_tax_amt" value="<?php echo e($shippingTax); ?>"/>
                				<table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>QTY</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="add_more">
                                    <tr id="remove_1">
                                        <td colspan="2">
                                        	
                                            
                                            <input type="hidden" name="product_id[]" row_id="1" id="product_id1" class="product_id"/>
                                            <input type="hidden" name="product_tax[]" row_id="1" id="product_tax1"/>
                                            <input type="hidden" name="product_tax_include[]" row_id="1" id="product_tax_include1"/>
                                            <input type="hidden" name="product_package_cost[]" row_id="1" id="product_package_cost1"/>
                                            <input type="hidden" name="product_package_type[]" row_id="1" id="product_package_type1"/>
                                            <input type="hidden" name="product_shipping_cost[]" row_id="1" id="product_shipping_cost1"/>
                                            <input type="hidden" name="product_shipping_cost_time[]" row_id="1" id="product_shipping_cost_time1"/>
                                            <input type="hidden" name="cost_depend_shipping[]" row_id="1" id="cost_depend_shipping1"/>
                                            <input type="hidden" name="weight_depend_shipping[]" row_id="1" id="weight_depend_shipping1"/>
                                            <input type="hidden" name="is_free_shipping[]" row_id="1" id="is_free_shipping1"/>
                                            
                                            <input style="width:215px;" type="text" class="form-control" onkeyup="searchProductOrder(this.value,'1');" placeholder="Search product title" id="product_name1" row_id="1" name="product_name[]" />
                                         	<div class="p_dropdown" id="search_products1"></div>
                                            <div style="width:215px;font-size:12px;" id="p_selected_data1"></div>
                                           
                                        </td>
                                        <td>
                                        <input type="text" maxlength="3" value="1" onblur="setPrice('1');" name="product_qty[]" id="product_qty1" row_id="1" class="product_qty form-control" />
                                            
                                        </td>
                                        
                                        <td><input type="text" row_id="1" name="product_price[]" value="0" onblur="setPrice('1');" id="product_price1" class="product_price form-control"/></td>                                     
                                        <td><input type="text" readonly="readonly" value="0" row_id="1" name="total[]" id="total1" class="total form-control"/></td>                                                
                                        <td><a class="btn btn-danger remove" onclick="remove('1')"><i class="bi bi-trash"></i></a></td>
                                    </tr>
                                    </tbody>                                        
                                    <tr>
                                        <td align="right" colspan="4"><button type="button" class="btn btn-info addMoreBtn" onclick="add_more()">+ Add</button></td>
                                        <td style="border-right:1px solid #000; font-size:14px">Sub Total</td>
                                        <td id="totalSum" colspan="4"><input type="text" readonly="readonly" id="subTotal" name="subTotal" class="form-control" value="0" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td style="border-right:1px solid #000; font-size:14px">Packaging Cost</td>
                                        <td id="totalSum" colspan="4"><input type="text" onblur="CustomSetting();" id="packageCost" name="packageCost" class="form-control" value="0" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td style="border-right:1px solid #000; font-size:14px">Product Tax</td>
                                        <td id="totalSum" colspan="4"><input type="text" readonly="readonly" id="tax" name="productTax" class="form-control" value="0" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td style="border-right:1px solid #000; font-size:14px">Shipping Cost</td>
                                        <td id="totalSum" colspan="4"><input type="text" id="shippingCost" onblur="CustomSetting();" name="shippingCost" class="form-control" value="0" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><?php echo e($shippingTax); ?>%</td>
                                        <td style="border-right:1px solid #000; font-size:14px">Shipping Tax</td>
                                        <td id="totalSum" colspan="4"><input type="text" id="shippingTax" name="shippingTax" readonly="readonly" class="form-control" value="0" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                        In percentage  <?php echo e($codPercent); ?>% | In Rupees   <?php echo e($codAmt); ?> INR 
                                        </td>
                                        <td style="border-right:1px solid #000; font-size:14px">COD Amount</td>
                                        <td id="totalSum" colspan="4"><input type="text" id="codAmt" onblur="CustomSetting();" name="codAmt" class="form-control" value="0" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                        </td>
                                        <td style="border-right:1px solid #000; font-size:14px">Discount(-)</td>
                                        <td id="totalSum" colspan="4"><input type="text" class="form-control" onblur="CustomSetting();" id="discount" name="discount" value="0" /></td>
                                    </tr>
                                    <tr>
                                    <td colspan="4"></td>
                                    <td style="border-right:1px solid #000; font-size:14px">Grand Total</td>
                                    <td id="grandTotal" colspan="2">0.00</td>
                                    <input type="hidden" id="hiddenTotal" value="0" name="grand_total"/>
                                    </tr>                                
                                </table>
                                </div>
                                
                             
                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput">Notes</label>
                                    <textarea name="notes" id="notes" rows="6" class="form-control"></textarea>
                                </div>                                    
                            </div> 
                            </div>
                                 
                            </div>
                        </div>
                   	</div>	
                	
                    
                </div>
                <div class="col-xs-12 col-md-3 col-sm-12">
                
                <div class="card">                    	
                        <div class="card-body">
                        	<div class="row">                        		                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="basicInput">Order Status</label>
                                        <select name="order_status" id="order_status" class="form-select">
                                        	<?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $statuse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>:
                                        	<option value="<?php echo e($statuse->title); ?>"><?php echo e($statuse->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">                    	
                        <div class="card-body">
                        	<div class="row">                        		                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="basicInput">Payment Method Type</label>
                                        <select name="payment_method_type" id="payment_method_type" onchange="setTotal();$(this).val() == 'COD' ? $('#payment_method_div').hide() : $('#payment_method_div').show()" class="form-select">
                                        	<option value="COD">COD</option>
                                            <option value="PREPAID">PREPAID</option>
                                        </select>
                                    </div>
                                    <div style="display:none" class="form-group" id="payment_method_div">
                                        <label for="basicInput">Payment Method</label>
                                        <select name="payment_method" id="payment_method" class="form-select">
                                        	<option value="PAYTM">PAYTM</option>
                                            <option value="HDFC ETC">HDFC ETC</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">                    	
                        <div class="card-body">
                        	<div class="row">                        		                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Shipping Method Name</label>
                                        <select name="shipping_method_id" id="shipping_method_id" class="form-select">
                                        	<?php $__currentLoopData = $shipping_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shipping_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        	<option value="<?php echo e($shipping_method->id); ?>"><?php echo e($shipping_method->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Tracking No</label>
                                        <input type="text" id="tracking_no" name="tracking_no" class="form-control" />
                                    </div>
                                </div>
                                
                                
                                <div class="text-left">
                                    <div>
                                        <!--begin::Submit button-->
                                        <button type="button" id="form_submit_order1" class="btn btn-sm btn-primary fw-bolder me-3 my-2">
                                            <span class="indicator-label" id="formSubmit">Save</span>
                                            <span class="indicator-progress d-none">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>

                                        <!--<button type="button" id="form_submit_order" class="btn btn-sm btn-success fw-bolder me-3 my-2">
                                            <span class="indicator-label" id="formSubmit">Submit</span>
                                            <span class="indicator-progress d-none">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>-->
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
<input type="hidden" id="page_name" name="page_name" value="AddOrder"/>
<input type="hidden" id="vendor_id" name="vendor_id" value="0"/>
<input type="hidden" id="country_ids"/>
<input type="hidden" id="state_ids"/>
<input type="hidden" id="city_ids"/>

<!-- end plugin js -->


<style>
 .dropzone {
    border: 1px solid #dce7f1;
}
</style>



<script type="text/javascript">

	$(document).on('click','#get_billing_address',function(){
		$('#billing_address').val('');
		$('#billing_country').val('');
		$('#billing_state').val('');
		$('#billing_city').val('');
		$('#billing_zipcode').val('');
		if($('#get_billing_address').is(':checked')){
			$('#billing_address').val($('#shipping_address').val());
			$('#billing_country').val($('#shipping_country').val());
			$('#billing_state').val($('#shipping_state').val());
			$('#billing_city').val($('#shipping_city').val());
			$('#billing_zipcode').val($('#shipping_zipcode').val());
		}
	});

//$(document).ready(function(e) {
    var saveOrderURL = "<?php echo e(url('/admin/save-order/')); ?>";
	var returnURL = "<?php echo e(url('/admin/view-order-details/')); ?>";
	var listDataURL = "<?php echo e(url('/admin/orders/')); ?>";
	var saveCustomerURL = "<?php echo e(url('/admin/save-customer/')); ?>";
	var formSubmitted = false;
	var searchDataURL = "<?php echo e(url('/admin/search-product/')); ?>";
	var loadProductURL = "<?php echo e(url('/admin/load-product/')); ?>";
	var saveDataURL = "<?php echo e(url('/admin/search-customer-address/')); ?>";
	var viewDataURL = "<?php echo e(url('/admin/search-customer-address-view/')); ?>";
	var getCustomersDataURL = "<?php echo e(url('/admin/get-customers/')); ?>";
		
//});

function searchProductOrder(keyword,counter){
	if(keyword != ""){
		var pageType = $('#page_name').val();
		var vendorId = $('#vendor_id').val();
		$.ajax({
			url: "<?php echo e(url('admin/search-product-list')); ?>",
			data: {keyword:keyword,counter:counter,pageType:pageType,vendorId:vendorId},
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success:function(response){
				$('#search_products'+counter).show().html(response);
			}
		});	
	}else{
		$('#search_products'+counter).html('').hide();
	}
}
function getStateByCountry(countryId){
	if(countryId != '' && $.isNumeric(countryId)){
		$('#state').html('');
		$.ajax({
			url: "<?php echo e(url('admin/get-state')); ?>",
			data: {countryId:countryId},
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success:function(response){
				$('#state').html("<select name='state' id='state' onchange='getCityByState(this.value)' class='customer_info_value choices form-select'>"+response+"</select>");
			}
		});	
		return false;
	}
}

function getCityByState(stateId){
	if(stateId != '' && $.isNumeric(stateId)){
		$('#city').html('');
		$.ajax({
			url: "<?php echo e(url('admin/get-city')); ?>",
			data: {stateId:stateId},
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success:function(response){
				var city_val = $('#city_ids').val();							
				$('#city').html("<select name='city' id='city' class='customer_info_value choices form-select'>"+response+"</select>");
			}
		});	
		return false;
	}
}

$(document).on('click','#edit_user_btn',function(){
	$('#edit_order_modal').modal('show');
});


</script>

<div class="modal fade" id="edit_order_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog 	modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Customer Info!</h4>
            </div>
            <div class="modal-body text-center" id="errorMsgPopUp">

                <div class="card">
                                            
                <div style="border: 1px solid #ddd;padding: 10px;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Customer Name" class="customer_info_value form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="email" id="email" placeholder="Customer Email" class="customer_info_value form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="mobile" id="mobile" placeholder="Customer Contact" maxlength="10" class="customer_info_value form-control"/>
                        </div>
                    </div>
                     
                    </div>
                      
                </div>
                
                </div>
                
                <div class="card">                
                    
                <div style="border: 1px solid #ddd;padding: 10px;">                
                    <div class="row">
                    <span><b class="text-center">Shipping Information</b> </span>                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="shipping_address" id="shipping_address" placeholder="Shipping Address" class="customer_info_value form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="shipping_country" placeholder="Shipping Country" id="shipping_country" class="customer_info_value form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="shipping_state" id="shipping_state" placeholder="Shipping State" class="customer_info_value form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="shipping_city" id="shipping_city" placeholder="Shipping City" class="customer_info_value form-control"/>
                        </div>
                    </div>  
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="shipping_zipcode" maxlength="6" placeholder="Shipping Zipcode" id="shipping_zipcode" class="customer_info_value form-control"/>
                        </div>
                    </div> 
                    </div>
                </div>
                </div>
                                            
               	<div class="card">
                
                 <span style="float:right;"><input type="checkbox" id="get_billing_address"> Same as Shipping Address</span>  
                
                <div style="border: 1px solid #ddd;padding: 10px;">
                
                <div class="row">
                    <b>Billing Information</b>                                               
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="billing_address" placeholder="Billing Address" id="billing_address" class="customer_info_value form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="billing_country" placeholder="Billing Country" id="billing_country" class="customer_info_value form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="billing_state" placeholder="Billing State" id="billing_state" class="customer_info_value form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="billing_city" id="billing_city" placeholder="Billing City" class="customer_info_value form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="billing_zipcode" maxlength="6" placeholder="Billing Zipcode" id="billing_zipcode" class="customer_info_value form-control"/>
                        </div>
                    </div>                                                                                               
                    </div>
                    
                    </div>                     
                </div>
                   
                
            
   				</form>
                
            </div>
            <div class="modal-footer">
                <button type="button" id="submit_customer" class="btn btn-primary waves-effect">Submit</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('public/admin/js/pages/orders/add-order.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/orders/add-order.blade.php ENDPATH**/ ?>