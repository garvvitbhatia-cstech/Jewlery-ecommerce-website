<?php if($records->count()>0): ?>
<?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
   <td>
      <div class="d-flex align-items-center">
         <?php echo $row->title; ?>

      </div>
   </td>
   <td>
      <div class="d-flex align-items-center">
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
      <?php if($row->status == 1): ?>
      <a href="javascript:void(0);" onclick="changeStatus('products','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-success ">Active</a>
      <?php else: ?>
      <a href="javascript:void(0);"  onclick="changeStatus('products','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-danger">In-Active</a>
      <?php endif; ?>
   </td>
   <td>
      <span class="text-muted fw-bold text-muted d-block fs-7"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>
   </td>
   <td>
      <a href="<?php echo e(url('/admin/edit-product',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">
      <i class="bi bi-pencil"></i>
      </a>
      <a href="javascript:void(0);" onclick="deleteData('products','<?php echo e($row->id); ?>');" class="btn btn-sm btn-danger"  title="Delete">
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
   <td align="center" colspan="10">
      <div id="pagination"><?php echo e($records->links()); ?></div>
   </td>
</tr><?php /**PATH G:\xampp-8.2\htdocs\new_ecommerce_admin\resources\views//admin/products/paginate.blade.php ENDPATH**/ ?>