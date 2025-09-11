<?php $__env->startSection('content'); ?>

<div class="page-heading">

  <div class="page-title">

    <div class="row">

      <div class="col-12 col-md-6 order-md-1 order-last">

        <h3>View Order</h3>

      </div>

      <div class="col-12 col-md-6 order-md-2 order-first">

        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

          <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>

            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/orders')); ?>">Order</a></li>

            <li class="breadcrumb-item active" aria-current="page">View Order</li>

          </ol>

        </nav>

      </div>

    </div>

  </div>

  <section class="section">

    <form class="form w-100" id="pageForm" action="#">

      <div class="row">

        <div class="col-12 col-md-12">

          <div class="card">

            <div class="card-body">



                  <div class="row">



                    <div class="col-md-12 col-12"><h6 style="background-color: #f2f7ff;padding: 9px;" for="basicInput">Customer Details</h6></div>

                  	

                    <div class="col-md-4">

                      <div class="form-group">

                        <label for="basicInput"><b>Invoice :</b> <?php echo e($rowData->invoice_id); ?></label>

                      </div>

                    </div>
                    
                    <div class="col-md-4">

                      <div class="form-group">

                        <label for="basicInput"><b>Transaction ID :</b> <?php echo e($rowData->transaction_id); ?></label>

                      </div>

                    </div>

                    <div class="col-md-4">

                      <div class="form-group">

                        <label for="basicInput"><b>Name :</b> <?php echo e($rowData->customer_name); ?></label>

                      </div>

                    </div>

                    <div class="col-md-4">

                      <div class="form-group">

                        <label for="basicInput"><b>Email :</b> <?php echo e($rowData->customer_email); ?></label>

                      </div>

                    </div>

                    <div class="col-md-4">

                      <div class="form-group">

                        <label for="basicInput"><b>Mobile :</b> <?php echo e($rowData->customer_mobile); ?></label>

                      </div>

                    </div>

                    <div class="col-md-12">

                      <div class="form-group">

                        <label for="basicInput"><b>Address :</b> <?php echo nl2br($rowData->customer_address); ?></label>

                      </div>

                    </div>

                    <div class="col-md-4">

                      <div class="form-group">

                        <label for="basicInput"><b>City :</b> <?php echo nl2br($rowData->customer_city); ?></label>

                      </div>

                    </div>

                    <div class="col-md-4">

                      <div class="form-group">

                        <label for="basicInput"><b>State :</b> <?php echo nl2br($rowData->customer_state); ?></label>

                      </div>

                    </div>

                    <div class="col-md-4">

                      <div class="form-group">

                        <label for="basicInput"><b>Zipcode :</b> <?php echo nl2br($rowData->customer_zipcode); ?></label>

                      </div>

                    </div>

                    <?php if($rowData->coupon_code != ''): ?>

                    <div class="col-md-4">

                      <div class="form-group">

                        <label for="basicInput"><b>Couponcode :</b> <?php echo nl2br($rowData->coupon_code); ?></label>

                      </div>

                    </div>

					<?php endif; ?>

                    <div class="col-md-12 col-12"><h6 style="background-color: #f2f7ff;padding: 9px;" for="basicInput">Order Details</h6></div>

                      <div class="col-md-12">

                            <table class="table">

                              <tr>

                                <th>Image</th>

                                <th width="30%">Product</th> 

                                <th>Weight</th> 

                                <th>Order Date</th>

                                <th>Price</th>

                              </tr>

                              <?php if(isset($order_details) && $order_details->count()>0): ?>

                              <?php $__currentLoopData = $order_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>

                              <td>
                                <?php
                                  $image = Helper::getProduct($order->product_id,'image');
                                ?>
                                <?php if($image != ''): ?>
                                  <img src="<?php echo e(URL::asset('public/admin/images/teams/')); ?>/<?php echo $image; ?>"  style="max-width: 80px;height: auto;"> 
                                <?php endif; ?>
                                
                              </td> 
                              
                              <td>
                                Category: <?php echo e($order->product_category); ?><br>
                                Brand: <?php echo e($order->product_brand); ?><br>
                                <?php echo e($order->product_name); ?>

                              </td> 

                              <td>
                                Gross Weight: <?php echo e($order->gross_weight); ?><br>
                                Rubelite Weight: <?php echo e($order->rubelite_weight); ?><br>
                                Tanzanite Weight: <?php echo e($order->tanzanite_weight); ?><br>
                              </td> 

                              <td><?php echo date('d-m-Y',strtotime($rowData->order_date)); ?></td>

                              <td>₹ <?php echo number_format($order->totalamount,2); ?></td>

                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              <?php endif; ?>                      

                              <tr>

                              <td colspan="2"></td>

                              <td colspan="1">
                                <?php if(isset($rowData->coupon_code) && $rowData->coupon_code != ''): ?>
                                <B>Coupon: <?php echo e($rowData->coupon_code); ?></b>
                                <?php endif; ?>
                              </td>

                                <td><b>Discount</b></td>

                                <td><b>-₹ <?php echo e(number_format($rowData->discount,2)); ?></b></td>

                              </tr>
                              
                              <tr>

                                <td colspan="3"></td>

                                <td><b>Total</b></td>

                                <td><b>₹ <?php echo e(number_format($rowData->total,2)); ?></b></td>                        

                              </tr>

                            </table>

                            </div>                    

                          </div>           

                      </div>

                    </div>

                  </div>

                </div>        

              </div> 

    </form>

  </section>

</div>

<!-- end plugin js --> 

<script>

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views//admin/orders/view-page.blade.php ENDPATH**/ ?>