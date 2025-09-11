@if(isset($products) && $products->count()>0)
    @foreach($products as $key => $product)
      <div class="col-md-4 col-lg-4 text-start">
        <div class="pr-img">
          <div class="product-box-pt">
            @if($product->image != '')
            <img src="{{ asset('public/admin/images/teams/')}}/{{$product->image}}" class="img-fluid" alt="">
            @endif
            <div class="pro-cont">
              <a href="{{url('/product-details/')}}/{{$product->slug}}" class="btn bg-orange">View Details</a>
            </div>
          </div>         
          <div class="rating-star">
          @for($x=1;$x<=$product->rating;$x++)
            <i class="fa fa-star checked" style="color: #f9b92d;"></i>
          @endfor
          </div>
          <a href="{{url('/product-details/')}}/{{$product->slug}}"><h4 class="text-dark">{{$product->title}}</h4>
          <p><span>₹ {{number_format($product->amount)}}</span></p></a>
        </div>
      </div>
    @endforeach    
@else
    <div class="col-md-12 col-lg-12 text-center alert alert-danger">No Product Found</div>
@endif

<div class="col-md-12 d-flex justify-content-center">
    {!! $products->appends(request()->except('page','_token'))->links('pagination.front') !!}
</div>

@include('element.addtocart')