<?php
$controllerAction = Route::getCurrentRoute()->getActionName();
list($controller, $action) = explode('@', $controllerAction);
?>
<script>
function addTocart(pID,qty=null){
	$('#add_to_cart_'+pID).html('Processing...');
	if(qty != '' && qty > 1){
		var qty = qty;
	}else{
		var qty = 1;
	}
	var actionname = "<?php echo e($action); ?>";
	$.ajax({
		type: 'POST',
		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		url: "<?php echo e(route('addToCart')); ?>",
		data: {pID:pID,qty:qty},
		dataType: "json",
		success: function(msg){
			
			if(actionname == 'productDetails'){
				$('#add_to_cart_'+pID).html('Add To Cart');
			}else{
				$('#add_to_cart_'+pID).html('Add To Cart');
			}			
			$('.cart-added-item').html(msg.cart_count);
			if(msg.success){
				swal({
					title: "Success!",
					text: msg.message,
					type: "success",
					timer: 3000
				});
			}else{
				swal({
					title: "Error!",
					text: msg.message,
					type: "error",
					timer: 3000
				});
			}
		},error: function(ts) {
			swal({
					title: "Error!",
					text: 'Something went to wrong, please try after sometime.',
					type: "error",
					timer: 3000
				});
		}
	});	
	return false;
}
</script><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views/element/addtocart.blade.php ENDPATH**/ ?>