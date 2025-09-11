@if(isset($products) && $products->count()>0)

<style>
  .prodct-pt .right p span {
      margin-top: 20px;
      font-size: 14px;
      color: var(--orange);
      font-weight: var(--medium);
  }
</style>

  @if($slug == 'Live')

    @foreach($products as $key => $product)

      <div class="col-md-4">
        <a href="javascript:void(0)">
            <div class="pro-box">
              <div class="img">
                @if($product->image != '')
                <img src="{{ asset('public/admin/images/teams/')}}/{{$product->image}}" class="img-fluid" alt="">
                @endif
              </div>
              <div class="pro-cont">
                <p class="mt-md-3">Description</p>                
                <p><span>Gross Weight: {{$product->gross_weight}}</span></p>
                <p><span>Rubellite Weight: {{$product->rubellite_weight}} </span></p>
                <p><span>Tanzanite Weight: {{$product->tanzanite_weight}} </span></p>
                <p class="mt-md-3">Date</p>
                <p><span> {!! date('d-m-Y h:i a',strtotime($product->start_date)) !!}</span></p>
                <p><span> {!! date('d-m-Y h:i a',strtotime($product->end_date)) !!}</span></p>
                <div class="text-center">                  
                  @if(session()->has('login_user_email'))                                    
                    @if($is_bidder_show == 'Yes')
                      <button id="bid_product_{{$product->id}}" onclick="bidProduct('{{base64_encode($product->id)}}')" class="btn">Bid Now</button>
                    @endif
                  @else
                    <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn">Bid Now</button>
                  @endif
                </div>
              </div>
            </div>
        </a>
        @php $start_price = '₹ '.number_format($product->start_price,2) @endphp
        <h6>{{$product->title}}</h6>
        <p><strong>₹ {{number_format($product->amount,2)}} - ₹ {{number_format($product->start_price,2)}}</strong></p> 
    </div>

    @endforeach

  @elseif($slug == 'Upcoming')

    @foreach($products as $key => $product)
    <div class="col-md-4">
        <a href="javascript:void(0)">
          <div class="pro-box">
            <div class="img">
            @if($product->image != '')
            <img src="{{ asset('public/admin/images/teams/')}}/{{$product->image}}" class="img-fluid" alt="">
            @endif
            </div>
            <div class="pro-cont">
                <p class="mt-md-3">Description</p>
                <p><span>Gross Weight: {{$product->gross_weight}}</span></p>
                <p><span>Rubellite Weight: {{$product->rubellite_weight}} </span></p>
                <p><span>Tanzanite Weight: {{$product->tanzanite_weight}} </span></p>
                <p class="mt-md-3">Start Date</p>
                <p><span> {!! date('d-m-Y h:i a',strtotime($product->start_date)) !!}</span></p>
            </div>
          </div>
        </a>
        <h6>{{$product->title}}</h6>
        <p><strong>₹ {{number_format($product->amount,2)}} - ₹ {{number_format($product->start_price,2)}}</strong></p> 
    </div>
    @endforeach

  @else

    @foreach($products as $key => $product)
    <div class="col-md-4">
        <a href="javascript:void(0)">
          <div class="pro-box">
            <div class="img">
            @if($product->image != '')
            <img src="{{ asset('public/admin/images/teams/')}}/{{$product->image}}" class="img-fluid" alt="">
            @endif
            </div>
            <div class="pro-cont">
                <p class="mt-md-3">Description</p>
                <p><span>Gross Weight: {{$product->gross_weight}}</span></p>
                <p><span>Rubellite Weight: {{$product->rubellite_weight}} </span></p>
                <p><span>Tanzanite Weight: {{$product->tanzanite_weight}} </span></p>
                <p class="mt-md-3">Minimum Maximum Bidding</p>
                <p class="mt-md-3"><span> ₹ {{number_format($product->min,2)}} - ₹ {{number_format($product->max,2)}}</span></p>  
                <p class="mt-md-3">Wining Price</p>
                <p class="mt-md-3"><span>₹ {{number_format($product->max,2)}}</span></p>   
            </div>
          </div>
        </a>
        <h6>{{$product->title}}</h6>
    </div>
    @endforeach

  @endif

  @else

  <div class="col-md-12 col-lg-12 text-center alert alert-danger">No Product Found</div>

  @endif

<div class="col-md-12 d-flex justify-content-center">
    {!! $products->appends(request()->except('page','_token'))->links('pagination.front') !!}
</div>

@include('element.addtocart')