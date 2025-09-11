<?php if($records->count()>0): ?>
    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    <td>
    <div class="avatar avatar-md">
            <?php if($row->photo != "" && file_exists(public_path('img/users/'.$row->photo))): ?>
                <img src="<?php echo e(URL::asset('public/img/users/')); ?>/<?php echo $row->photo; ?>"  style="max-width: 60px;height: auto;">
            <?php else: ?>
             <?php
             $profileImage = '2.jpg';
             if($row->gender != 'Male'){
                $profileImage = '5.jpg';
             }
             ?>
                <img src="<?php echo e(URL::asset('public/admin/images/faces/'.$profileImage)); ?>">
            <?php endif; ?>
            </div>
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
                <?php echo $row->mobile; ?>

            </div>
        </td>
        <td>
            <?php if($row->status == 1): ?>
                <a href="javascript:void(0);" onclick="changeStatus('users','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-success ">Active</a>
            <?php else: ?>
                <a href="javascript:void(0);"  onclick="changeStatus('users','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-danger">In-Active</a>
            <?php endif; ?>
        </td>
        <td>
            <span class="text-muted fw-bold text-muted d-block fs-7"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>
        </td>
        <td>
            <a href="<?php echo e(url('/admin/edit-doctor',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
            </a>
            <a href="javascript:void(0);" onclick="deleteData('users','<?php echo e($row->id); ?>');" class="btn btn-sm btn-danger"  title="Delete">
                <i class="bi bi-trash"></i>
            </a>
        </td>
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


<?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/doctors/paginate.blade.php ENDPATH**/ ?>