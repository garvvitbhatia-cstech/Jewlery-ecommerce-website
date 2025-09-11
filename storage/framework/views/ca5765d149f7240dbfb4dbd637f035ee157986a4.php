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

        <td>

            <div class="<?php echo e($class); ?> align-items-center">

                <b>Name:</b> <?php echo $row->customer_name; ?><br>

                <b>Email:</b> <?php echo $row->customer_email; ?><br>

                <b> Mobile:</b> <?php echo $row->customer_mobile; ?><br>

            </div>

        </td>

        <td>

            <div class="<?php echo e($class); ?> align-items-center">

                <b>Invoice:</b> <?php echo $row->invoice_id; ?><br>

                <b>Transaction ID:</b> <?php echo $row->transaction_id; ?><br>

                <b>Date:</b> <?php echo date('d-m-Y',strtotime($row->order_date)); ?><br>

                <b>Amount:</b> ₹ <?php echo number_format($row->total,2); ?><br>

            </div>

        </td>

        <td>
            <div class="d-flex align-items-center">
            <select class="form-select" name="order_status" id="order_status" onchange="updateOrderStatus('<?php echo e($row->id); ?>',this.value)">

                <option <?php echo e($row->order_status == 'Pending'?'selected':''); ?>  value="Pending">Pending</option>

                <option <?php echo e($row->order_status == 'Processing'?'selected':''); ?> value="Processing">Processing</option>

                <option <?php echo e($row->order_status == 'Delivered'?'selected':''); ?> value="Delivered">Delivered</option>

                <option <?php echo e($row->order_status == 'Cancelled'?'selected':''); ?> value="Cancelled">Cancelled</option>

            </select>
            </div>

        </td>

        <td>
            <?php if($row->payment_status == '2'){ $css = 'not_confirm'; }else{ $css = 'received'; } ?>
            <div class="d-flex align-items-center">
                <select onchange="setPaymentStatus(this.value,'<?php echo e($row->id); ?>')" id="pay_dropdown<?php echo e($row->id); ?>" class="form-select <?php echo e($css); ?>">
                    <option <?php echo e($row->payment_status == 2?'selected':''); ?> value="2">Not Confirm</option>
                    <option <?php echo e($row->payment_status == 1?'selected':''); ?> value="1">Received</option>
                </select>
            </div>
        </td>

        <td>

            <span class="<?php echo e($class); ?> align-items-center"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>

        </td>

        <td>

            <a href="javascript:void(0)" onclick="trakno('<?php echo e($row->id); ?>','<?php echo e($row->shipping_company); ?>','<?php echo e($row->tracking_code); ?>','<?php echo e($row->tracking_url); ?>');" class="btn btn-sm btn-success" title="Tracking">
                <i class="bi bi-flag-fill"></i> Tracking
            </a>
            
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

    </tr><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views//admin/orders/paginate.blade.php ENDPATH**/ ?>