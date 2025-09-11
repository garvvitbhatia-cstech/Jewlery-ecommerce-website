

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
.page-title{background-color: #fff;
    padding: 14px;
    margin-bottom: 10px;
    border-radius: 5px;}
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
      <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/orders')); ?>">Orders</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Details</li>
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
                <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation"> <a class="nav-link active">Customer Information</a> </li>
              <!--<li class="nav-item" role="presentation">
                                    <a class="nav-link" id="customer-tab" data-bs-toggle="tab" href="#customer"
                                        role="tab" aria-controls="customer" aria-selected="true">Customer Info</a>
                                </li>-->
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
                            <label for="basicInput">Customer Information</label>
                            <select class="form-select" id="customer_name" class="customer_info_value" name="customer_name">
                            <option value="">Select Customer</option>
                            <option value="">New Customer</option>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($user_id == $user->id): ?> selected="selected" <?php endif; ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                      <div class="" id="edit_user_div" style="display:none;float:right">
                            <button type="button" class="btn btn-primary" id="edit_user_btn"> Edit </button>
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
                    <li class="nav-item" role="presentation"> <a class="nav-link active">Product Information</a> </li>
                    <!--<li class="nav-item" role="presentation">
                                    <a class="nav-link" id="customer-tab" data-bs-toggle="tab" href="#customer"
                                        role="tab" aria-controls="customer" aria-selected="true">Customer Info</a>
                                </li>-->
                  </ul>
              <hr />
              <div class="table-responsive">
                    <input type="hidden" name="cod_percent" id="cod_percent" value="<?php echo e($codPercent); ?>"/>
                    <input type="hidden" name="cod_amt" id="cod_amt" value="<?php echo e($codAmt); ?>"/>
                    <input type="hidden" name="shipping_tax_amt" id="shipping_tax_amt" value="<?php echo e($shippingTax); ?>"/>
                    <table class="table table-bordered table-hover table-striped" id="myProductTbl">
                  <thead>
                        <tr>
                      <th colspan="2">Product</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Total</th>
                      <th>Action</th>
                    </tr>
                      </thead>
                  <tbody class="add_more">
                      
                  <?php if(isset($order_items) && $order_items->count() > 0): ?>
                  <?php $__currentLoopData = $order_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                             
                  <?php
                  $product_info = Helper::getProductInfo($item->product_id);
                  
                  
                  
                  ?>
                  <tr id="remove_<?php echo e($key+100); ?>">
                        <td colspan="2"><input type="hidden" name="edit_pid[Old][]" row_id="<?php echo e($key+100); ?>" id="edit_pid<?php echo e($key+100); ?>" value="<?php echo e($item->id); ?>"/>
                      <input type="hidden" name="product_id2[Old][]" row_id="<?php echo e($key+100); ?>" id="product_id<?php echo e($key+100); ?>" value="<?php echo e($item->product_id); ?>"/>
                      <input type="hidden" name="product_tax2[Old][]" value="<?php echo e($item->product_tax); ?>" row_id="<?php echo e($key+100); ?>" id="product_tax<?php echo e($key+100); ?>"/>
                      <input type="hidden" name="product_tax_include2[Old][]" value="<?php echo e($item->product_tax_include); ?>" row_id="<?php echo e($key+100); ?>" id="product_tax_include<?php echo e($key+100); ?>"/>
                      <input type="hidden" name="product_package_cost2[Old][]" value="<?php echo e($item->product_package_cost); ?>" row_id="<?php echo e($key+100); ?>" id="product_package_cost<?php echo e($key+100); ?>"/>
                      <input type="hidden" name="product_package_type2[Old][]" value="<?php echo e($item->product_package_type); ?>" row_id="<?php echo e($key+100); ?>" id="product_package_type<?php echo e($key+100); ?>"/>
                      <input type="hidden" name="product_shipping_cost2[Old][]" value="<?php echo e($item->product_shipping_cost); ?>" row_id="<?php echo e($key+100); ?>" id="product_shipping_cost<?php echo e($key+100); ?>"/>
                      <input type="hidden" name="product_shipping_cost_time2[Old][]" value="<?php echo e($item->product_shipping_cost_time); ?>" row_id="<?php echo e($key+100); ?>" id="product_shipping_cost_time<?php echo e($key+100); ?>"/>
                      <input type="hidden" name="cost_depend_shipping2[Old][]" value="<?php echo e($item->cost_depend_shipping); ?>" row_id="<?php echo e($key+100); ?>" id="cost_depend_shipping<?php echo e($key+100); ?>"/>
                      <input type="hidden" name="weight_depend_shipping2[Old][]" value="<?php echo e($item->weight_depend_shipping); ?>" row_id="<?php echo e($key+100); ?>" id="weight_depend_shipping<?php echo e($key+100); ?>"/>
                      <input type="hidden" name="is_free_shipping2[Old][]" value="<?php echo e($item->is_free_shipping); ?>" row_id="<?php echo e($key+100); ?>" id="is_free_shipping<?php echo e($key+100); ?>"/>
                      <input style="width:215px; display:none" type="text" class="form-control" onkeyup="searchProductOrder(this.value,'<?php echo e($key+100); ?>');" placeholder="Search product title" id="product_name<?php echo e($key+100); ?>" value="<?php echo e($item->product_name); ?>" row_id="<?php echo e($key+100); ?>" name="product_name[]" />
                      <div class="p_dropdown" id="search_products<?php echo e($key+100); ?>"></div>
                      <div style="width:215px;font-size:12px;" id="p_selected_data<?php echo e($key+100); ?>"> <?php echo e($item->product_name); ?><br />
                            <?php echo e($product_info->product_code); ?><br />
                            <?php echo e($vendorName); ?> </div></td>
                        <td><input type="text" maxlength="3" value="<?php echo e($item->quqntity); ?>" name="product_qty2[Old][]" id="product_qty<?php echo e($key+100); ?>"  row_id="<?php echo e($key+100); ?>" class="product_qty form-control" onblur="setPrice('<?php echo e($key+100); ?>');" /></td>
                        <td><input type="text" value="<?php echo e($item->price); ?>" row_id="<?php echo e($key+100); ?>" name="product_price2[Old][]" onblur="setPrice('<?php echo e($key+100); ?>');" id="product_price<?php echo e($key+100); ?>" class="product_price form-control"/></td>
                        <?php
                        $total = (($item->price * $item->quqntity) - ($item->discount + $item->shipping));
                        ?>
                        <td><input type="text" readonly="readonly" value="<?php echo e($total); ?>" row_id="<?php echo e($key+100); ?>" name="total[]"  id="total<?php echo e($key+100); ?>" class="total form-control"/></td>
                        <td><a class="btn btn-danger remove" onclick="remove(<?php echo e($key+100); ?>);removeParmanent(<?php echo e($item->id); ?>)"><i class="bi bi-trash"></i></a></td>
                      </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                    </tbody>
                  
                  <tr>
                        <td align="right" colspan="4"><button style="float:right; margin-bottom:5px;" type="button" class="btn btn-info addMoreBtn" onclick="add_more()">+ Add</button></td>
                        <td style="border-right:1px solid #000; font-size:14px">Sub Total</td>
                        <td id="totalSum" colspan="4"><input type="text" readonly="readonly" id="subTotal" name="subTotal" class="form-control" value="<?php echo e($rowData->sub_total); ?>" /></td>
                      </tr>
                  <tr>
                        <td colspan="4"></td>
                        <td style="border-right:1px solid #000; font-size:14px">Packaging Cost</td>
                        <td id="totalSum" colspan="4"><input type="text" onblur="CustomSetting();" id="packageCost" name="packageCost" class="form-control" value="<?php echo e($rowData->packaging_cost); ?>" /></td>
                      </tr>
                  <tr>
                        <td colspan="4"></td>
                        <td style="border-right:1px solid #000; font-size:14px">Product Tax</td>
                        <td id="totalSum" colspan="4"><input type="text" readonly="readonly" id="tax" name="productTax" class="form-control" value="<?php echo e($rowData->product_tax); ?>" /></td>
                      </tr>
                  <tr>
                        <td colspan="4"></td>
                        <td style="border-right:1px solid #000; font-size:14px">Shipping Cost</td>
                        <td id="totalSum" colspan="4"><input type="text" onblur="CustomSetting();" id="shippingCost" name="shippingCost" class="form-control" value="<?php echo e($rowData->shipping); ?>" /></td>
                      </tr>
                  <tr>
                        <td colspan="4"><?php echo e($shippingTax); ?>%</td>
                        <td style="border-right:1px solid #000; font-size:14px">Shipping Tax</td>
                        <td id="totalSum" colspan="4"><input type="text" id="shippingTax" name="shippingTax" readonly="readonly" class="form-control" value="<?php echo e($rowData->shipping_tax); ?>" /></td>
                      </tr>
                  <tr>
                        <td colspan="4"> In percentage  <?php echo e($codPercent); ?>% | In Rupees   <?php echo e($codAmt); ?> INR </td>
                        <td style="border-right:1px solid #000; font-size:14px">COD Amount</td>
                        <td id="totalSum" colspan="4"><input type="text" onblur="CustomSetting();" id="codAmt" name="codAmt" class="form-control" value="<?php echo e($rowData->cod_amount); ?>" /></td>
                      </tr>
                  <tr>
                        <td colspan="3"><div class="form-group">
                            <input type="text" id="coupon_code" name="coupon_code" placeholder="Enter coupon code" class="form-control" />
                          </div></td>
                        <td><div class="form-group"> <a onclick="applyCouponCode($('#coupon_code').val());" class="btn btn-sm btn-success fw-bolder me-3 my-2">Apply</a> </div></td>
                        <td style="border-right:1px solid #000; font-size:14px">Discount</td>
                        <td id="totalSum" colspan="4"><input type="text" onblur="CustomSetting();" class="form-control" id="discount" name="discount" value="<?php echo e($rowData->discount); ?>" /></td>
                      </tr>
                  <tr>
                        <td colspan="4"></td>
                        <td style="border-right:1px solid #000; font-size:14px">Grand Total</td>
                        <td id="grandTotal" colspan="2"><?php echo e($rowData->grand_total); ?></td>
                        <input type="hidden" id="hiddenTotal" value="<?php echo e($rowData->grand_total); ?>" name="grand_total"/>
                      </tr>
                </table>
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
                        <p style="color:#093"><b><?php echo e($offer->coupon_code); ?></b> applied successfully. <?php echo e($offer->discount); ?> <?php echo e($sign); ?> OFF (Discount <?php echo e($offer->discount_amt); ?> INR) <a onclick="removeDiscount('<?php echo e($offer->id); ?>');" style="color:#F00;cursor:pointer">Remove</a></p>
                      </div>
                  <?php else: ?>
                  <div class="form-group">
                        <p style="color:#093"><?php echo e($offer->description); ?> <a onclick="removeDiscount('<?php echo e($offer->id); ?>');" style="color:#F00;cursor:pointer">Remove</a></p>
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
            <div class="card">
          <div class="card-body">
                <div class="row">
              <div class="row"> <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-12">
                  <div>
                        <p><?php echo e($note->notes); ?></p>
                        <p><b><?php echo e($note->name); ?>, <?php echo e($note->created_at); ?></b></p>
                      </div>
                </div>
                    <hr />
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
              <br />
              <br />
              <div class="row">
                    <div class="col-md-12">
                  <div class="form-group">
                        <label for="">Notes</label>
                        <textarea name="notes" id="notes" rows="6" class="form-control"><?php echo e($rowData->notes); ?></textarea>
                      </div>
                </div>
                  </div>
            </div>
              </div>
        </div>
            <div class="card">
          <div class="card-body">
                <div class="row">
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
          </div>
      <div class="col-xs-12 col-md-3 col-sm-12">
            <div class="card">
          <div class="card-body">
                <div class="row">
              <div class="text-left">
                    <div> 
                  <!--begin::Submit button-->
                  <button type="button" id="form_submit_order1" class="btn btn-sm btn-primary fw-bolder me-3 my-2"> <span class="indicator-label" id="formSubmit">Save Order</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>
                  
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
            <?php if($rowData->clone_order_id != NULL): ?>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="basicInput">Vendors</label>
                        <select id="select_vendor" class="form-select">
                        <option value="">Select Vendor</option>
                        <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>:
                            <option shipping_method_ids="<?php echo e($vendor->shipping_method_id); ?>" <?php if($rowData->vendor_id == $vendor->id): ?> selected="selected" <?php endif; ?> value="<?php echo e($vendor->id); ?>"><?php echo e($vendor->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <div class="card">
          <div class="card-body">
                <div class="row">
              <div class="col-md-12">
                    <div class="form-group">
                  <label for="basicInput">Order Status</label>
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
                  <label for="basicInput">Payment Method Type</label>
                  <select onchange="setTotal(); $(this).val() == 'COD' ? $('#payment_method_div').hide() : $('#payment_method_div').show()" name="payment_method_type" id="payment_method_type" class="form-control">
                        <option <?php if($rowData->payment_method_type == 'COD'): ?> selected="selected" <?php endif; ?> value="COD">COD</option>
                        <option <?php if($rowData->payment_method_type == 'PREPAID'): ?> selected="selected" <?php endif; ?> value="PREPAID">PREPAID</option>
                      </select>
                </div>
                    <div <?php if($rowData->payment_method_type == 'COD'): ?> style="display:none" <?php endif; ?> id="payment_method_div" class="form-group">
                  <label for="basicInput">Payment Method</label>
                  <select name="payment_method" id="payment_method" class="form-control">
                        <option <?php if($rowData->payment_method == 'PAYTM'): ?> selected="selected" <?php endif; ?> value="PAYTM">PAYTM</option>
                        <option <?php if($rowData->payment_method == 'HDFC ETC'): ?> selected="selected" <?php endif; ?> value="HDFC ETC">HDFC ETC</option>
                      </select>
                </div>
                  </div>
            </div>
              </div>
        </div>
            <div class="card">
          <div class="card-body">
                <div class="row">
              <div class="col-md-12"> <?php if($rowData->clone_order_id == NULL): ?>
                    <div class="form-group">
                  <label for="">Shipping Method Name</label>
                  <select name="shipping_method_id" id="shipping_method_id" class="form-select">
                        
                        
            		<?php $__currentLoopData = $shipping_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shipping_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        	
                        
                        <option <?php if($rowData->shipping_method_id == $shipping_method->id): ?> selected="selected" <?php endif; ?> value="<?php echo e($shipping_method->id); ?>"><?php echo e($shipping_method->title); ?></option>
                        
                        
          			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                      
                      </select>
                </div>
                    <?php else: ?>
                    <input type="hidden" name="shipping_method_id" id="shipping_method_id" value="<?php echo e($rowData->shipping_method_id); ?>"/>
                    <?php endif; ?>
                    <div class="form-group">
                  <label for="basicInput">Tracking No</label>
                  <input type="text" id="tracking_no" name="tracking_no" value="<?php echo e($rowData->tracking_no); ?>" class="form-control" />
                </div>
                    <div class="form-group">
                  <label for="basicInput">Shipping Note</label>
                  <textarea class="form-control" id="shipping_note" name="shipping_note"></textarea>
                </div>
                  </div>
              <div class="text-left">
                    <div> 
                  <!--begin::Submit button-->
                  <button type="button" id="form_submit_order1" class="btn btn-sm btn-primary fw-bolder me-3 my-2"> <span class="indicator-label" id="formSubmit">Save Order</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>
                  
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
            <?php endif; ?> </div>
    </div>
      </section>
</div>
    <input type="hidden" id="page_name" name="page_name" value="EditOrder"/>
    <input type="text" id="vendor_id" name="vendor_id" value="<?php echo e($rowData->vendor_id); ?>"/>
    <input type="hidden" id="country_ids"/>
    <input type="hidden" id="state_ids"/>
    <input type="hidden" id="city_ids"/>

    <!-- end plugin js -->

<style>
 .dropzone {
    border: 1px solid #dce7f1;
}
</style>
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
	$(document).on('change','#select_vendor',function(){	 
		var shipping_method = $(this).find('option:selected').attr("shipping_method_ids");
		var vendor_id = $(this).val();
		if(vendor_id == ''){ 
			vendor_id = '<?php echo e($rowData->vendor_id); ?>'; 
		}
		if(shipping_method == ''){ 
			shipping_method = '<?php echo e($rowData->shipping_method_id); ?>'; 
		}
		$('#vendor_id').val(vendor_id);
		$('#shipping_method_id').val(shipping_method);
	});
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
function removeParmanent(rowID){
	if(rowID != ""){
		$.ajax({
			url: "<?php echo e(url('admin/delete-product-cart')); ?>",
			data: {rowID:rowID},
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success:function(response){
			}
		});	
	}
}
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
function applyCouponCode(couponCode){
	var orderID = '<?php echo e($rowData->id); ?>';
	if(couponCode != ""){
		$.ajax({
			url: "<?php echo e(url('admin/apply-coupon-code')); ?>",
			data: {couponCode:couponCode,orderID:orderID},
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success:function(response){
				//return false;
				if(response == 'Success'){
					window.location.reload();
				}else{
					alert(response);
				}
			}
		});
	}
}
function removeDiscount(id){
	if(id > 0){
		var a = confirm('Are you sure want to remove it?');
		if(a){
			$.ajax({
				url: "<?php echo e(url('admin/remove-coupon-code')); ?>",
				data: {id:id},
				type: 'POST',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success:function(response){
					window.location.reload();
				}
			});
		}
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

$(document).ready(function(e) {
    $('#customer_name').trigger('change');
});
</script>

<div class="modal fade" id="edit_order_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
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
                <div class="row"> <b>Shipping Information</b>
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
            <div class="card"> <span style="float:right;">
              <input type="checkbox" id="get_billing_address">
              Same as Shipping Address</span>
          <div style="border: 1px solid #ddd;padding: 10px;">
                <div class="row"> <b>Billing Information</b>
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
          </div>
      <div class="modal-footer">
            <button type="button" id="submit_customer" class="btn btn-primary waves-effect">Submit</button>
          </div>
    </div>
      </div>
</div>
    <script src="<?php echo e(asset('public/admin/js/pages/orders/add-order.js')); ?>"></script> 
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/orders/edit-order.blade.php ENDPATH**/ ?>