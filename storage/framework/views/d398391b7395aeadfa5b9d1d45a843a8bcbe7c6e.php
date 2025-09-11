<thead class="thead-dark">
    <tr>
        <th>ID</th>
        <th>INVOICE ID</th>
        <th>CUSTOMER</th>
        <th>VENDOR</th>
        <th>TOTAL</th>
        <?php if($type == 'TransactionId'): ?>
        <th>TRANSACTION ID</th>
        <?php endif; ?>
        <?php if($type == 'SettlementUtr'): ?>
        <th>SETTLEMENT UTR</th>
        <?php endif; ?>
        
        <?php if($type == 'Customer'): ?>
        <!-------- customer ----------->
        <th>CUSTOMER</th>
        <!---------------------------->
        <?php endif; ?>
        
         <?php if($type == 'Location'): ?>
        <!-------- customer ----------->
        <th>LOCATION</th>
        <!---------------------------->
        <?php endif; ?>
        
        <?php if($type == 'OrderStatus'): ?>
        <!-------- Order Status ----------->
        <th>ORDER STATUS</th>
        <!---------------------------->
        <?php endif; ?>
        
        <?php if($type == 'PaymentMethodType'): ?>
        <!-------- PaymentMethodType ------->
        <th>PaymentMethod Type</th>
        <th>PaymentMethod</th>        
        <!------------------------------->
         <?php endif; ?>
        
        <?php if($type == 'ShippingMethod'): ?>
        <!-------- ShippingMethod ------->
        <th>Shipping Method</th>
        <!---------------------->
         <?php endif; ?>
        
        <?php if($type == 'TrackingNo'): ?>
        <!---------TrackingNo------->
        <th>TRACKING NO</th>
        <!----------------------->
        <?php endif; ?>
        
        <th>CREATED</th>
    </tr>
</thead>
<?php if($records->count() > 0): ?>
    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $vendorName = 'Aayush Bharat';
    $vendorEmail = '--';
    $vendorPhone = '--';
    $userName = '--';
    $userEmail = '--';
    $userPhone = '--';
    $vendorInfo = Helper::getUserInfo($row->vendor_id);
    if($row->vendor_id > 0){
        $vendorName = $vendorInfo->name;
        $vendorEmail = $vendorInfo->email;
        $vendorPhone = $vendorInfo->mobile;
   	}
    $shipments = Helper::getShipmentInfo($row->id);
    $createdBy = Helper::getUserName($row->added_by);
    
    $userInfo = Helper::getUserInfo($row->user_id);
    if($row->user_id > 0){
        $userName = $userInfo->name;
        $userEmail = $userInfo->email;
        $userPhone = $userInfo->mobile;
   	}    
   	$shipping_method =  Helper::getShippingMethod($row->shipping_method_id,'title');
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
            <span class="fw-bold"><?php echo $row->billing_name; ?></span> <small><br />
            <?php echo $row->billing_email; ?></small> <small><br />
            <?php echo $row->billing_phone; ?></small>
        </td>
        <td>
            <span class="fw-bold"><?php echo $vendorName; ?></span>
            <small><br /><?php echo $vendorEmail; ?></small>
            <small><br /><?php echo $vendorPhone; ?></small>
        </td>
        
        <td><div class="d-flex align-items-center">
                ₹<?php echo $row->grand_total; ?>

            </div></td>
            
         <?php if($type == 'TransactionId'): ?>    
      <td><div class="d-flex align-items-center">
            <?php echo $row->settlement_utr; ?>

        </div>
      </td>  
        <?php endif; ?>
         <?php if($type == 'SettlementUtr'): ?>    
      <td><div class="d-flex align-items-center">
            <?php echo $row->txn_id; ?>

        </div>
      </td>  
          <?php endif; ?> 
         <?php if($type == 'Customer'): ?>
        <!-------- customer ----------->
        <td>
            <span class="fw-bold"><?php echo $userName; ?></span>
            <small><br /><?php echo $userEmail; ?></small>
            <small><br /><?php echo $userPhone; ?></small>
        </td>
        <!--------------------------------->
        <?php endif; ?>
        
        <?php if($type == 'Location'): ?>
        <!-------- customer ----------->
        <td>
            <span class="fw-bold"><?php echo $row->shipping_name; ?></span> <small><br />
            <?php echo $row->shipping_email; ?></small> <small><br />
            <?php echo $row->shipping_phone; ?></small><br />
            <?php echo $row->shipping_address; ?></small><br />            
            <?php echo $row->shipping_city.', '.$row->shipping_state.'-'.$row->shipping_zipcode; ?></small>
        </td>
        <!--------------------------------->
        <?php endif; ?>
        
         <?php if($type == 'OrderStatus'): ?>
        <!-------- order status ----------->
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->order_status; ?>

            </div>
        </td>
        <!--------------------------------->
        <?php endif; ?>
        
         <?php if($type == 'PaymentMethodType'): ?>
        <!-------- payment method type----------->
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->payment_method_type; ?>

            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->payment_method; ?>

            </div>
        </td>
        <!--------------------------------->
        <?php endif; ?>
        
         <?php if($type == 'ShippingMethod'): ?>
        <!------------ shipping method ------->
        <td>
            <div class="d-flex align-items-center">
                <?php echo $shipping_method; ?>

            </div>
        </td>
        <!----------------------------------->
        <?php endif; ?>
        
         <?php if($type == 'TrackingNo'): ?>
        <!------------ tracking no------->
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->tracking_no; ?>

            </div>
        </td>
        <!----------------------------------->
        <?php endif; ?>
        
        <td>
            <?php echo date('d M, Y',strtotime($row->created_at)); ?><br />
            <?php echo date('h:i A',strtotime($row->created_at)); ?>

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


<?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/report/sales_paginate.blade.php ENDPATH**/ ?>