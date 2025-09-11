<thead class="thead-dark">
  <tr>
    <th>ID</th>
    <th>INVOICE ID</th>
    <th>CUSTOMER</th>
    <th>VENDOR</th>
    <th>PRODUCT NAME</th>
    <th>QUANTITY</th>
    <th>PRICE</th>
    <th>TOTAL</th>
    <th>CREATED</th>
  </tr>
</thead>
<?php if($records->count() > 0): ?>
    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $order_id = $item->order_id;    
    $row = Helper::getOrder($order_id);
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
        <a href="<?php echo e(url('/admin/view-order-details',base64_encode($row->id))); ?>" class="d-flex align-items-center"> Order #<?php echo $row->id; ?> </a> 
        <span style="font-size:12px;"><?php echo e($createdBy); ?></span>
      </td>
      <td><div class="d-flex align-items-center"> <?php echo $row->invoice_id; ?> </div></td>
      <td>
      <span class="fw-bold"><?php echo $row->billing_name; ?></span> <small><br />
            <?php echo $row->billing_email; ?></small> <small><br />
            <?php echo $row->billing_phone; ?></small>
      </td>
      <td>
      <span class="fw-bold"><?php echo $vendorName; ?></span> <small><br />
        <?php echo $vendorEmail; ?></small> <small><br />
        <?php echo $vendorPhone; ?></small>
      </td>
      <td><div class="d-flex align-items-center"> <?php echo $item->product_name; ?> </div></td>
      <td><div class="d-flex align-items-center"> <?php echo $item->quqntity; ?> </div></td>
      <td><div class="d-flex align-items-center"> <?php echo $item->price; ?> </div></td>
      <td><div class="d-flex align-items-center"> <?php echo $item->total; ?> </div></td>
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
  <td align="center" colspan="10"><div id="pagination"><?php echo e($records->links()); ?></div></td>
</tr>
<?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/report/products_sales_paginate.blade.php ENDPATH**/ ?>