<?php if($records->count()>0): ?>
    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php
   	$status = $row->read_status;
    $bold = '';
    if($status == 2){
    	$bold = 'font-weight: 900;';
   	}
   ?>
    <tr style="<?php echo e($bold); ?>">
        <td>            
             <?php echo $row->id; ?>

        </td>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->name; ?>

            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->email; ?>

            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->contact; ?>

            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->subject; ?>

            </div>
        </td>
        <td>
            <?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?>

        </td>
        <td>            
            <a href="<?php echo e(url('/admin/view-contact',base64_encode($row->id))); ?>" class="btn btn-sm btn-info" title="View Details">
                <i class="bi bi-eye"></i>
            </a>            
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
        </tr><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/contacts/paginate.blade.php ENDPATH**/ ?>