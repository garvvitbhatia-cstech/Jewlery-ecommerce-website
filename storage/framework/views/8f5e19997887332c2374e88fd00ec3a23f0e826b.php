<option value="">Select Customers</option>
<?php
	if(isset($customers) && !empty($customers)){
    	foreach($customers as $key => $customer){
        $selected = '';
        if(isset($customer_id) && !empty($customer_id)){
            $selected = $customer_id == $key ? 'selected' : '';
       	}
?>
        	<option <?php echo e($selected); ?> value="<?php echo e($key); ?>"><?php echo e($customer); ?></option>
<?php    }
   	} die;
?><?php /**PATH G:\xampp-8\htdocs\laraval-new-admin\resources\views//admin/orders/get_customers.blade.php ENDPATH**/ ?>