<?php $__env->startSection('content'); ?>


<style>
    .not_confirm{background:#ed4a4a; color:#FFF}
    .received{background:#37b561; color:#FFF}
</style>
<div class="page-heading">

    <div class="page-title">

        <div class="row">

            <div class="col-12 col-md-6 order-md-1 order-last">

                <h3>Orders</h3>

                <p class="text-subtitle text-muted">Orders list.</p>

            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">

                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Orders</li>

                    </ol>

                </nav>

            </div>

        </div>

    </div>

    <section class="section">

        <div class="card">

           <!--begin::Card body-->

            <div class="card-body">

                <!--begin::Compact form-->

                <form id="searchForm" name="searchForm" class="float-start">

                    <div class="d-flex align-items-center  w-md-800px">

                        <!--begin::Input group-->                            

                        <div class="position-relative w-md-200px me-md-2">

                            <input type="date" id="from_date" name="from_date" class="form-control"/>

                        </div>

                        <div class="position-relative w-md-200px me-md-2">

                            <input type="date" id="to_date" name="to_date" class="form-control"/>

                        </div>

                        <div class="position-relative w-md-200px me-md-2">

                            <input type="text" name="customer_name" id="customer_name" placeholder="Customer Name" class="form-control"/>

                        </div>

                        <div class="position-relative w-md-200px me-md-2">

                            <select name="order_status" id="order_status" class="form-select" confirmation="false">

                                <option value="">Select Status</option>

                                <option value="Pending">Pending</option>

                                <option value="Processing">Processing</option>

                                <option value="Delivered">Delivered</option>

                                <option value="Cancelled">Cancelled</option>

                            </select>

                        </div>

                        <div class="position-relative w-md-200px me-md-2">

                            <select name="payment_status" id="payment_status" class="form-select" confirmation="false">

                                <option value="">Select Payment Status</option>

                                <option value="2">Not Confirm</option>
                                <option value="1">Received</option>

                            </select>

                        </div>

                        

                        

                        <!--end::Input group-->

                        <!--begin:Action-->

                        <div class="d-flex align-items-center">

                            <button type="button" id="searchbuttons" onclick="filterData('search');" style="margin-right:10px;" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Search</button>

                            <button type="reset" class="btn btn-sm btn-dark btn-active-light-primary me-5" data-kt-menu-dismiss="true"  onclick="resetFilterForm();">Reset</button>

                        </div>

                        <!--end:Action-->

                    </div>                        

                </form>

                <!---<a onclick="exportData();" id="exportCsvBtn" class="btn icon btn-sm btn-outline-primary float-end" style="margin-left:5px">Export CSV</a>--->

            </div>

            <!--end::Card body-->

        </div>

    </section>

    <!-- Table head options start -->

    <section class="section">

        <div class="row" id="table-head">

            <div class="col-12">

                <div class="card">



                    <div class="card-content">

                        <!-- table head dark -->

                        <div class="table-responsive">

                            <table class="table mb-0">

                                <thead class="thead-dark">

                                    <tr>

                                    	<th>#</th>

                                        <th>CUSTOMER DETAILS</th>

                                        <th>ORDER DETAILS</th>

                                        <th>ORDER STATUS</th>

                                        <th>PAYMENT STATUS</th>

                                        <th>CREATED</th>

                                        <th>ACTION</th>

                                    </tr>

                                </thead>

                                <tbody id="replaceHtml">

                                    <tr>

                                        <td colspan="10" class="text-center"><img src="<?php echo e(asset('public/admin/images/svg/oval.svg')); ?>" class="me-4" style="width: 3rem" alt="audio"></td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Table head options end -->

</div>


<div class="modal quick_contact" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tracking</h5>
      </div>
      <div class="modal-body">
         <form class="form w-100" id="trackingForm" action="#">    	
            <input type="hidden" name="orderid" id="orderid"  value="">    
            <label>Shipping Company</label>    
            <input type="text" class="form-control" id="shipping_company" name="shipping_company"  required="required" placeholder="Enter Shipping Company"/>
            
            <label>Tracking Code</label>    
            <input type="text" class="form-control" id="traking_code" name="traking_code"  required="required" placeholder="Enter Tracking Code"/>
            
            <label>Tracking URL</label>    
            <input type="text" class="form-control" id="traking_url" name="traking_url"  required="required" placeholder="Enter Tracking URL"/>
      </div>
      <div class="modal-footer crt_hmt">
        <button type="button" id="trackingBtn" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" id="close_btn">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>

$(document).on('click','#trackingBtn',function(){
      $('#trackingBtn').html('Processing...');
      $('#trackingBtn').attr('disabled',true);
      var orderid = $('#orderid').val();
      var shipping_company = $('#shipping_company').val();
      var traking_code = $('#traking_code').val();
      var traking_url = $('#traking_url').val();
      $.ajax({   
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},   
         type: 'POST',   
         data: {orderid:orderid,shipping_company:shipping_company,traking_code:traking_code,traking_url:traking_url},
         url: "<?php echo e(url('/admin/update-traking-no')); ?>",
         success: function(response){
            filterData();
            if(response == 'Success'){
               swal("Success!", 'Traking number has been added successfully', "success");
               
            }else{
               swal("Error!", 'Something went wrong', "error");
            }
            $('#trackingBtn').html('Submit');
            $('#trackingBtn').attr('disabled',false);
            $(".quick_contact").fadeOut("fast");
         },error: function(ts){
            console.log(ts);
            swal("Error!", 'Something went wrong, please try after sometime.', "error");
            return false;
         }  
      });
   });

   function trakno(order_id, shipping_company,tracking_code,tracking_url){      
      $(".quick_contact").fadeOut("fast");
      $('#orderid').val(order_id);
      $('#shipping_company').val(shipping_company);
      $('#traking_code').val(tracking_code);      
      $('#traking_url').val(tracking_url);
      $(".quick_contact").fadeIn("fast");
   }

   $(document).ready(function() {
      $("#close_btn").click(function(){
         $('#orderid').val('');
         $('#shipping_company').val('');
         $('#traking_code').val('');
         $('#traking_url').val('');
         jQuery(".quick_contact").fadeOut("fast");
      });
   });


function setPaymentStatus(paymentStatus,rowId){
      $.ajax({
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},   
         type: 'POST',
         url: "<?php echo e(url('/admin/set-payment-status')); ?>",
         data: {paymentStatus:paymentStatus,rowId:rowId},
         success: function(msg){            
            if(paymentStatus == '1'){               
               $('#pay_dropdown'+rowId).removeClass('not_confirm').addClass('received');               
            }else{               
               $('#pay_dropdown'+rowId).removeClass('received').addClass('not_confirm');               
            }            
            return false;            
         }
      });
   }

