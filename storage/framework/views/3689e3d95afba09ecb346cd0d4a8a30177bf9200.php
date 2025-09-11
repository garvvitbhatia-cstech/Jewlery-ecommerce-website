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

            <br />
            <?php if($admin_type == 'Admin'): ?>      
                <?php if(isset($row->vendor_name) && !empty($row->vendor_name)): ?>
                    <?php echo $row->vendor_name; ?>

                <?php else: ?>
                    <?php echo e("Aayush Bharat"); ?>

                <?php endif; ?>
            <?php endif; ?>
        </td>
        <td width="8%">
            <div class="d-flex align-items-center">                
                <input type="number" id="list_price" value="<?php echo $row->list_price; ?>" onchange="updatePrice(this.value,'<?php echo e($row->id); ?>','list_price')" class="form-control"/>
           	</div>
        </td>
        <td width="8%">
            <div class="d-flex align-items-center"> 
                <input type="number" id="mrp" value="<?php echo $row->mrp; ?>" onchange="updatePrice(this.value,'<?php echo e($row->id); ?>','mrp')" class="form-control"/>
            </div>
        </td>
        <td width="8%">
            <div class="d-flex align-items-center">
                <input type="number" id="product_qty" value="<?php echo $row->product_qty; ?>" onchange="updatePrice(this.value,'<?php echo e($row->id); ?>','product_qty')" class="form-control"/>
            </div>
        </td>
        <td width="10%">            
            <select id="change_product_status" onchange="changeProductStatus(this.value,'products','<?php echo $row->id; ?>');" class="form-control">
            	<option <?php echo e($row->status == 1 ? "selected" : ""); ?> value="1">Active</option>
                <option <?php echo e($row->status == 2 ? "selected" : ""); ?> value="2">In-Active</option>
                <?php if($admin_type == 'Admin' && isset($row->vendor_name) && !empty($row->vendor_name)): ?> 
                <option <?php echo e($row->status == 3 ? "selected" : ""); ?> value="3">Disapprove</option>
                <?php endif; ?>
            </select>
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
            <a href="javascript:void(0);" onclick="ViewProfile('<?php echo e($row->id); ?>');" class="btn btn-sm btn-info"  title="View Details">
                <i class="bi bi-eye"></i>
            </a> 
            <?php if($admin_type == 'Admin'): ?>
            <a href="<?php echo e(url('/admin/edit-product',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
            </a>
            <?php endif; ?>
            <!--<a href="<?php echo e(url('/admin/edit-product',base64_encode($row->id))); ?>" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
            </a>-->
             <?php if($admin_type == 'Admin'): ?>
            <a href="javascript:void(0);" onclick="deleteData('products','<?php echo e($row->id); ?>');" class="btn btn-sm btn-danger"  title="Delete">
                <i class="bi bi-trash"></i>
            </a>            
            <?php endif; ?>
            
        </td>
        
    </tr>
    <tr class="profilelist" style="display:none;" id="profiledtl_<?php echo e($row->id); ?>">
