@if(isset($products) && $products->count()>0)
    @foreach($products as $key => $product)
      <div class="col-md-4 col-lg-3 text-start">
        <div class="pr-img">
          <div class="product-box-pt">
            @if($product->image != '')
            <img src="{{ asset('public/admin/images/teams/')}}/{{$product->image}}" class="img-fluid" alt="">
            @endif
            <div class="pro-cont">
              <p class="mt-md-3">Description</p>
              <p><span>Gross Weight: {{$product->gross_weight}}</span></p>
              <p><span>Rubellite Weight: {{$product->rubellite_weight}} </span></p>
              <p><span>Tanzanite Weight: {{$product->tanzanite_weight}} </span></p>
              <p class="mt-md-3">Date</p>
              <p><span> {!! date('d-m-Y h:i a',strtotime($product->start_date)) !!}</span></p>
              <p><span> {!! date('d-m-Y h:i a',strtotime($product->end_date)) !!}</span></p>              
            </div>
          </div>         

          @for($x=1;$x<=$product->rating;$x++)
            <i class="fa fa-star checked" style="color: #f9b92d;"></i>
          @endfor

          <a href="{{url('/product-details/')}}/{{$product->slug}}"><h4 class="text-dark">{{$product->title}}</h4>
          <p><span>₹ {{number_format($product->amount)}}</span></p></a>
        </div>
      </div>
    @endforeach    
@else
    <div class="col-md-12 col-lg-12 text-center alert alert-danger">No Product Found</div>
@endif


@include('element.addtocart')