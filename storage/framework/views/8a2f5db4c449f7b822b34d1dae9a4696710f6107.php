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
         <?php echo $row->title; ?>

      </div>
   </td>
   <td>
      <?php if($row->discount_type == 'Amount'): ?>
      <div class="d-flex align-items-center">₹ <?php echo $row->amount; ?></div>
      <?php else: ?>
      <div class="d-flex align-items-center"><?php echo $row->amount; ?>%</div>
      <?php endif; ?>
   </td>
   <td>
      <div class="d-flex align-items-center">
         <?php echo date('d-m-Y',strtotime($row->start_date)); ?>

      </div>
   </td>
   <td>
      <div class="d-flex align-items-center">
         <?php echo date('d-m-Y',strtotime($row->end_date)); ?>

      </div>
   </td>
   <td>
      <?php if($row->status == 1): ?>
      <a href="javascript:void(0);" onclick="changeStatus('coupon_codes','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-success ">Active</a>
      <?php else: ?>
      <a href="javascript:void(0);" onclick="changeStatus('coupon_codes','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-danger">In-Active</a>
      <?php endif; ?>
   </td>
   <td>
      <span class="text-muted fw-bold text-muted d-block fs-7"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>
   </td>
   <td>
      <a href="<?php echo e(url('/admin/edit-coupon-code',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">
      <i class="bi bi-pencil"></i>
      </a>
      <a href="javascript:void(0);" onclick="deleteData('coupon_codes','<?php echo e($row->id); ?>');" class="btn btn-sm btn-danger"  title="Delete">
      <i class="bi bi-trash"></i>
      </a>
   </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<tr>
   <td align="center" colspan="15">Record not found</td>
</tr>
<?php endif; ?>
<tr>
   <td align="center" colspan="15">
      <div id="pagination"><?php echo e($records->appends(request()->except('page'))->links('vendor.pagination.custom')); ?></div>
   </td>
</tr><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views//admin/coupon_codes/paginate.blade.php ENDPATH**/ ?>