<td id="extra_user_detail_<?php echo e($row->id); ?>" colspan="15" class="">
<h5 class="page-title"><?php echo e($row->product_name); ?></h5>
    <div class="col-lg-2 col-sm-2 col-xs-12 noleft accountdtl"><h6>DETAILS</h6></div>
    <div class="col-lg-12 nopadding">
            <div class="row">
                    <div class="col-md-4">
                        <p class="accountmail">Code: <?php echo e($row->product_code); ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Category: <?php echo $row->category_name; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Sub-Category: <?php echo $row->sub_category_name; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Brand: <?php echo $row->brand_name; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Ailments:  <?php echo $row->ailments; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Created:  <?php echo date('d M, Y h:i A',strtotime($row->created_at)); ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Product Type: <?php echo $row->product_type; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>HSN Code: <?php echo $row->hsn_code; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Product Quantity: <?php echo $row->product_qty; ?></p>
                    </div>

                    <div class="col-md-4">
                        <p>Out of Stock: <?php echo $row->stock; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Out of Stock Date: <?php echo $row->stock_date !=""?date('d M, Y',strtotime($row->stock_date)):'N/A'; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Pack Size:  <?php echo $row->pack_size; ?> <?php echo $row->pack_unit; ?></p>
                    </div>
            </div>

            <div class="divider">
                <div class="divider-text">Prices</div>
            </div>
            <div class="col-lg-12 nopadding">
            <div class="row">
            <div class="col-md-4">
                        <p>MRP: <?php echo $row->mrp; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Discount: <?php echo $row->discounted_price; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>List Price: <?php echo $row->list_price; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Packaging Cost: <?php echo $row->packaging_cost; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Tax: <?php echo !empty($row->tax)?$row->tax:'0'; ?>% </p>
                    </div>
                    <div class="col-md-4">
                        <p>Other Tax: <?php echo $row->other_tax !=""?$row->other_tax:'N/A'; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Tax Included: <?php echo $row->is_tax_included; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Shipping Cost: <?php echo !empty($row->shipping_cost)?$row->shipping_cost:'0.00'; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Free Shipping: <?php echo $row->is_free_shipping; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Self-Ship: <?php echo $row->is_self_ship; ?></p>
                    </div>
            </div>
        </div>
            <div class="divider">
                <div class="divider-text">Show Users</div>
            </div>
            <div class="col-lg-12 nopadding">
            <div class="row">
                    <div class="col-md-4">
                        <p>Show All Users: <?php echo $row->is_show_all_user; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Show Guest User: <?php echo $row->is_show_guest_user; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Show Register User: <?php echo $row->is_show_register_user; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Vendor: <?php echo isset($row->vendor_name) && !empty($row->vendor_name)?$row->vendor_name:'N/A'; ?></p>
                    </div>
            </div>
        </div>

        <div class="divider">
                <div class="divider-text">Product Weight</div>
            </div>
            <div class="col-lg-12 nopadding">
            <div class="row">
                    <div class="col-md-4">
                        <p>Product Weight: <?php echo !empty($row->product_weight)?$row->product_weight.' kg':'N/A'; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>Product Width: <?php echo !empty($row->product_width)?$row->product_width.' cm':'N/A'; ?> </p>
                    </div>
                    <div class="col-md-4">
                        <p>Product Height: <?php echo !empty($row->product_height)?$row->product_height.' cm':'N/A'; ?> </p>
                    </div>
                    <div class="col-md-4">
                        <p>Product Length: <?php echo !empty($row->product_length)?$row->product_length.' cm':'N/A'; ?></p>
                    </div>
            </div>
        </div>

        <div class="divider">
                <div class="divider-text">Product Description</div>
            </div>
            <div class="col-lg-12 nopadding">
            <div class="row">
                    <div class="col-md-12">
                        <p>Short Description: <?php echo !empty($row->short_description)?$row->short_description:'N/A'; ?></p>
                    </div>
                    <div class="col-md-12">
                        <p>Description: <?php echo !empty($row->long_description)?$row->long_description:'N/A'; ?></p>
                    </div>
                    <div class="col-md-12">
                        <p>Special Notes: <?php echo !empty($row->special_notes)?$row->special_notes:'N/A'; ?></p>
                    </div>
            </div>
        </div>

        <div class="divider">
                <div class="divider-text">SEO Description</div>
            </div>
            <div class="col-lg-12 nopadding">
            <div class="row">
                    <div class="col-md-4">
                        <p>SEO Title: <?php echo !empty($row->seo_title)?$row->seo_title:'N/A'; ?></p>
                    </div>
                    <div class="col-md-4">
                        <p>SEO Keywords: <?php echo !empty($row->seo_keywords)?$row->seo_keywords:'N/A'; ?></p>
                    </div>
                    <div class="col-md-12">
                        <p>SEO Description: <?php echo !empty($row->seo_description)?$row->seo_description:'N/A'; ?></p>
                    </div>
            </div>
        </div>
        <div class="devider" style="margin:15px 0;">&nbsp;</div>
     </td>
    </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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


<?php /**PATH G:\xampp-8\htdocs\laraval-new-admin\resources\views//admin/products/paginate.blade.php ENDPATH**/ ?>