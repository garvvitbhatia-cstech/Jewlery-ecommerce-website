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

            <div class="d-flex align-items-center fw-bold" style="color:#212529">

                <?php echo $row->id; ?>


            </div>

        </td>  
        
        <td>

            <div class="d-flex align-items-center fw-bold" style="color:#212529">

                <?php echo $row->title; ?>


            </div>

        </td>  

        <td></td> 

        <td>

            <?php if($row->status == 1): ?>

            <a href="javascript:void(0);" onclick="changeStatus('categories','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-success ">Active</a>

            <?php else: ?>

            <a href="javascript:void(0);"  onclick="changeStatus('categories','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-danger">In-Active</a>

            <?php endif; ?>

        </td>

        <td>

            <span class="text-muted fw-bold text-muted d-block fs-7"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>

        </td>

        <td>

            <a href="<?php echo e(url('/admin/edit-category',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">

                <i class="bi bi-pencil"></i>

            </a>

            <!----<a href="javascript:void(0);" onclick="deleteData('categories','<?php echo e($row->id); ?>');" class="btn btn-sm btn-danger"  title="Delete">

                <i class="bi bi-trash"></i>

            </a>---->

        </td>

    </tr>

    <?php echo e(Helper::getChildRow($row->id,'→')); ?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php else: ?>

    <tr>

        <td align="center" colspan="6">Record not found</td>

    </tr>

    <?php endif; ?>

    <tr>

        <td align="center" colspan="10">

            <div id="pagination"><?php echo e($records->appends(request()->except('page'))->links('vendor.pagination.custom')); ?></div>

        </td>

    </tr>





<?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views//admin/categories/paginate.blade.php ENDPATH**/ ?>