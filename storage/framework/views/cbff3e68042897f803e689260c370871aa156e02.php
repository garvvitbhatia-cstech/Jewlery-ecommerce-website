<?php if($records->count()>0): ?>
   <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php
   	$class = 'd-flex';
    $count = $records->count();
    $last = 	$records->lastItem();
    $page = $records->currentPage();
    $sr = $key+1;
    if($page > 1){
        $sr = ($last-$count)+$key+1;
    }
   ?>
   <tr>
       <td>
           <div class="<?php echo e($class); ?> align-items-center">
               <?php echo $sr; ?>

           </div>
       </td>
       <td>
           <div class="<?php echo e($class); ?> align-items-center">
               <?php echo Helper::getUserName($row->user_id); ?>

           </div>
       </td>
       <td>
           <div class="<?php echo e($class); ?> align-items-center">
               <?php echo Helper::getBiddingProduct($row->product_id,'title'); ?>

           </div>
       </td>
       <td>
           <div class="<?php echo e($class); ?> align-items-center">
           ₹ <?php echo number_format($row->start_price,2); ?>

           </div>
       </td>
       <td>
           <div class="<?php echo e($class); ?> align-items-center">
           ₹ <?php echo number_format($row->bidding_price,2); ?>

           </div>
       </td>
       <td>
           <span class="<?php echo e($class); ?> align-items-center"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>
       </td>
       <td>
           <a href="<?php echo e(url('/admin/view-user-bidding',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="View">
               <i class="bi bi-eye"></i>
           </a>
           <a href="javascript:void(0);" onclick="deleteData('user_biddings','<?php echo e($row->id); ?>');" class="btn btn-sm btn-danger" title="Delete">
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
   </tr><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views//admin/user_biddings/paginate.blade.php ENDPATH**/ ?>