function exportData(){

    $('#exportCsvBtn').html('......');

    $.ajax({

        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

        type: "POST",

        url: "<?php echo e(route('exports.orders')); ?>",

        data: $('#searchForm').serialize(),

        success: function(msg){

            $('#exportCsvBtn').html('Export CSV');

            window.location.href = msg;

        },error: function(ts){

            $('#error500').modal('show');

        }

    });

    return false;

}

function updateOrderStatus(row,value){

    swal({

		title: "Are you sure?",

		text: "",

		icon: "warning",

		buttons: true,

		dangerMode: true,

    })

    .then((willDelete) => {

    if (willDelete) {

        $.ajax({

            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            type: 'POST',

            data: {row:row,value:value},

            url: "<?php echo e(url('/admin/update-order-status')); ?>",

            success: function(msg){

                if(msg == "Success"){

                    swal({

                    title: 'Success',

                    text: 'Order staus updated successfully.',

                    type: 'success',

                    confirmButtonText: 'Ok',

                    confirmButtonColor: "#009EF7"});

                    filterData('simple');

                }else{

                    swal({

                        title: "Oops!",

                        text: msg,

                        type: "warning",

                        timer: 3000

                    });

                }

            }

        });

    } else {

        filterData('simple');

       // swal("Order status is pending!");

    }

    });

}

$(document).ready(function(){

    filterData('simple');

});

function filterData(type = null){

    if(type =='search'){$('#searchbuttons').html('Searching..');}

	$.ajax({

        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

        type: 'POST',

		data: $('#searchForm').serialize(),

		url: "<?php echo e(url('/admin/orders_paginate')); ?>",

		success: function(response){

			$('#replaceHtml').html(response);

            $('#searchbuttons').html('Search');

		}

	});

}

</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views//admin/orders/index.blade.php ENDPATH**/ ?>