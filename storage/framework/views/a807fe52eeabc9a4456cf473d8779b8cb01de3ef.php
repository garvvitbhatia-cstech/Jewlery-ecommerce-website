<ul>
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php 
$vendorName = ''; 
if(isset($row->vendor_name) && !empty($row->vendor_name)){
    $vendorName = $row->vendor_name;
}else{
	$vendorName = 'Aayush Bharat';
}
?>

<li onclick="selectProduct('<?php echo e($row->id); ?>','<?php echo e($counter); ?>','<?php echo $row->product_code; ?>','<?php echo $row->product_name; ?>','<?php echo e($vendorName); ?>');$('#product_name<?php echo e($counter); ?>').val('<?php echo $row->product_name; ?>');">
<div class="row">
<div class="col-xs-2 col-md-2 col-sm-2">
<?php
$res = Helper::getProductImages($row->id);
?>
<?php if($res != ''): ?>
<img src="<?php echo e(URL::asset('public/img/products/')); ?>/<?php echo $res; ?>" class="img-rounded" width="50px" height="50px" title="" alt="">
<?php endif; ?>
</div>
<div class="col-xs-7 col-md-7 col-sm-7">
<?php echo $row->product_name; ?><br />
<?php echo e($vendorName); ?>

<br />
(<?php echo $row->product_code; ?>)
</div>
<div class="col-xs-3 col-md-3 col-sm-3">₹<?php echo $row->list_price; ?></div>
</div>

</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/orders/product_search.blade.php ENDPATH**/ ?>