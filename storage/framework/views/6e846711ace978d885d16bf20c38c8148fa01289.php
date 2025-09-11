<?php if($records->count()>0): ?>

<?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php

	$getegory_details = Helper::getCategory($row->category_id);

    $parent = NULL;

    if($getegory_details->parent_id > 0){

    	$parent = Helper::getCategory($getegory_details->parent_id,'title');

    }

    $ocount = Helper::getProductOrder($row->id);

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

      <div class="d-flex align-items-center">

         <?php echo $row->title; ?>


      </div>

   </td>

   <td>

      <div class="d-flex align-items-center">

      	<?php if(!empty($parent)): ?>

        	<?php echo $parent; ?> →

        <?php endif; ?>

         <?php echo Helper::getCategory($row->category_id,'title'); ?>


      </div>

   </td>

   <td>

      <div class="d-flex align-items-center">

         ₹ <?php echo $row->amount; ?>


      </div>

   </td>

   <td>

      <?php if(!empty($row->image)): ?>

      <div class="d-flex align-items-center">

         <div class="cropped" id="cropped">

         	<img src="<?php echo e(URL::asset('public/admin/images/teams/')); ?>/<?php echo $row->image; ?>" width="100">

         </div>

      </div>

      <?php endif; ?>

   </td>

   <td>

   <?php if($ocount == 0): ?>
      <?php if($row->status == 1): ?>

      <a href="javascript:void(0);" onclick="changeStatus('products','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-success ">Active</a>

      <?php else: ?>

      <a href="javascript:void(0);"  onclick="changeStatus('products','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-danger">In-Active</a>

      <?php endif; ?>

      <?php else: ?>
      <a href="javascript:void(0);" class="badge bg-success ">Active</a>
      <?php endif; ?>

   </td>

   <td>

      <span class="text-muted fw-bold text-muted d-block fs-7"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>

   </td>

   <td>

      <a href="<?php echo e(url('/admin/edit-product',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">

      <i class="bi bi-pencil"></i>

      </a>

      <?php if($ocount == 0): ?>

      <a href="javascript:void(0);" onclick="deleteData('products','<?php echo e($row->id); ?>');" class="btn btn-sm btn-danger"  title="Delete">

      <i class="bi bi-trash"></i>

      </a>

      <?php endif; ?>

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

</tr><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views//admin/products/paginate.blade.php ENDPATH**/ ?>