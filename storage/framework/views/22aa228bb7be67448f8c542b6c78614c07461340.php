<?php $__env->startSection('content'); ?>
<?php if(isset($inner_page->id)): ?>
<?php $__env->startSection('title',strip_tags($inner_page->seo_title)); ?>
<?php $__env->startSection('description',strip_tags($inner_page->seo_description)); ?>
<?php $__env->startSection('keywords',strip_tags($inner_page->seo_keyword)); ?>
<?php $__env->startSection('robots',strip_tags($inner_page->robot_tags)); ?>
<?php endif; ?>
<style>
.o_success_heading{color: #093;
    font-size: 22px;
    font-weight: bold;}
.o_success_div{border: 2px solid #093;
   
    padding: 20px;}


    .card{
        text-align: center;
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #c8d0d8;
        display: inline-block;
        margin: 0 auto;
    }
    i{
        color: #9abc66;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
    }
    h1 {
        color: #88b04b;
        font-family: Nunito Sans, Helvetica Neue, sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }
    p{
        color: #404f5e;
        font-family: Nunito Sans, Helvetica Neue, sans-serif;
        font-size: 20px;
        margin: 0;
    }
    .round{border-radius: 200px; height: 200px; width: 200px; background: #F8FAF5; margin: 0 auto;}
    @media (max-width: 767.98px) {
        .card {
            text-align: center;
            background: white;
            padding: 17px;
            border-radius: 4px;
            box-shadow: 0 2px 3px #c8d0d8;
            display: inline-block;
            margin: 0 auto;
        }
        i {
            color: #9abc66;
            font-size: 44px;
            line-height: 96px;
            margin-left: -2px;
        }
        h1 {
            color: #88b04b;
            font-family: Nunito Sans, Helvetica Neue, sans-serif;
            font-weight: 700;
            font-size: 27px;
            margin-bottom: 10px;
        }
        p{
            color: #404f5e;
            font-family: Nunito Sans, Helvetica Neue, sans-serif;
            font-size: 13px;
            margin: 0;
        }
        .round{border-radius: 200px; height: 100px; width: 100px; background: #F8FAF5; margin: 0 auto;}
    }
</style>
<div class="hero-section innerpage-section">
  <div class="container">
    <div class="text-center d-flex align-items-center justify-content-center flex-column">
      <h2>Thank You</h2>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Orders Success</li>
        </ol>
      </nav>
    </div>
  </div>
</div>

<?php if(isset($orders) && $orders->count()>0): ?>
<section class="pro-carousel">
  <div class="container">
    
    
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-12">
            <div class=" myOrder-tab-cls replaceHtml" id="accordionExample">
            
            <div class="row mt-15 mb-4">
                <div class="col-lg-12 pt-4 text-center"><div class="card"><div class="round"><i class="checkmark">✓</i></div><h1>Thank You</h1>
                <span>Order No:2342342</span>
                <p>Your order has been received successfully !<br> A confirmation notification has been sent to you. We'll notify as soon as the order is Shipped. <br><br></p>
                <div style="width: 270px; margin: 0px auto;"><p>
                    <a href="/my-orders" class="btn btn-outline-primary d-flex align-items-center" style="justify-content: center;" >View Order </a>
                    <br>
                    <a href="/" class="btn btn-outline-primary d-flex align-items-center"> Continue Shopping </a></p></div>
                    <p><br> Have questions about your order?<br><a href="/contact-us">Contact Us</a></p></div></div>
                
            </div>
            	            
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  
  </div>
</section>
<?php else: ?>
<section class="pro-carousel">
  <div class="container">
    <div class="row">
    <div class="col-md-12 col-lg-12 text-center alert alert-danger">No Orders Found!</div>
    </div>
    </div>
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a6xnk0irt52m/public_html/resources/views//checkout/order_failed.blade.php ENDPATH**/ ?>