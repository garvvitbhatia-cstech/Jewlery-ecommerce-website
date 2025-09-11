

<?php $__env->startSection('content'); ?>
<form class="form w-100" id="pageForm" action="#">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Add Shipping Method</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/shipping-methods')); ?>">Shipping Methods</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Shipping Method</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <section class="section">
      <div class="row">
        <div class="col-9 col-md-9">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation"> <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General Info</a> </li>
                <li class="nav-item" role="presentation"> <a class="nav-link" id="seo-tab" data-bs-toggle="tab" href="#seo"
                                        role="tab" aria-controls="seo" aria-selected="false">Shipping Time and Rates</a> </li>
                                        
                
              </ul>
              <hr />
              <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">
                    
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                        </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Rate calculation</label>
                            <select class="form-select" name="rate_calculation" id="rate_calculation">
                            <option value="Manual">Manual</option>
                            <option value="Realtime">Realtime</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Delivery Time</label>
                            <input type="text" class="form-control" name="delivery" id="delivery">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Weight Limit</label>
                            <input type="text" class="form-control" name="weight_limit" id="weight_limit">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Description</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Icon</label>
                            <input type="file" class="form-control" value="" name="file" id="file">
                        </div>
                    </div>
                        
                  </div>
                </div>
                <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                <div id="cost_dep_div">
                <h5>Cost Dependencies</h5>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="basicInput">Start Rate</label>
                        <input type="text" class="form-control" name="cost_depend[0][start]">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="basicInput">End Rate</label>
                        <input type="text" class="form-control" name="cost_depend[0][end]">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="basicInput">Value</label>
                        <input type="text" class="form-control" name="cost_depend[0][value]">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="basicInput">Type</label>
                        <select class="form-control" name="cost_depend[0][type]">
                        <option value="Amount">Amount</option>
                        <option value="Percent">Percent</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                      <label for="basicInput">&nbsp;</label><br />
                        <a onclick="addMoreCostRow();" class="btn btn-sm btn-primary">Add More</a>
                      </div>
                    </div>
                    
                  </div>
                  </div>
                  <hr />
                  <div id="weight_dep_div">
                <h5>Weight Dependencies</h5>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="basicInput">Start Rate</label>
                        <input type="text" class="form-control" name="weight_depend[0][start]">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="basicInput">End Rate</label>
                        <input type="text" class="form-control" name="weight_depend[0][end]">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="basicInput">Value</label>
                        <input type="text" class="form-control" name="weight_depend[0][value]">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="basicInput">Type</label>
                        <select class="form-control" name="weight_depend[0][type]">
                        <option value="Amount">Amount</option>
                        <option value="Percent">Percent</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                      <label for="basicInput">&nbsp;</label><br />
                        <a onclick="addMoreWeightRow();" class="btn btn-sm btn-primary">Add More</a>
                      </div>
                    </div>
                    
                  </div>
                  </div>
                  <hr />
                  <div id="item_dep_div">
                <h5>Item Dependencies</h5>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="basicInput">Start Rate</label>
                        <input type="text" class="form-control" name="item_depend[0][start]">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="basicInput">End Rate</label>
                        <input type="text" class="form-control" name="item_depend[0][end]">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="basicInput">Value</label>
                        <input type="text" class="form-control" name="item_depend[0][value]">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="basicInput">Type</label>
                        <select class="form-control" name="item_depend[0][type]">
                        <option value="Amount">Amount</option>
                        <option value="Percent">Percent</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                      <label for="basicInput">&nbsp;</label><br />
                        <a onclick="addMoreItemRow();" class="btn btn-sm btn-primary">Add More</a>
                      </div>
                    </div>
                    
                  </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-3 col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="text-left">
                  <div> 
                    <!--begin::Submit button-->
                    
                    <button type="button" id="form_submit" class="btn btn-sm btn-primary fw-bolder me-3 my-2">
                                <span class="indicator-label" id="formSubmit">Submit</span>
                                <span class="indicator-progress d-none">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                    <!--end::Submit button--> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</form>
