<option value="">Select City</option>
<?php
	if(isset($cities) && !empty($cities)){
    	foreach($cities as $key => $city){
?>
        	<option value="<?php echo e($key); ?>"><?php echo e($city); ?></option>
<?php    }
   	} die;
?><?php /**PATH G:\xampp-8\htdocs\laraval-new-admin\resources\views//admin/ajax/get_city.blade.php ENDPATH**/ ?>