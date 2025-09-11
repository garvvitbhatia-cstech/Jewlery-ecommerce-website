<?php if($records->count()>0): ?>
    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $description = '';
    if($row->description != ""){
    	$description = $row->description;
        if(strlen($row->description) > 30){
            $description = substr($row->description,0,30).'...';
        }
    }
    ?>
    <tr>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->title; ?>

            </div>
        </td>
        <td>
            <?php if($row->image != ""): ?>
            <div class="d-flex align-items-center">
            <img src="<?php echo e(URL::asset('public/img/categories/')); ?>/<?php echo $row->image; ?>"  style="max-width: 80px;height: auto;">
            </div>
            <?php endif; ?>   
        </td>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $description; ?>

            </div>
        </td>
        <?php if(Session::get('admin_type') == 'Admin'): ?>
        <td>
            <?php if($row->status == 1): ?>
            <a href="javascript:void(0);" onclick="changeStatus('categories','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-success ">Active</a>
            <?php else: ?>
            <a href="javascript:void(0);"  onclick="changeStatus('categories','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-danger">In-Active</a>
            <?php endif; ?>
        </td>
        <?php endif; ?>
        <td>
            <span class="text-muted fw-bold text-muted d-block fs-7"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>
        </td>
        <?php if(Session::get('admin_type') == 'Admin'): ?>
        <td>
            <a href="<?php echo e(url('/admin/edit-category',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
            </a>
            <a href="javascript:void(0);" onclick="deleteData('categories','<?php echo e($row->id); ?>');" class="btn btn-sm btn-danger"  title="Delete">
                <i class="bi bi-trash"></i>
            </a>
        </td>
        <?php endif; ?>
    </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <tr>
            <td align="center" colspan="6">Record not found</td>
        </tr>
        <?php endif; ?>
        <tr>
            <td align="center" colspan="6">
                <div id="pagination"><?php echo e($records->links()); ?></div>
            </td>
        </tr>


<?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/categories/paginate.blade.php ENDPATH**/ ?>