<script>
var counterCost = 1;
var counterWeight = 1;
var counterItem = 1;
function addMoreItemRow(){
	var html = '<div id="item_row_div_'+counterItem+'" class="row">\
				<div class="col-md-2">\
				<div class="form-group">\
				<label for="basicInput">Start Rate</label>\
				<input type="text" class="form-control" name="item_depend['+counterItem+'][start]">\
				</div>\
				</div>\
				<div class="col-md-2">\
				  <div class="form-group">\
					<label for="basicInput">End Rate</label>\
					<input type="text" class="form-control" name="item_depend['+counterItem+'][end]">\
				  </div>\
				</div>\
				<div class="col-md-2">\
				  <div class="form-group">\
					<label for="basicInput">Value</label>\
					<input type="text" class="form-control" name="item_depend['+counterItem+'][value]">\
				  </div>\
				</div>\
				<div class="col-md-2">\
				  <div class="form-group">\
					<label for="basicInput">Type</label>\
					<select class="form-control" name="item_depend['+counterItem+'][type]">\
					<option value="Amount">Amount</option>\
					<option value="Percent">Percent</option>\
					</select>\
				  </div>\
				</div>\
				<div class="col-md-2">\
				  <div class="form-group">\
				  <label for="basicInput">&nbsp;</label><br />\
					<a onclick="removeItemRow('+counterItem+');" class="btn btn-sm btn-danger">Delete</a>\
				  </div>\
				</div>\
				</div>';
	$('#item_dep_div').append(html);
	counterItem++;
}
function addMoreWeightRow(){
	var html = '<div id="weight_row_div_'+counterWeight+'" class="row">\
				<div class="col-md-2">\
				<div class="form-group">\
				<label for="basicInput">Start Rate</label>\
				<input type="text" class="form-control" name="weight_depend['+counterWeight+'][start]">\
				</div>\
				</div>\
				<div class="col-md-2">\
				  <div class="form-group">\
					<label for="basicInput">End Rate</label>\
					<input type="text" class="form-control" name="weight_depend['+counterWeight+'][end]">\
				  </div>\
				</div>\
				<div class="col-md-2">\
				  <div class="form-group">\
					<label for="basicInput">Value</label>\
					<input type="text" class="form-control" name="weight_depend['+counterWeight+'][value]">\
				  </div>\
				</div>\
				<div class="col-md-2">\
				  <div class="form-group">\
					<label for="basicInput">Type</label>\
					<select class="form-control" name="weight_depend['+counterWeight+'][type]">\
					<option value="Amount">Amount</option>\
					<option value="Percent">Percent</option>\
					</select>\
				  </div>\
				</div>\
				<div class="col-md-2">\
				  <div class="form-group">\
				  <label for="basicInput">&nbsp;</label><br />\
					<a onclick="removeWeightRow('+counterWeight+');" class="btn btn-sm btn-danger">Delete</a>\
				  </div>\
				</div>\
				</div>';
	$('#weight_dep_div').append(html);
	counterWeight++;
}
function addMoreCostRow(){
	var html = '<div id="cost_row_div_'+counterCost+'" class="row">\
				<div class="col-md-2">\
				<div class="form-group">\
				<label for="basicInput">Start Rate</label>\
				<input type="text" class="form-control" name="cost_depend['+counterCost+'][start]">\
				</div>\
				</div>\
				<div class="col-md-2">\
				  <div class="form-group">\
					<label for="basicInput">End Rate</label>\
					<input type="text" class="form-control" name="cost_depend['+counterCost+'][end]">\
				  </div>\
				</div>\
				<div class="col-md-2">\
				  <div class="form-group">\
					<label for="basicInput">Value</label>\
					<input type="text" class="form-control" name="cost_depend['+counterCost+'][value]">\
				  </div>\
				</div>\
				<div class="col-md-2">\
				  <div class="form-group">\
					<label for="basicInput">Type</label>\
					<select class="form-control" name="cost_depend['+counterCost+'][type]">\
					<option value="Amount">Amount</option>\
					<option value="Percent">Percent</option>\
					</select>\
				  </div>\
				</div>\
				<div class="col-md-2">\
				  <div class="form-group">\
				  <label for="basicInput">&nbsp;</label><br />\
					<a onclick="removeCosrRow('+counterCost+');" class="btn btn-sm btn-danger">Delete</a>\
				  </div>\
				</div>\
				</div>';
	$('#cost_dep_div').append(html);
	counterCost++;
}
function removeCosrRow(counter){
	$('#cost_row_div_'+counter).remove();
}
function removeWeightRow(counter){
	$('#weight_row_div_'+counter).remove();
}
function removeItemRow(counter){
	$('#item_row_div_'+counter).remove();
}
</script>
<!-- end plugin js --> 
<script>
    let saveDataURL = "<?php echo e(url('/admin/add-shipping-method')); ?>";
    let returnURL = "<?php echo e(url('/admin/shipping-methods')); ?>";
</script>
<script src="<?php echo e(asset('public/admin/js/pages/shipping_methods/add-page.js')); ?>"></script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp-8\htdocs\luxury-train\resources\views//admin/shipping_methods/add-page.blade.php ENDPATH**/ ?>