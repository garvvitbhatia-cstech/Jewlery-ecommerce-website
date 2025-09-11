

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
    height: 76px;
    padding: 10px;
    font-size: 13px; cursor:pointer}
.p_dropdown ul li:hover{ background:#435ebe; color:#fff}
.page-title{background-color: #fff;
    padding: 14px;
    margin-bottom: 10px;
    border-radius: 5px;}
 .dropzone {
    border: 1px solid #dce7f1;
}
.text-right{ text-align:right}
@media (min-width: 1200px){
	.h3, h3 {
		font-size: 20px;
	}
}
</style>
<?php
$vendorName = 'Aayush Bharat';
$vendorEmail = '--';
$vendorPhone = '--';
$vendorInfo = Helper::getUserInfo($rowData->vendor_id);
if($rowData->vendor_id > 0){
    $vendorName = $vendorInfo->name;
    $vendorEmail = $vendorInfo->email;
    $vendorPhone = $vendorInfo->mobile;
}
?>
    <form class="form w-100" id="orderForm" action="#">
    <div class="page-heading">
  <div class="page-title sticky-top">
        <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Order #<?php echo e($rowData->id); ?> <?php echo e($vendorName); ?> <?php echo e(date('d/m/Y H:i:s',strtotime($rowData->created_at))); ?></h3>
          </div>
      <div class="col-12 col-md-6 order-md-2 order-first text-right">
            <a class="btn btn-sm btn-primary fw-bolder me-3 my-2" href="<?php echo e(url('/admin/edit-order',base64_encode($rowData->id))); ?>">Edit Order</a>
            <a class="btn btn-sm btn-primary fw-bolder me-3 my-2" onclick="generatePDF();">Generate PDF</a> 
            <button type="button" id="form_update_order" class="btn btn-sm btn-primary fw-bolder me-3 my-2"> <span class="indicator-label" id="form_update_order">Save Order</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>
            <?php if($rowData->clone_order_id == NULL && $admin_type == 'Admin'): ?>
            
            <button type="reset" class="btn btn-sm btn-dark fw-bolder me-3 my-2" data-kt-menu-dismiss="true" id="clone_this_btn_<?php echo e($rowData->id); ?>" onclick="cloneOrder('<?php echo e($rowData->id); ?>');">Create Clone</button>
           
            <?php endif; ?>
          </div>
    </div>
      </div>
  <section class="">
        <div class="row">
      <div class="col-xs-12 col-md-2 col-sm-12">
            <div class="card">
          <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation"> <a class="nav-link active">Customer Information</a> </li>
                </ul>
                <hr />
                <div class="tab-content" id="myTabContent">
              	<div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="customer-tab">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-sm-12">
                        <div class="col-md-12">
                        <div class="form-group">
                        <input type="hidden" name="edit_order_id" value="<?php echo e($rowData->id); ?>" id="edit_order_id"/>
                        <input type="hidden" class="customer_info_value" id="customer_id_value" name="customer_id_value" value="" />
                        <input type="hidden" id="customer_name" name="customer_name" class="customer_info_value" value="<?php echo e($user_id); ?>" />
                        </div>
                    </div>
                        <div class="col-md-12" id="replace_customer"> </div>
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
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                
                <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                role="tab" aria-controls="home" aria-selected="true">Product Information</a>
                </li>
                <li class="nav-item" role="presentation">
                <a class="nav-link" id="price-tab" data-bs-toggle="tab" href="#logs"
                role="tab" aria-controls="logs" aria-selected="false">Order Logs</a>
                </li>
                </ul>
              <hr />
              
              <div class="table-responsive tab-content">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <input type="hidden" name="cod_percent" id="cod_percent" value="<?php echo e($codPercent); ?>"/>
                    <input type="hidden" name="cod_amt" id="cod_amt" value="<?php echo e($codAmt); ?>"/>
                    <input type="hidden" name="shipping_tax_amt" id="shipping_tax_amt" value="<?php echo e($shippingTax); ?>"/>
                <table class="table table-bordered table-hover table-striped" id="myProductTbl">
                    <thead>
                        <tr>
                            <td align="left" width="60%" colspan="3"><strong>Product</strong></td>
                            <td align="center" width="10%"><strong>Quantity</strong></td>
                            <td align="center" width="15%"><strong>Price</strong></td>
                            <td align="right" width="15%"><strong>Total</strong></td>
                        </tr>
                    </thead>
                    <tbody class="add_more">
                      
                  <?php if(isset($order_items) && $order_items->count() > 0): ?>
                  <?php $__currentLoopData = $order_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                             
                  <?php
                  $product_info = Helper::getProductInfo($item->product_id);
                  
                  ?>
                  <tr id="remove_<?php echo e($key+100); ?>">
                        <td colspan="3">
                      <div style="width:215px;font-size:12px;" id="p_selected_data<?php echo e($key+100); ?>"> <?php echo e($item->product_name); ?><br />
                            <?php echo e($product_info->product_code); ?><br />
                            <?php echo e($vendorName); ?> </div></td>
                        <td align="center"><?php echo e($item->quqntity); ?></td>
                        <td align="center"><?php echo e($item->price); ?></td>
                        <?php
                        $total = (($item->price * $item->quqntity) - ($item->discount + $item->shipping));
                        ?>
                        <td align="right"><?php echo e($total); ?></td>
                      </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                    </tbody>
                  
                  <tr>
                        <td align="right" colspan="4"></td>
                        <td style="border-right:1px solid #000; font-size:14px">Sub Total</td>
                        <td id="totalSum" align="right" colspan="4"><?php echo e($rowData->sub_total); ?></td>
                      </tr>
                  <tr>
                        <td colspan="4"></td>
                        <td style="border-right:1px solid #000; font-size:14px">Packaging Cost</td>
                        <td id="totalSum" align="right" colspan="4"><?php echo e($rowData->packaging_cost); ?></td>
                      </tr>
                  <tr>
                        <td colspan="4"></td>
                        <td style="border-right:1px solid #000; font-size:14px">
                        Product Tax<br />
                        <?php if($vendorState == $OrderState): ?>
                        <span style="font-size:11px; color:#000">CGST: <?php echo e(number_format($rowData->product_tax/2,2)); ?></span><br />
                        <span style="font-size:11px;color:#000">CGST: <?php echo e(number_format($rowData->product_tax/2,2)); ?></span>
                        <?php else: ?>
                        <span style="font-size:11px;color:#000">IGST: <?php echo e($rowData->product_tax); ?></span>
                        <?php endif; ?>
                        </td>
                        <td id="totalSum" align="right" colspan="4"><?php echo e($rowData->product_tax); ?></td>
                      </tr>
                  <tr>
                        <td colspan="4"></td>
                        <td style="border-right:1px solid #000; font-size:14px">Shipping Cost</td>
                        <td id="totalSum" align="right" colspan="4"><?php echo e($rowData->shipping); ?></td>
                      </tr>
                  <tr>
                        <td colspan="4"><?php echo e($shippingTax); ?>%</td>
                        <td style="border-right:1px solid #000; font-size:14px">Shipping Tax<br />
                        <?php if($vendorState == $OrderState): ?>
                        <span style="font-size:11px; color:#000">CGST: <?php echo e(number_format($rowData->shipping_tax/2,2)); ?></span><br />
                        <span style="font-size:11px;color:#000">CGST: <?php echo e(number_format($rowData->shipping_tax/2,2)); ?></span>
                        <?php else: ?>
                        <span style="font-size:11px;color:#000">IGST: <?php echo e($rowData->shipping_tax); ?></span>
                        <?php endif; ?>
                        </td>
                        <td id="totalSum" align="right" colspan="4"><?php echo e($rowData->shipping_tax); ?></td>
                      </tr>
                  <tr>
                        <td colspan="4"> In percentage  <?php echo e($codPercent); ?>% | In Rupees   <?php echo e($codAmt); ?> INR </td>
                        <td style="border-right:1px solid #000; font-size:14px">COD Amount</td>
                        <td id="totalSum" align="right" colspan="4"><?php echo e($rowData->cod_amount); ?></td>
                      </tr>
                  <tr>
                        <td colspan="3"></td>
                        <td></td>
                        <td style="border-right:1px solid #000; font-size:14px">Discount</td>
                        <td id="totalSum" align="right" colspan="4"><?php echo e($rowData->discount); ?></td>
                      </tr>
                  <tr>
                        <td colspan="4"></td>
                        <td style="border-right:1px solid #000; font-size:14px">Grand Total</td>
                        <td id="grandTotal" align="right" colspan="2"><?php echo e($rowData->grand_total); ?></td>
                      </tr>
                </table>
              </div>
              
              <div class="tab-pane fade hide" id="logs" role="tabpanel" aria-labelledby="logs-tab"><div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="myProductTbl">
                <thead>
                <tr>
                <th>S.No</th>
                <th>Activity</th>
                <th>Added By</th>
                <th>Date Time</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($logs) && $logs->count() > 0): ?>
                <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $adminInfo = Helper::getUserInfo($log->added_by);
                ?>
                <tr>
                <td><?php echo e($key+1); ?></td>
                <td><?php echo e($log->activity); ?></td>
                <td><?php echo e($adminInfo->name); ?></td>
                <td><?php echo e(date('d/m/Y H:i:s',strtotime($log->created_at))); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <tr>
                <td align="center" colspan="4">No Logs!</td>
                </tr>
                <?php endif; ?>
                </tbody>
                </table>
              </div></div>
              
                    
              </div>
            </div>
              </div>
        </div>
            <?php if($offers->count() > 0): ?>
            <div class="card">
          <div class="card-body">
                <div class="row">
              <div class="row">
                    <div class="col-md-12"> <?php 
                  $totalDiscountApplied = 0;
                  ?>
                  <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                  $sign = 'INR';
                  if($offer->discount_type == 'Percent'){
                  $sign = '%';
                  }
                  ?>
                  <?php if($offer->type == 'Coupon'): ?>
                  <div class="form-group">
                        <p style="color:#093"><b><?php echo e($offer->coupon_code); ?></b> applied successfully. <?php echo e($offer->discount); ?> <?php echo e($sign); ?> OFF (Discount <?php echo e($offer->discount_amt); ?> INR) </p>
                      </div>
                  <?php else: ?>
                  <div class="form-group">
                        <p style="color:#093"><?php echo e($offer->description); ?></p>
                      </div>
                  <?php endif; ?>
                  <?php 
                  $totalDiscountApplied = $totalDiscountApplied+$offer->discount_amt;
                  ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                  <?php 
                  $remainingDiscount = $rowData->discount - $totalDiscountApplied;
                  ?>
                  <?php if($remainingDiscount > 0): ?>
                  <div class="form-group">
                        <p style="color:#093"><?php echo e($remainingDiscount); ?> INR Manual discount applied</p>
                      </div>
                  <?php endif; ?> </div>
                  </div>
            </div>
              </div>
        </div>
            <?php endif; ?>
            
                <?php if($notes->count() > 0): ?>
                <div class="card">
                <div class="card-body">
                <div class="row">
                <div class="row"> <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-12">
                <div>
                <p><b><?php echo nl2br($note->notes); ?></b></p>
                <p><?php echo e($note->name); ?>, <?php echo e($note->created_at); ?></p>
                </div>
                </div>
                <hr />
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>               
                </div>
                </div>
                </div>
                <?php endif; ?>
                <br />
                  <br />
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                                <label for="">Notes</label>
                                <textarea name="notes" id="notes" rows="6" class="form-control"></textarea>
                              </div>
                        </div>
                    </div>
        
        <?php if($order_items->count() > 0): ?>
            <div class="card">
          <div class="card-body">
                <div class="row table-responsive">
              <table class="table table-bordered table-hover table-striped" id="myProductTbl">
                    <thead>
                  <tr>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Video</th>
                        <th>Batch No</th>
                        <th>Expiry Date</th>
                      </tr>
                </thead>
                    <tbody>
                
                    <?php if(isset($order_items) && $order_items->count() > 0): ?>
                    <?php $__currentLoopData = $order_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                  <td><?php echo e($item->product_name); ?></td>
                  <td> <?php if($item->p_shipping_image != ""): ?>
                        <div class="d-flex align-items-center"> <img src="<?php echo e(URL::asset('public/admin/images/orders/')); ?>/<?php echo $item->p_shipping_image; ?>"  style="max-width: 80px;height: auto;"> </div>
                        <?php else: ?>
                        Not Available                                
                        <?php endif; ?> </td>
                  <td> <?php if($item->p_shipping_video != ""): ?>
                        <?php
                        $explode = explode('.',$item->p_shipping_video);
                        $ext = '';
                        if(isset($explode[1])){
                        $ext = $explode[1];
                        }
                        ?>
                        <?php if($ext != ''): ?>
                        <div class="d-flex align-items-center">
                      <video width="220" height="140" controls>
                            <source src="<?php echo e(URL::asset('public/admin/images/orders/')); ?>/<?php echo $item->p_shipping_video; ?>" type="video/<?php echo e($ext); ?>">
                          </video>
                    </div>
                        <?php endif; ?>                        
                        <?php else: ?>
                        Not Available
                        <?php endif; ?> </td>
                  <td><?php echo e($item->batch_no); ?></td>
                  <td><?php echo e($item->expiry_date); ?></td>
                </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                      </tbody>
                    
                  </table>
            </div>
              </div>
        </div>
        <?php endif; ?>
        
          </div>
      <div class="col-xs-12 col-md-3 col-sm-12">
            
            <div class="card">
          <div class="card-body">
                <div class="row">
              <div class="col-md-12">
                    <div class="form-group">
                  <label for="basicInput"><strong>Order Status:</strong> </label>
                  	<select name="order_status" id="order_status" class="form-select">
                        
                      <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $statuse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>:
                                        	
                        <option <?php if($rowData->order_status == $statuse->title): ?> selected="selected" <?php endif; ?> value="<?php echo e($statuse->title); ?>"><?php echo e($statuse->title); ?></option>
                        
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
                  <label for="basicInput"><strong>Payment Method Type:</strong> </label>
                  <?php echo e($rowData->payment_method_type); ?>

                </div>
                    <div <?php if($rowData->payment_method_type == 'COD'): ?> style="display:none" <?php endif; ?> id="payment_method_div" class="form-group">
                  <label for="basicInput">Payment Method: </label> <?php echo e($rowData->payment_method); ?>

                </div>
                  </div>
            </div>
              </div>
        </div>
        <div class="card">
          <div class="card-body">
                <div class="row">
              <div class="col-md-12">
              		<?php if($rowData->payment_method_type == 'COD'): ?>
              		<div class="form-group">
                    <label for=""><strong>Tracking(AWB) no:</strong> </label>
                    <?php echo e($rowData->txn_id); ?>

                    </div>
                    <div class="form-group">
                    <label for=""><strong>Picked Up Date/Time:</strong> </label>
                    <?php echo e($rowData->txn_id); ?>

                    </div>
                    <?php else: ?>
                    <div class="form-group">
                    <label for=""><strong>Transaction ID:</strong> </label>
                    <?php echo e($rowData->txn_id); ?>

                    </div>
                    <div class="form-group">
                    <label for=""><strong>Payment Date/Time:</strong> </label>
                    <?php echo e($rowData->txn_id); ?>

                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                    <label for=""><strong>Settlement UTR:</strong> </label>
                    <?php echo e($rowData->txn_id); ?>

                    </div> 
                    <div class="form-group">
                    <label for=""><strong>Settlement UTR Date/Time:</strong> </label>
                    <?php echo e($rowData->txn_id); ?>

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
                  <label for=""><strong>Shipping Method Name:</strong> </label>
                  <?php echo e(Helper::getShippingMethod($rowData->shipping_method_id,'title')); ?>

                </div>                    
            </div>
              </div>
        </div>
        </div>
            <?php if($shipping_histories->count() > 0): ?>
            <div class="card">
          <div class="card-body">
                <div class="row">
              <div class="col-md-12"> <?php $__currentLoopData = $shipping_histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shipping_history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                  <p><strong>Tracking ID:</strong> <?php echo e($shipping_history->tracking_no); ?></p>
                  <p><?php echo e($shipping_history->notes); ?></p>
                  <p><strong>Date Time:</strong> <?php echo e(date('d/m/Y H:i:s',strtotime($shipping_history->created_at))); ?></p>
                </div>
                    <hr />
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
            </div>
              </div>
        </div>
            <?php endif; ?> 
    </div>
      </section>
