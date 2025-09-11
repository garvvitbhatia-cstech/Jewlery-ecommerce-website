<?php if($records->count()>0): ?>
    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <?php
    $className = '';
    $itemName = '';
    if($row->type == 'Product'){
    	$productData = Helper::getProductInfo($row->item_id);
        $itemName = $productData->product_name;
    }
    if($row->type == 'Doctor'){
    	$doctorData = Helper::getUserInfo($row->item_id);
        $itemName = $doctorData->name;
    }
    if($row->type == 'Vendor'){
    	$vendorData = Helper::getUserInfo($row->item_id);
        $itemName = $vendorData->name;
    }
    if($row->type == 'Subscription'){
    	$subsData = Helper::getSubscriptionInfo($row->item_id);
        $itemName = $subsData->title;
    }
    if($row->user_id > 0){
    	$userData = Helper::getUserInfo($row->user_id);
    }
    
    if($row->review_status == 1){
    	$className = 'bg-success';
    }
    if($row->review_status == 2){
    	$className = 'bg-warning';
    }
    if($row->review_status == 3){
    	$className = 'bg-danger';
    }
    ?>
    <?php
    $remark = '';
    if($row->remark != ""){
    	$remark = $row->remark;
        if(strlen($row->remark) > 30){
            $remark = substr($row->remark,0,30).'...';
        }
    }
    ?>
    <tr>
        
        <td>
            <div class="d-flex align-items-center">
                <?php echo $itemName; ?>

            </div>
            <?php if($row->type == 'Product'): ?>
            <a href="javascript:void(0);" class="badge bg-success "><?php echo $row->type; ?></a>
            <?php elseif($row->type == 'Doctor'): ?>
            <a href="javascript:void(0);" class="badge bg-warning"><?php echo $row->type; ?></a>
            <?php elseif($row->type == 'Vendor'): ?>
            <a href="javascript:void(0);" class="badge bg-primary"><?php echo $row->type; ?></a>
            <?php else: ?>
            <a href="javascript:void(0);" class="badge bg-danger"><?php echo $row->type; ?></a>
            <?php endif; ?>
        </td>
        <td>
        <?php if($row->user_id > 0): ?>
            <div class="d-flex align-items-center">
                <?php echo $userData->name; ?><br /><?php echo $userData->email; ?><br /><?php echo $userData->mobile; ?>

            </div>
         <?php else: ?>
         <div class="d-flex align-items-center">
                <?php echo $row->username; ?>

            </div>
         <?php endif; ?>
        </td>
        <td>
            <div class="d-flex align-items-center">
               <?php echo $row->rating; ?>

            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
               <?php echo $remark; ?>

            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
              <?php 
              $date = '--';
              if($row->approved_on != ""){
              $date = date('d F Y H:i:s A',$row->approved_on);
              }
              ?>
               <?php echo $date; ?>

            </div>
        </td>
        <td class="<?php echo e($className); ?>">
            
            <select onchange="" class="form-control" name="review_status" id="review_status">
            <option <?php if($row->review_status == 1): ?> selected <?php endif; ?> value="1">Approved</option>
            <option <?php if($row->review_status == 2): ?> selected <?php endif; ?> value="2">Pending</option>
            <option <?php if($row->review_status == 3): ?> selected <?php endif; ?> value="3">Reject</option>
            </select>
            
        </td>
        <td>
            <span class="text-muted fw-bold text-muted d-block fs-7"><?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></span>
        </td>
        <td>
        <a href="javascript:void(0);" onclick="$('#profiledtl_<?php echo e($row->id); ?>').toggle();" class="btn btn-sm btn-info"  title="View Details">
                <i class="bi bi-eye"></i>
            </a>
            <a href="<?php echo e(url('/admin/edit-reviews',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
            </a>
            <a href="javascript:void(0);" onclick="deleteData('reviews','<?php echo e($row->id); ?>');" class="btn btn-sm btn-danger"  title="Delete">
                <i class="bi bi-trash"></i>
            </a>
        </td>
    </tr>
    <tr class="profilelist" style="display:none;" id="profiledtl_<?php echo e($row->id); ?>">
<td id="extra_user_detail_<?php echo e($row->id); ?>" colspan="12" class="">
<h5 class="page-title"><?php echo e($row->product_name); ?></h5>
    <div class="col-lg-2 col-sm-2 col-xs-12 noleft accountdtl"><h6>DETAILS</h6></div>
    <div class="col-lg-12 nopadding">
            <div class="row">
                    <div class="col-md-12">
                        <p class="accountmail"><?php echo e($row->heading); ?></p>
                    </div>
                    <div class="col-md-12">
                        <p><?php echo $row->remark; ?></p>
                    </div>
                    <?php if($row->reject_remark != ""): ?>
                    <hr />
                    <div class="col-md-12">
                        <p style="color:#F00"><?php echo $row->reject_remark; ?></p>
                        <div class="d-flex align-items-center">
                          <?php 
                          $date = '--';
                          if($row->reject_od != ""){
                          $date = date('d F Y H:i:s A',$row->reject_od);
                          }
                          ?>
                           <?php echo $date; ?>

                        </div>
                    </div>
                    <?php endif; ?>
                   
            </div>

            

        <div class="devider" style="margin:15px 0;">&nbsp;</div>
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
                <div id="pagination"><?php echo e($records->links()); ?></div>
            </td>
        </tr>


<?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/reviews/paginate.blade.php ENDPATH**/ ?>