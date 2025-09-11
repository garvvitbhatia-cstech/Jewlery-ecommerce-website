<?php if($records->count()>0): ?>
    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    	$class = '';    	
    ?>
    <?php
    	$count = $records->count();
    	$last = $records->lastItem();
        $page = $records->currentPage();
        $sr = $key+1;
        if($page > 1){
        	$sr = ($last-$count)+$key+1;
        }
    ?>
    <tr>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $sr; ?>

            </div>
        </td>
        <td width="35%">
            <div class="<?php echo e($class); ?> align-items-center">
                <b>Name:</b> <?php echo $row->customer_name; ?><br>
                <b>Email:</b> <?php echo $row->customer_email; ?><br>
                <b> Mobile:</b> <?php echo $row->customer_mobile; ?><br>
                <b>Address:</b> <?php echo $row->customer_address; ?> <br>
                <?php echo $row->customer_city; ?> <?php echo $row->customer_state; ?> <?php echo $row->customer_country; ?> <?php echo $row->customer_zipcode; ?>

            </div>
        </td>
        <td>
            <div class="<?php echo e($class); ?> align-items-center">
            	<b>Invoice:</b> <?php echo $row->invoice_id; ?><br>
                <b>Date:</b> <?php echo date('d-m-Y',strtotime($row->order_date)); ?><br>
                <b>Amount:</b> ₹ <?php echo $row->total; ?><br>
            </div>
        </td>
        <td>
            <select class="form-select" name="order_status" id="order_status" onchange="updateOrderStatus('<?php echo e($row->id); ?>',this.value)">
                <option <?php echo e($row->order_status == 'Pending'?'selected':''); ?>  value="Pending">Pending</option>
                <option <?php echo e($row->order_status == 'Processing'?'selected':''); ?> value="Processing">Processing</option>
                <option <?php echo e($row->order_status == 'Delivered'?'selected':''); ?> value="Delivered">Delivered</option>
                <option <?php echo e($row->order_status == 'Cancelled'?'selected':''); ?> value="Cancelled">Cancelled</option>
            </select>
        </td>
        <td>
            <span class="<?php echo e($class); ?> align-items-center"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>
        </td>
        <td>
            <a href="<?php echo e(url('/admin/view-order',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="View">
                <i class="bi bi-eye"></i>
            </a>
            <!--<a href="javascript:void(0);" onclick="deleteData('report_enquiries','<?php echo e($row->id); ?>');" class="btn btn-sm btn-danger"  title="Delete">
                <i class="bi bi-trash"></i>
            </a>-->
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
            <div id="pagination"><?php echo e($records->appends(request()->except('page'))->links('vendor.pagination.custom')); ?></div>
        </td>
    </tr><?php /**PATH G:\xampp-8.2\htdocs\laraval_ecommerce_admin\resources\views//admin/orders/paginate.blade.php ENDPATH**/ ?>