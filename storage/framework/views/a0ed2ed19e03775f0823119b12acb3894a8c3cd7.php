<?php if($records->count()>0): ?>
	
    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            <div class="d-flex align-items-center">
                <?php echo $row->id; ?>

            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->title; ?>

            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->heading; ?>

            </div>
        </td>
        <td>
            <?php if($row->status == 1): ?>
            <a href="javascript:void(0);" onclick="changeStatus('inner_pages','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-success ">Active</a>
            <?php else: ?>
            <a href="javascript:void(0);" onclick="changeStatus('inner_pages','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-danger">In-Active</a>
            <?php endif; ?>
        </td>
        <td>
            <span class="text-muted fw-bold text-muted d-block fs-7"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>
        </td>
        <td>
            <a href="<?php echo e(url('/admin/edit-inner-page',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
            </a>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <tr>
        <td align="center" colspan="9">Record not found</td>
    </tr>
    <?php endif; ?>
    <tr>
        <td align="center" colspan="9">
            <div id="pagination"><?php echo e($records->appends(request()->except('page'))->links('vendor.pagination.custom')); ?></div>
        </td>
    </tr><?php /**PATH G:\xampp-8.2\htdocs\new_ecommerce_admin\resources\views//admin/inner_pages/paginate.blade.php ENDPATH**/ ?>