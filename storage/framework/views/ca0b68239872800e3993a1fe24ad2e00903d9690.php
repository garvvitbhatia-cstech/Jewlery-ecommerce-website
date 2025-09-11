<?php if($records->count()>0): ?>
    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td>
        	<?php
                $rowId = NULL;
                $data = Helper::getPrescriptionOrder($row->id);
                if(isset($data) && !empty($data)){
                    $rowId = $data; 
                }            
            ?>
        
        	<?php if($rowId != NULL): ?>
            <a href="<?php echo e(url('/admin/view-order-details',base64_encode($rowId))); ?>" class="d-flex align-items-center">
                Order #<?php echo $row->id; ?>

            </a>
            <?php else: ?>
            	Order #<?php echo $row->id; ?>

            <?php endif; ?>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <?php
                if($row->image != ''){
              ?>
              	<img src="<?php echo e(URL::asset('public/admin/images/orders/')); ?>/<?php echo $row->image; ?>" class="img-rounded" width="120px" title="" alt="">
              <?php
               	}else{
                	echo '<span style="color:#F00">Not Available</span>';
               	}
             ?>
            </div>
        </td>
        <td>
            <span class="text-muted fw-bold text-muted d-block fs-7"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>
        </td>
        <td>
        	<a href="<?php echo e(url('/admin/edit-prescription-order',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
            </a>
            <a href="javascript:void(0);" onclick="deleteData('prescription_order','<?php echo e($row->id); ?>');" class="btn btn-sm btn-danger"  title="Delete">
                <i class="bi bi-trash"></i>
            </a>
            <?php            	
                if($rowId == NULL){
            ?>
            <a href="<?php echo e(url('/admin/add-order',base64_encode($row->id))); ?>" class="btn btn-sm btn-dark btn-active-light-primary" >Create Order</a>
            <?php } ?>
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


<?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/prescription_orders/paginate.blade.php ENDPATH**/ ?>