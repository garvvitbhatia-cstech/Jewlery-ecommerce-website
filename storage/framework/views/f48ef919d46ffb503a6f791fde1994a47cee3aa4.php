<option value="">Select State</option>
<?php
	if(isset($states) && !empty($states)){
    	foreach($states as $key => $state){
?>
        	<option value="<?php echo e($key); ?>"><?php echo e($state); ?></option>
<?php    }
   	} die;
?><?php /**PATH G:\xampp-8\htdocs\laraval-new-admin\resources\views//admin/ajax/get_state.blade.php ENDPATH**/ ?>