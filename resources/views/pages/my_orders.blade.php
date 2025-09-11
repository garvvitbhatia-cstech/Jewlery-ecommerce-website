@extends('layout.default')
@section('content')
@if(isset($inner_page->id))
@section('title',strip_tags($inner_page->seo_title))
@section('description',strip_tags($inner_page->seo_description))
@section('keywords',strip_tags($inner_page->seo_keyword))
@section('robots',strip_tags($inner_page->robot_tags))
@endif
<div class="hero-section innerpage-section">
  <div class="container">
    <div class="text-center d-flex align-items-center justify-content-center flex-column">
      <h2>My Orders</h2>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol>
      </nav>
    </div>
  </div>
</div>

@if(isset($orders) && $orders->count()>0)
<section class="pro-carousel">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form action="#" class="search-box-form">
          <div class="search-form-main">
            <input type="search" placeholder="Search Order" class="search-box-field">
            <button type="button" id="searchBtn" class="search-btn"><img src="{{ asset('public/img/home/')}}/search.svg"/></button>
          </div>
        </form>
      </div>
    </div>
    
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-12">
            <div class="accordion myOrder-tab-cls replaceHtml" id="accordionExample">
            
            	@foreach($orders as $key => $order)
					        <div class="accordion-item">
                        <div class="accordion-header" id="headingthree{{$key}}">
                          <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapsethree{{$key}}" aria-expanded="true" aria-controls="collapsethree{{$key}}">
                            <div class="kk-contant-boxb cart-box-cnt w-100 align-items-center  d-flex justify-content-between">
                              <div class="left-content-order">
                                <h4 class="d-block cat-head text-capitalize mb-2">Order ID: <span class="title-dscnt">#{{$order->invoice_id}}</span> </h4>
                                <div class="d-flex align-items-center"> <span class="d-block cat-head fw-bold">₹{{number_format($order->total,2)}}</span> <span class="d-flex align-items-center fs-1 ps-3"><span class="pe-2 calendar-icon"><img src="{{ asset('public/img/home/')}}/calendar-icon.svg" alt=""></span>{{date('d F Y',strtotime($order->created_at))}} at {{date('h:iA',strtotime($order->created_at))}}</span> </div>
                              </div>
                              <span class="delivered-btn me-3"> {{$order->order_status}} </span> </div>
                          </div>
                        </div>
                        <div id="collapsethree{{$key}}" class="accordion-collapse collapse" aria-labelledby="headingthree{{$key}}" data-bs-parent="#accordionExample">
                          <div class="d-flex flex-md-row flex-column shipping-address">
                            <p class="d-flex text-left mt-0 pb-4 w-50 flex-column flex-md-row "><strong class="me-2 text-uppercase">Ship To:</strong> {{$order->customer_address}}, {{$order->customer_city}}, {{$order->customer_state}} @if($order->customer_country != '') - {{$order->customer_country}}- @else - @endif {{$order->customer_zipcode}}</p>
                            <div class="cls w-50 d-flex justify-content-end mb-4">
                              <div class="d-flex rate-boxs align-items-md-center">
                                <div class="d-flex"> 
								                @if(isset($order->tracking_url) && $order->tracking_url != '')
                                <a href="{{$order->tracking_url}}" target="_blank" class="btn btn-green d-flex align-items-center mx-2">Track Now <span class="user-icon ms-2"><img src="{{ asset('public/img/home/')}}/arrow-green.png" alt=""></span></a> 
                                @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          @php $products = Helper::getOrderProducts($order->id); @endphp
                          @foreach($products as $key => $product)
                          @php $product_details = Helper::getProductInfo($product->product_id); @endphp
                          <div class="d-flex oder-tabs-cls align-items-center">
                            <div class="cls w-50 d-flex align-items-center"> <a href="#" class="product-img">
                                @if(isset($product_details->id))
                                @if($product_details->image != '')
                                    <img src="{{ asset('public/admin/images/teams/')}}/{{$product_details->image}}" class="img-boxs">
                                @endif
                                @endif
                            </a>
                              <div class="kk-contant-boxb cart-box-cnt"> <span> <span class="d-block mb-2 cat-head fw-bold">{{$product->product_name}}</span> </span> <span class="d-block mb-2 cat-head fw-bold">₹ {{number_format($product->price,2)}}</span>
                                <ul class="star-menu-list d-flex list-unstyled mb-md-0 ">
                                    @if(isset($product_details->id))
                                    @for($x=1;$x<=$product_details->rating;$x++)
                                    <i class="fa fa-star checked" style="color: #f9b92d;"></i>&nbsp;
                                    @endfor
                                    @endif
                                </ul>
                              </div>
                            </div>
                          </div>
                          <hr/>
                          @endforeach
                          @if($order->discount > 0)              
                          <b>Discount: ₹ {{number_format($order->discount,2)}}</b>
                          @endif
                        </div>
                    </div>
              	@endforeach              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  </div>
</section>
@else
<section class="pro-carousel">
  <div class="container">
    <div class="row">
    <div class="col-md-12 col-lg-12 text-center alert alert-danger">No Orders Found!</div>
    </div>
</section>
@endif

@include('element.process_section')

<script type="text/javascript">

$(document).on('click','#searchBtn',function(e) {
  search();
});

  function search(){
    var flag = 1;
    if($('.search-box-field').val() == ''){
      //swal("Error!", 'Please Enter Order ID', "error");
      //flag = 0;
    }
    if(flag == 1){
      var oid = $('.search-box-field').val();
      $.ajax({
        type:'POST',
        url:"{{url('/search-order')}}", 
        async:false,
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{oid:oid},
        success: function(response){
          $('.replaceHtml').html(response);
        },error: function(ts){
          console.log(ts);
          swal("Error!", 'Something went wrong.', "error");
        }							
      });
      return false;
    }
  }
</script>



@endsection