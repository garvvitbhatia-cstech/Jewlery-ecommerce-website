
@if(isset($orders) && $orders->count()>0)

  @foreach($orders as $key => $order)
      <div class="accordion-item">
            <div class="accordion-header" id="headingthree{{$key}}">
              <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapsethree{{$key}}" aria-expanded="true" aria-controls="collapsethree{{$key}}">
                <div class="kk-contant-boxb cart-box-cnt w-100 align-items-center  d-flex justify-content-between">
                  <div class="left-content-order">
                    <h4 class="d-block cat-head text-capitalize mb-2">Order ID: <span class="title-dscnt">#{{$order->invoice_id}}</span> </h4>
                    <div class="d-flex align-items-center"> <span class="d-block cat-head fw-bold">₹{{number_format($order->total)}}</span> <span class="d-flex align-items-center fs-1 ps-3"><span class="pe-2 calendar-icon"><img src="{{ asset('public/img/home/')}}/calendar-icon.svg" alt=""></span>{{date('d F Y',strtotime($order->created_at))}} at {{date('h:iA',strtotime($order->created_at))}}</span> </div>
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
                <div class="cls w-50 d-flex align-items-center"> <a href="{{url('product-details',$product_details->slug)}}" class="product-img">
                    @if($product_details->image != '')
                        <img src="{{ asset('public/admin/images/teams/')}}/{{$product_details->image}}" class="img-boxs">
                    @endif
                </a>
                  <div class="kk-contant-boxb cart-box-cnt"> <span> <span class="d-block mb-2 cat-head fw-bold">{{$product_details->title}}</span> </span> <span class="d-block mb-2 cat-head fw-bold">₹ {{$product->price}}</span>
                    <ul class="star-menu-list d-flex list-unstyled mb-md-0 ">
                        @for($x=1;$x<=$product_details->rating;$x++)
                        <i class="fa fa-star checked" style="color: #f9b92d;"></i>&nbsp;
                        @endfor

                    </ul>
                  </div>
                </div>
              </div>
              <hr/>
              @endforeach
            </div>
        </div>
    @endforeach

@else
  <div class="container">
    <div class="row">
    <div class="col-md-12 col-lg-12 text-center alert alert-danger">No Orders Found!</div>
    </div>
@endif