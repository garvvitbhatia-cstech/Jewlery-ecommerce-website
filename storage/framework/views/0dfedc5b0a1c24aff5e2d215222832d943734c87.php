<?php if($records->count()>0): ?>
<?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
<tr>
   <?php
      $count = $records->count();
      $last = $records->lastItem();
      $page = $records->currentPage();
      $sr = $key+1;
      if($page > 1){
            $sr = ($last-$count)+$key+1;
      }
   ?>
   <td>
      <div class="d-flex align-items-center">
            <?php echo $sr; ?>

      </div>
   </td>
   <td width="30%">
      <div class="d-flex align-items-center">
         <?php echo $row->question; ?>

      </div>
   </td>
   <td>
      <div class="d-flex align-items-center">
         <?php echo substr($row->answer,0,30); ?>...
      </div>
   </td>
   <td>
      <div class="d-flex align-items-center">
		<input type="text" maxlength="3" style="width:100px;text-align:center;" class="form-control ordering" onchange="saveOrder(<?php echo e($row->id); ?>,<?php echo e($row->ordering); ?>,'faqs',this.value);" id="ordering" value="<?php echo e($row->ordering); ?>"/>
      </div>
   </td>
   <td>
      <?php if($row->status == 1): ?>
      	<a href="javascript:void(0);" onclick="changeStatus('faqs','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-success ">Active</a>
      <?php else: ?>
      	<a href="javascript:void(0);" onclick="changeStatus('faqs','<?php echo $row->id; ?>','<?php echo $row->status; ?>');" class="badge bg-danger">In-Active</a>
      <?php endif; ?>
   </td>
   <td>
      <span class="text-muted fw-bold text-muted d-block fs-7"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>
   </td>
   <td>
      <a href="<?php echo e(url('/admin/edit-faq',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">
      <i class="bi bi-pencil"></i>
      </a>
      <a href="javascript:void(0);" onclick="deleteData('faqs','<?php echo e($row->id); ?>');" class="btn btn-sm btn-danger" title="Delete">
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
</tr>

<script>
	$('.numberonly').keypress(function(e){   
		var charCode = (e.which) ? e.which : event.keyCode   
		if(String.fromCharCode(charCode).match(/[^0-9+]/g))   
		return false;   
   });
</script><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views//admin/faqs/paginate.blade.php ENDPATH**/ ?>