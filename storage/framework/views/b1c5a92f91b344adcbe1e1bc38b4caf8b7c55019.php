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

                Name: <?php echo $row->name; ?><br>
                Email: <?php echo $row->email; ?><br>
                Mobile: <?php echo $row->mobile; ?><br>    
                Password: <?php echo $row->original_password; ?>


            </div>

        </td>

        <td width="35%">

            <div class="d-flex align-items-center">

            <?php if($row->address != ''): ?>
                <?php echo nl2br($row->address); ?><br>
                <?php echo $row->city; ?>, <?php echo $row->state; ?> - <?php echo $row->zipcode; ?>

            <?php endif; ?>
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

            <?php if($row->is_bidder == 1): ?>

            <a href="javascript:void(0);" onclick="changeBidderStatus('users','<?php echo $row->id; ?>','<?php echo $row->is_bidder; ?>');" class="badge bg-success ">Yes</a>

            <?php else: ?>

            <a href="javascript:void(0);" onclick="changeBidderStatus('users','<?php echo $row->id; ?>','<?php echo $row->is_bidder; ?>');" class="badge bg-danger">No</a>

            <?php endif; ?>

        </td>

        <td>

            <span class="text-muted fw-bold text-muted d-block fs-7"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>

        </td>

        <td>

            <a href="<?php echo e(url('/admin/edit-user',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">

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

        <td align="center" colspan="10">Record not found</td>

    </tr>

    <?php endif; ?>

    <tr>

        <td align="center" colspan="10">

            <div id="pagination"><?php echo e($records->appends(request()->except('page'))->links('vendor.pagination.custom')); ?></div>

        </td>

    </tr>





<?php /**PATH /home/a6xnk0irt52m/public_html/resources/views//admin/users/paginate.blade.php ENDPATH**/ ?>