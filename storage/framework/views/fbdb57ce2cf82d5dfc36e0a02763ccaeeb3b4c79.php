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
    $products = Helper::getNoOfProducts($row->ailment_id);
    $ailments = Helper::getAilments($row->ailment_id);
    $speciality = Helper::getSpecialities($row->speciality_id);
    ?>
    <tr>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->title; ?>

            </div>
        </td>
        <td>
        <div class="d-flex align-items-center">
<?php echo e($ailments); ?>

        </div>
        </td>
        <td>
        <div class="d-flex align-items-center">
<?php echo e($speciality); ?>

        </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $description; ?>

            </div>
        </td>
        <td align="center">
            <a style="cursor:pointer" onclick="loadSymtomsProducts('<?php echo e($row->ailment_id); ?>');" data-bs-toggle="modal" data-bs-target="#productListModal" >(<?php echo e($products); ?>)</a>
        </td>
        <td>
            <?php if($row->status == 1): ?>
            <a href="javascript:void(0);" onclick="changeStatus('symptoms','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-success ">Active</a>
            <?php else: ?>
            <a href="javascript:void(0);"  onclick="changeStatus('symptoms','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-danger">In-Active</a>
            <?php endif; ?>
        </td>
        <td>
            <span class="text-muted fw-bold text-muted d-block fs-7"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>
        </td>
        <td>
            <a href="<?php echo e(url('/admin/edit-symptom',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
            </a>
            <a href="javascript:void(0);" onclick="deleteData('symptoms','<?php echo e($row->id); ?>');" class="btn btn-sm btn-danger"  title="Delete">
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


<?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/symptoms/paginate.blade.php ENDPATH**/ ?>