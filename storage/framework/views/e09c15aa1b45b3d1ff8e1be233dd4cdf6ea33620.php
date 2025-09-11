<?php if($records->count()>0): ?>
    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    	<td>
            <input type="checkbox" class="mod_products form-check-input form-check-primary form-check-glow" name="productsIDs[]" value="<?php echo $row->id; ?>"/>
        </td>
    	 <td>
        	 <?php
             	$res = Helper::getProductImages($row->id);
                if($res != ''){
              ?>
              	<img src="<?php echo e(URL::asset('public/img/products/')); ?>/<?php echo $res; ?>" class="img-rounded" width="50px" height="50px" title="" alt="">
              <?php
               	}else{
                	echo '<span style="color:#F00">Not Available</span>';
               	}
             ?>
        </td>  
        <td>
            <div class="d-flex align-items-center">                
                <?php echo $row->product_name; ?>

            </div>
            <?php echo $row->product_code; ?>

            <?php if($admin_type == 'Admin'): ?>
            <br />
            	<?php if($row->vendor_id > 0): ?>
                	<?php $userInfo = Helper::getUserInfo($row->vendor_id); ?>
                    <?php echo e($userInfo->name); ?>

                <?php else: ?>
                    <?php echo e("Aayush Bharat"); ?>

                <?php endif; ?>
            <?php endif; ?>
        </td>       
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->list_price; ?>

            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->mrp; ?>

            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <?php echo $row->product_qty; ?>

            </div>
        </td>
        <td>
            <?php if($row->moderation_status == "Pending"): ?>
            <a href="javascript:void(0);" class="badge bg-warning">Pending</a>
            <?php else: ?>
            <a href="javascript:void(0);"  class="badge bg-danger">Declined</a>
            <?php endif; ?>
        </td>
        <td>
        	<?php if($admin_type == 'Vendor'): ?>
            <?php if($row->vendor_pid == ''): ?>
        	<a href="<?php echo e(url('/admin/edit-product',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
            </a>
            <?php else: ?>
            <a href="<?php echo e(url('/admin/vendor-edit-product',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
            </a>
            <?php endif; ?>
            <?php endif; ?>
            <a href="<?php echo e(url('/admin/view-disapproved-product',base64_encode($row->id))); ?>" class="btn btn-sm btn-warning" title="View Product Info">
                <i class="bi bi-eye"></i>
            </a>
            <?php if($admin_type == 'Admin'): ?>
            <a href="<?php echo e(url('/admin/vendor-edit-product',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
            </a>
            <?php endif; ?>
            <?php if($row->moderation_status == "Declined"): ?>
                <a href="javascript:void(0);" class="btn btn-sm btn-info" title="View Reason"
                data-bs-toggle="modal" data-bs-target="#declinedReasonPopup"
                onclick="setReason('<?php echo e($row->moderation_decline_reason); ?>')">
                    <i class="bi bi-info"></i>
                </a>
            <?php endif; ?>
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
                <div id="pagination"><?php echo e($records->links()); ?></div>
            </td>
        </tr>

<script>
$(document).ready(function(){
    $('.mod_products').on('click',function(){
        if($('.mod_products:checked').length == $('.mod_products').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
        $('.updateModerationStatus').addClass('d-none');
        if($('.mod_products:checked').length > 0){
            $('.updateModerationStatus').removeClass('d-none');
        }
    });
});
</script>


<?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/disapproved_products/paginate.blade.php ENDPATH**/ ?>