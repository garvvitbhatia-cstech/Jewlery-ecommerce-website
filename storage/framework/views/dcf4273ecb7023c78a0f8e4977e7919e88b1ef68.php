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
				Toastify({
						text: msg.message,
						duration: 3000,
						close: true,
						style: {background: "#093"}
						}).showToast();
						return false;
			}else{
				Toastify({
						text: msg.message,
						duration: 3000,
						close: true,
						style: {background: "#f00"}
						}).showToast();
						return false;
			}
		},error: function(ts) {
				Toastify({
						text: 'Something went to wrong, please try after sometime.',
						duration: 3000,
						close: true,
						style: {background: "#f00"}
						}).showToast();
						return false;
		}
	});	
	return false;
}
</script><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views/element/addtocart.blade.php ENDPATH**/ ?>