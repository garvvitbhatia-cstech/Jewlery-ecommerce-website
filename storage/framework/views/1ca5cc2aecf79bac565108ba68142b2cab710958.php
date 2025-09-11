<?php if($records->count()>0): ?>
    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $vendorName = 'Aayush Bharat';
    $vendorEmail = '--';
    $vendorPhone = '--';
    $vendorInfo = Helper::getUserInfo($row->vendor_id);
    if($row->vendor_id > 0){
        $vendorName = $vendorInfo->name;
        $vendorEmail = $vendorInfo->email;
        $vendorPhone = $vendorInfo->mobile;
   	}
    $shipments = Helper::getShipmentInfo($row->id);
    $createdBy = Helper::getUserName($row->added_by);
    ?>
    <tr>
        <td>
            <a href="<?php echo e(url('/admin/view-order-details',base64_encode($row->id))); ?>" class="d-flex align-items-center">
                Order #<?php echo $row->id; ?>

            </a>
            <span style="font-size:12px;"><?php echo e($createdBy); ?></span>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->invoice_id; ?>

            </div>
        </td>
        <td>
            <span class="fw-bold"><?php echo $row->billing_name; ?></span>
            <small><br /><?php echo $row->billing_email; ?></small>
            <small><br /><?php echo $row->billing_phone; ?></small>
        </td>
        <td>
            <span class="fw-bold"><?php echo $vendorName; ?></span>
            <small><br /><?php echo $vendorEmail; ?></small>
            <small><br /><?php echo $vendorPhone; ?></small>
        </td>
        <td>
            <div class="d-flex align-items-center">
                ₹<?php echo $row->grand_total; ?>

            </div>
        </td>
        <td>
        <select class="form-select w-75" id="order_status_<?php echo $row->id; ?>" onchange="updateStatus(<?php echo $row->id; ?>);">
            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $statuse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        	
            	<option <?php if($row->order_status == $statuse->title): ?> selected="selected" <?php endif; ?> value="<?php echo e($statuse->title); ?>"><?php echo e($statuse->title); ?></option>
            
      		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        </td>
        <td>
        <span class="fw-bold"><?php echo $row->payment_status; ?></span>
        <small><br /><?php echo $row->payment_method_type; ?></small>

        </td>
        <td>
        	<?php if($row->prescription_order_id != NULL): ?>
                Order #<?php echo $row->prescription_order_id; ?>

            <?php else: ?>
            	--
            <?php endif; ?>
        </td>
        <td>
            <?php echo date('d M, Y',strtotime($row->created_at)); ?><br />
            <?php echo date('h:i A',strtotime($row->created_at)); ?>

        </td>
        <td>            
            <a href="javascript:void(0);" onclick="ViewProfile('<?php echo e($row->id); ?>');" class="btn btn-sm btn-info"  title="View Details">
                <i class="bi bi-eye"></i>
            </a>            
        </td>
    </tr>
    <tr class="profilelist" style="display:none;" id="profiledtl_<?php echo e($row->id); ?>">
    
    <td id="extra_user_detail_<?php echo e($row->id); ?>" colspan="15" style="background-color:#EDEFEE" class="">
    <h5 class="page-title">Order #<?php echo e($row->id); ?></h5>
    <div class="row">
     <div class="col-md-3">
     	<h6>Order Details</h6>
        <p class="accountmail">Invoice ID: <?php echo e($row->invoice_id); ?><br />
        Order Date: <?php echo e(date('d/m/Y H:i:s',strtotime($row->created_at))); ?><br />
        Amount: ₹<?php echo $row->grand_total; ?><br />
        
        </p>
    </div>
    <div class="col-md-3">
    <h6>Payment Details</h6>
        <p class="accountmail">
        <span>Payment Type: <?php echo $row->payment_method_type; ?></span><br />
            <?php if($row->payment_method_type != 'COD'): ?><small>Payment Method: <?php echo $row->payment_method; ?></small><br /><?php endif; ?>
            <small>Payment Status: <?php echo $row->payment_status; ?></small>
        </p>
    </div>
    <div class="col-md-3">
    <h6>Shipment Details</h6>
   		 <p class="accountmail">
         <span>Tracking No: <?php echo $row->tracking_no; ?></span><br />
            <small>Shipment Company: <?php echo e(Helper::getShippingMethod($row->shipping_method_id,'title')); ?></small>
        </p>
    	<?php $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key4 => $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($key4 > 0): ?>
        <p class="accountmail">
         <span>Tracking No: <?php echo $shipment->tracking_no; ?></span><br />
            <small>Shipment Company: <?php echo e(Helper::getShippingMethod($shipment->shipping_method_id,'title')); ?></small>
        </p>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="col-md-3">
    <?php
    $orderItems = Helper::getOrderItems($row->id);
    ?>
    <h6>Order Items</h6>
     <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
     <p class="accountmail"><?php echo e($orderItem->product_name); ?> <?php echo e($orderItem->quqntity); ?> Quantity</p>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
    </td>
    </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <tr>
            <td align="center" colspan="10">Record not found</td>
        </tr>
        <?php endif; ?>
        <tr>
            <td align="center" colspan="10">
                <div id="pagination"><?php echo e($records->links()); ?></div>
            </td>
        </tr>


<?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/orders/paginate.blade.php ENDPATH**/ ?>