</div>
    <input type="hidden" id="page_name" name="page_name" value="EditOrder"/>
    <input type="hidden" id="vendor_id" name="vendor_id" value="<?php echo e($rowData->vendor_id); ?>"/>
    <input type="hidden" id="country_ids"/>
    <input type="hidden" id="state_ids"/>
    <input type="hidden" id="city_ids"/>

    <!-- end plugin js -->
 
    <div class="modal fade" id="edit_order_info_modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
          	<div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Order Info!</h4>
         	</div>
          <div id="get_order_info"></div>
        </div>
      </div>
    </div>
    
<script type="text/javascript">
	function cloneOrder(row_id){
		if(row_id != ''){
			var siteUrl = $('body').attr('data-base-url');
			$('#clone_this_btn_'+row_id).attr('disabled','true');
			$('#clone_this_btn_'+row_id).html('Processing...');
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
	}
//$(document).ready(function(e) {
	var updateOrderURL = "<?php echo e(url('/admin/update-order/')); ?>";
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
function generatePDF(){
	var oid = '<?php echo e($rowData->id); ?>';
	
	$.ajax({
			url: "<?php echo e(url('admin/generate-order-pdf')); ?>",
			data: {oid:oid},
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success:function(response){
				
			}
		});
}
function company_video(order_id){
		var manish = 1;	
		var ext = $('#CompanyVideo_'+order_id).val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['mp4', 'mov', 'wmv', 'flv', 'avi', 'webm', 'mkv']) == -1){
			swal({
				title: "Oops!",
				text: 'Only mp4, mov, wmv, flv, avi, webm, mkv files are allowed.',
				type: "warning",
				timer: 3000
			});
			manish = 0;
			return false;
		}
	
		if(manish == 1){			
			var formData = new FormData();
			formData.append('CompanyVideo', $('#CompanyVideo_'+order_id)[0].files[0]);
			formData.append('order_id', order_id);
			$.ajax({
				url: "<?php echo e(url('admin/change-order-video')); ?>",
				data: formData,
				processData: false,
				contentType: false,
				type: 'POST',
				dataType: 'JSON',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success:function(response){
					console.log(response);
					if(response.data.msg == 'Error'){
						swal({
							title: "Oops!",
							text: 'Something went wrong.',
							type: "warning",
							timer: 3000
						});
						return false;
					}else{
						setTimeout(function(){							
							$('#CompanyVideoDiv_'+order_id).html('success');
						}, 1000);
					}
				}
			});
		}
	}
	
	function company_image(order_id){
		var manish = 1;	
		var ext = $('#CompanyLogo_'+order_id).val().split('.').pop().toLowerCase();
	
		if($.inArray(ext, ['jpeg', 'jpg', 'png', 'webp']) == -1){
			$('#errorMsgPopUp').html('.');
			swal({
				title: "Oops!",
				text: 'Only jpg, png, webp files are allowed.',
				type: "warning",
				timer: 3000
			});
			manish = 0;
			return false;
		}
	
		if(manish == 1){			
			var formData = new FormData();
			formData.append('CompanyLogo', $('#CompanyLogo_'+order_id)[0].files[0]);
			formData.append('order_id', order_id);
			$.ajax({
				url: "<?php echo e(url('admin/change-order-image')); ?>",
				data: formData,
				processData: false,
				contentType: false,
				type: 'POST',
				dataType: 'JSON',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success:function(response){
					console.log(response);
					if(response.data.msg == 'Error'){
						swal({
							title: "Oops!",
							text: 'Something went wrong.',
							type: "warning",
							timer: 3000
						});
						return false;
					}else{
						setTimeout(function(){							
							$('#CompanyLogoDiv_'+order_id).html('success');
						}, 1000);
					}
				}
			});
		}
	}
	
	function updateNewOrderInfo(id){
		var batch_no = $('#batch_no_'+id).val();
		var expiry_date = $('#expiry_date_'+id).val();
		
		if(id != ''){
			$.ajax({
				url: "<?php echo e(url('admin/update-order-info')); ?>",
				data: {batch_no:batch_no, expiry_date:expiry_date, id:id},
				type: 'POST',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success:function(response){
					
				}
			});
			return false;	
		}
	}
	$(document).on('click','#updateOrderInfo',function(){	
		$('#edit_order_info_modal').modal('hide');
		swal({
			text: 'Product Information Update Successfully',
			type: "success",
			timer: 2000
		});
	});

$(document).on('change','#order_status',function(){
	var value = $(this).val();
	if(value == 'Shipped'){
		let rowID = "<?php echo e($rowData->id); ?>";
		if(rowID != ""){
			$.ajax({
				url: "<?php echo e(url('admin/get-order-info')); ?>",
				data: {rowID:rowID},
				type: 'POST',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success:function(response){
					if(response != 'Error'){
						$('#get_order_info').html(response);
						$('#edit_order_info_modal').modal('show');
					}else{
						swal({
							title: "Oops!",
							text: 'Something went wrong.',
							type: "warning",
							timer: 3000
						});	
					}
				}
			});	
			return false;
		}		
	}
});
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


$(document).ready(function(e) {
    $('#customer_name').trigger('change');
});


</script>
    
    <script src="<?php echo e(asset('public/admin/js/pages/orders/add-order.js')); ?>"></script> 
    <script src="<?php echo e(asset('public/admin/js/pages/orders/view-order.js')); ?>"></script> 
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/orders/view-page.blade.php ENDPATH**/ ?>