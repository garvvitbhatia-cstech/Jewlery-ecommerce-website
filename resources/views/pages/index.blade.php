@extends('layout.default')
@section('content')
@if(isset($inner_page->id))
@section('title',strip_tags($inner_page->seo_title))
@section('description',strip_tags($inner_page->seo_description))
@section('keywords',strip_tags($inner_page->seo_keyword))
@section('robots',strip_tags($inner_page->robot_tags))
@endif

@if(isset($banners) && $banners->count()>0)
<div class="hero-section">
  <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        @foreach($banners as $key => $banner)
        <div class="carousel-item {{$key == 0?'active':''}}">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="hero-banner-text">
                <h1>{!!nl2br($banner->title)!!}</h1>
                <p>{!!nl2br($banner->content)!!}</p>
                <div class="btn-set">
                  @if($banner->btn1_title != '' && $banner->btn1_url != '' && $banner->is_show_btn1 == 1)
                    <a href="{{$banner->btn1_url}}" class="btn">{{$banner->btn1_title}}</a>
                  @endif

                  @if($banner->btn2_title != '' && $banner->btn2_url != '' && $banner->is_show_btn2 == 1)
                    <a href="{{$banner->btn2_url}}" class="btn outline">{{$banner->btn2_title}}</a>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-md-6">
              @if(isset($banner) && $banner->image != '')
              <img src="{{ asset('public/admin/images/banners/')}}/{{$banner->image}}" class="" alt="...">
              @endif
            </div>
          </div>          
        </div>
        @endforeach

      </div>      
    </div>
  </div>
</div>
@endif


@if(isset($featured_categories) && $featured_categories->count()>0)
<div class="featured-section section-padding wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-md-8 mx-auto text-cener heading">
              <h2>Featured Collections</h2>
            </div>
          </div>
          @foreach($featured_categories as $key => $category)
        @php
            $modulas = $key%3;
        @endphp
        @if($modulas == 0)
        <div class="row">
            @endif
          <div class="col-md-4">
            <a href="{{url('products/')}}/{{$category->slug}}">
              <div class="product-box">
                @if($category->icon != '')
                <img src="{{ asset('public/admin/images/teams/')}}/{{$category->icon}}" alt="">
                @else

                @endif
                <h3>{{$category->title}}</h3>
                <p>{{nl2br($category->description)}}</p>
              </div>
            </a>
          </div>
          @if($modulas == 2)   
        </div>
          @endif
          @endforeach
          
        </div>
      </div>
      @endif

      <div class="offers-section wow fadeInUp">
        <div class="row">
        <!--@if(isset($inner_page->id))
          <div class="col-md-6 px-0">
            <div class="offer-box first">
              <video muted autoplay playsinline loop>
                <source src="//s3-eu-west-1.amazonaws.com/soundboks-images/sb17/tailgate-page/videos/Loop-414x310.mp4" width="100%" type="video/mp4">
              </video>
              <div class="right-offer">
              <h5>{{$inner_page->heading}}</h5>
              <h3>{!! $inner_page->content !!}</h3>
                <div class="d-flex">
                  <a href="" class="btn outline bg-transparent">View All</a>
                </div>
              </div>
            </div>
          </div>
          @endif-->

          @if(isset($section2->id))
          <div class="col-md-12 px-0">
            <div class="offer-box second">
              <video muted autoplay playsinline loop>
                <source src="{{ asset('public/img/home-videos/6262756-uhd_3840_2160_25fps.mp4')}}" width="100%" type="video/mp4">
              </video>
              <div class="right-offer">
              <h5>{{$section2->heading}}</h5>
              <h3>{!! $section2->content !!}</h3>
                <div class="d-flex">
                  <a href="" class="btn outline bg-transparent border-white text-white">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
          @endif

        </div>
      </div>


      @if(isset($products) && $products->count()>0)
      <div class="product-section section-padding wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-md-8 mx-auto text-cener heading">
              <h2>Our Products</h2>
            </div>
          </div>
          <div class="row margin">
            @foreach($products as $key => $product)
            <div class="col-md-4">
              <a href="javascript:void(0)">
                <div class="pro-box">
                  <div class="img"><img src="{{ asset('public/admin/images/teams/')}}/{{$product->image}}" alt=""></div>
                  <div class="pro-cont">
                    <p>Description</p>
                    @if($product->gross_weight != '')
                    <p><span>Gross Weight: {{$product->gross_weight}}</span></p>
                    @endif
                    @if($product->rubellite_weight != '')
                    <p><span>Rubellite Weight: {{$product->rubellite_weight}} </span></p>
                    @endif
                    @if($product->tanzanite_weight != '')
                    <p><span>Tanzanite Weight: {{$product->tanzanite_weight}} </span></p>
                    @endif
                    @if($product->spinal_weight != '')
                    <p><span>Spinal Weight: {{$product->spinal_weight}} </span></p>
                    @endif
                    @if($product->emerald_weight != '')
                    <p><span>Emerald Weight: {{$product->emerald_weight}} </span></p>
                    @endif
                    @if($product->blue_sapphire_weight != '')
                    <p><span>Blue Sapphire Weight: {{$product->blue_sapphire_weight}} </span></p>
                    @endif
                    @if($product->multi_supphire_weight != '')
                    <p><span>Multi Sapphire Weight: {{$product->multi_supphire_weight}} </span></p>
                    @endif
                    @if($product->rosecut_weight != '')
                    <p><span>Rosecut Weight: {{$product->rosecut_weight}} </span></p>
                    @endif
                    @if($product->diamond_polkies_weight != '')
                    <p><span>Diamond Polkies Weight: {{$product->diamond_polkies_weight}} </span></p>
                    @endif
                    @if($product->basra_pearls_weight != '')
                    <p><span>Basra Pearls Weight: {{$product->basra_pearls_weight}} </span></p>
                    @endif
                    <p class="mt-md-3">Estimate</p>
                    <p><span> ₹ {!! number_format($product->amount,2) !!}</span></p>

                    <div class="text-center"><br>
                      <button onclick="viewDetails('{{$product->slug}}')" class="btn">View Details</button>
                    </div>
                  </div>
                </div>
              </a>
              <a href="{{url('/product-details/')}}/{{$product->slug}}"><h6>{!! $product->title !!}</h6></a>
              <p><strong>₹ {!! number_format($product->amount,2) !!}</strong></p>
            </div>
            @endforeach
            <div class="col-md-12 text-center">
              <a href="{{url('/products')}}" class="text-orange">View All Products</a>
            </div>
          </div>
        </div>
      </div>

      @include('element.addtocart')
      
      @endif

      @if(isset($section3->id))
      <div class="auction-section product-section section-padding wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-md-8 mx-auto text-cener heading">
            <h2>{{$section3->heading}}</h2>
            <h6>{!! $section3->content !!}</h6>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9 mx-auto">
              <nav>
                <div class="nav nav-tabs mb-3 border-0 d-flex justify-content-center" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Live</button>
                  <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Upcoming</button>
                  <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Auction Results</button>
                </div>
              </nav>
            </div>
            <div class="col-md-12">
              <div class="tab-content " id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <div class="row">
                    @if(isset($live_products) && $live_products->count()>0)
                    @foreach($live_products as $key => $product)
                    <div class="col-md-4">
                     
                        <div class="pro-box">
                          <div class="img"><img src="{{ asset('public/admin/images/teams/')}}/{{$product->image}}" alt=""></div>
                          <div class="pro-cont">
                            <p class="mt-md-3">Description</p>
                            @if($product->gross_weight != '')
                            <p><span>Gross Weight: {{$product->gross_weight}} </span></p>
                            @endif
                            @if($product->rubellite_weight != '')
                            <p><span>Rubellite Weight: {{$product->rubellite_weight}} </span></p>
                            @endif
                            @if($product->tanzanite_weight != '')
                            <p><span>Tanzanite Weight: {{$product->tanzanite_weight}} </span></p>
                            @endif                            
                            @if($product->spinal_weight != '')
                            <p><span>Spinal Weight: {{$product->spinal_weight}} </span></p>
                            @endif
                            @if($product->emerald_weight != '')
                            <p><span>Emerald Weight: {{$product->emerald_weight}} </span></p>
                            @endif
                            @if($product->blue_sapphire_weight != '')
                            <p><span>Blue Sapphire Weight: {{$product->blue_sapphire_weight}} </span></p>
                            @endif
                            @if($product->multi_supphire_weight != '')
                            <p><span>Multi Sapphire Weight: {{$product->multi_supphire_weight}} </span></p>
                            @endif
                            @if($product->rosecut_weight != '')
                            <p><span>Rosecut Weight: {{$product->rosecut_weight}} </span></p>
                            @endif
                            @if($product->diamond_polkies_weight != '')
                            <p><span>Diamond Polkies Weight: {{$product->diamond_polkies_weight}} </span></p>
                            @endif
                            @if($product->basra_pearls_weight != '')
                            <p><span>Basra Pearls Weight: {{$product->basra_pearls_weight}} </span></p>
                            @endif
                            <p class="mt-md-3">Date</p>
                            <p><span> {!! date('d-m-Y h:i a',strtotime($product->start_date)) !!}</span></p>
                            <p><span> {!! date('d-m-Y h:i a',strtotime($product->end_date)) !!}</span></p>
                            <div class="text-center"><br>
                              @php $start_price = '₹ '.number_format($product->start_price,2) @endphp
                              @if(session()->has('login_user_email'))                              
                                @if($is_bidder_show == 'Yes')
                                  <button id="bid_product_{{$product->id}}" onclick="bidProduct('{{base64_encode($product->id)}}')" class="btn">Bid Now</button>
                                @endif
                              @else
                                <a class="btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Bid Now</a>
                              @endif
                            </div>
                          </div>
                        </div>
                      
                      <a href="javascript:void(0)"><h6>{!! $product->title !!}</h6></a>
                      <p><strong>₹ {{number_format($product->amount,2)}} - ₹ {{number_format($product->start_price,2)}}</strong></p>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12 text-center mt-md-5">
                      <a href="javascript:void(0)" class="text-orange">No Product Found.</a>
                    </div>
                    @endif
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  <div class="row">

                    @if(isset($upcoming_products) && $upcoming_products->count()>0)
                    @foreach($upcoming_products as $key => $product)
                    <div class="col-md-4">
                      <div class="pro-box">
                        <div class="img">
                        @if($product->image != '')
                          <img src="{{URL::asset('public/admin/images/teams')}}/{!! $product->image !!}" class="" alt="">
                        @endif
                        </div>
                        <div class="pro-cont">
                            <p class="mt-md-3">Description</p>
                            @if($product->gross_weight != '')
                            <p><span>Gross Weight: {{$product->gross_weight}} </span></p>
                            @endif
                            @if($product->rubellite_weight != '')
                            <p><span>Rubellite Weight: {{$product->rubellite_weight}} </span></p>
                            @endif
                            @if($product->tanzanite_weight != '')
                            <p><span>Tanzanite Weight: {{$product->tanzanite_weight}} </span></p>
                            @endif                            
                            @if($product->spinal_weight != '')
                            <p><span>Spinal Weight: {{$product->spinal_weight}} </span></p>
                            @endif
                            @if($product->emerald_weight != '')
                            <p><span>Emerald Weight: {{$product->emerald_weight}} </span></p>
                            @endif
                            @if($product->blue_sapphire_weight != '')
                            <p><span>Blue Sapphire Weight: {{$product->blue_sapphire_weight}} </span></p>
                            @endif
                            @if($product->multi_supphire_weight != '')
                            <p><span>Multi Sapphire Weight: {{$product->multi_supphire_weight}} </span></p>
                            @endif
                            @if($product->rosecut_weight != '')
                            <p><span>Rosecut Weight: {{$product->rosecut_weight}} </span></p>
                            @endif
                            @if($product->diamond_polkies_weight != '')
                            <p><span>Diamond Polkies Weight: {{$product->diamond_polkies_weight}} </span></p>
                            @endif
                            @if($product->basra_pearls_weight != '')
                            <p><span>Basra Pearls Weight: {{$product->basra_pearls_weight}} </span></p>
                            @endif
                            <p class="mt-md-3">Start Date</p>
                            <p><span> {!! date('d-m-Y h:i a',strtotime($product->start_date)) !!}</span></p>
                        </div>
                      </div>
                      <a href="javascript:void(0)"><h6>{{$product->title}}</h6></a>
                      <p><strong> ₹ {{number_format($product->amount,2)}} - ₹ {{number_format($product->start_price,2)}}</strong></p>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12 text-center mt-md-5">
                      <a href="javascript:void(0)" class="text-orange">No Product Found.</a>
                    </div>
                    @endif
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                       <div class="row"> 

                    @if(isset($auction_results) && $auction_results->count()>0)
                    @foreach($auction_results as $key => $product)
                    @php
                      $auction_result = Helper::getAuctionResult($product->product_id);
                    @endphp
                    <div class="col-md-4">
                      <div class="pro-box">
                        <div class="img">
                        @if($product->image != '')
                          <img src="{{URL::asset('public/admin/images/teams')}}/{!! $product->image !!}" class="" alt="">
                        @endif
                        </div>
                        <div class="pro-cont">
                            <p class="mt-md-3">Description</p>
                            @if($product->gross_weight != '')
                            <p><span>Gross Weight: {{$product->gross_weight}} </span></p>
                            @endif
                            @if($product->rubellite_weight != '')
                            <p><span>Rubellite Weight: {{$product->rubellite_weight}} </span></p>
                            @endif
                            @if($product->tanzanite_weight != '')
                            <p><span>Tanzanite Weight: {{$product->tanzanite_weight}} </span></p>
                            @endif                            
                            @if($product->spinal_weight != '')
                            <p><span>Spinal Weight: {{$product->spinal_weight}} </span></p>
                            @endif
                            @if($product->emerald_weight != '')
                            <p><span>Emerald Weight: {{$product->emerald_weight}} </span></p>
                            @endif
                            @if($product->blue_sapphire_weight != '')
                            <p><span>Blue Sapphire Weight: {{$product->blue_sapphire_weight}} </span></p>
                            @endif
                            @if($product->multi_supphire_weight != '')
                            <p><span>Multi Sapphire Weight: {{$product->multi_supphire_weight}} </span></p>
                            @endif
                            @if($product->rosecut_weight != '')
                            <p><span>Rosecut Weight: {{$product->rosecut_weight}} </span></p>
                            @endif
                            @if($product->diamond_polkies_weight != '')
                            <p><span>Diamond Polkies Weight: {{$product->diamond_polkies_weight}} </span></p>
                            @endif
                            @if($product->basra_pearls_weight != '')
                            <p><span>Basra Pearls Weight: {{$product->basra_pearls_weight}} </span></p>
                            @endif
                            <p class="mt-md-3">Minimum Maximum Bidding</p>
                            <p class="mt-md-3"><span> ₹ {{number_format($product->min,2)}} - ₹ {{number_format($product->max,2)}}</span></p>  
                            <p class="mt-md-3">Wining Price</p>
                            <p class="mt-md-3"><span>₹ {{number_format($product->max,2)}}</span></p>    
                        </div>                       
                      </div>  
                      <a href="javascript:void(0)"><h6>{{$product->title}}</h6></a>                                                            
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12 text-center mt-md-5">
                      <a href="" class="text-orange">No Product Found</a>
                    </div>
                    @endif                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif

      @if(isset($section4->id))
      <div class="test-section section-padding wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-md-8 mx-auto text-cener heading">
            <h2 class="text-white">{{$section4->heading}}</h2>
            <p class="text-white mt-3">{!! $section4->content !!}</p>
            </div>
          </div>
          
          @if(isset($testimonials) && $testimonials->count() > 0)
          <div class="test-carousel owl-carousel owl-theme">

            @foreach($testimonials as $key => $testimonial)
            <div class="item">
              <div class="testimonial-box">
                <h6>{{$testimonial->title}}</h6>
                <p>{{nl2br($testimonial->testimonial)}}</p>
                <div class="test-bt d-flex align-items-center justify-content-between">
                  <div class="test-profile d-flex align-items-center">
                    @if($testimonial->profile != '')
                    <img src="{{URL::asset('public/admin/images/testimonials')}}/{!! $testimonial->profile !!}" class="img-fluid" alt="">
                    @endif
                    <p>{{$testimonial->user}}</p>
                  </div>
                  <div class="star">
                  @for($x=1;$x<=$testimonial->rating;$x++)
                  <span class="fa fa-star checked" style="color: #f9b92d;"></span>
                  @endfor
                  <?php /* ?><img src="{{ asset('public/img/home/')}}/Star.svg" alt=""><?php */ ?>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
          <div class="row">
            <div class="col-md-12 text-center mt-md-5">
              <a href="" class="text-white">View All Testimonials</a>
            </div>
          </div>
        </div>
      </div>
      @endif


      @if(isset($section5->id))
      <div class="about-section section-padding wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto text-cener heading">
            <p class="text-uppercase">{{$section5->heading}}</p>
            <h2>{{ $section5->sub_heading }}</h2>
            <p>{!! $section5->content !!}</p>
            </div>
          </div>
          <div class="row align-items-center conts px-md-4">      
            @if($section5->banner != '' && $section5->banner_status == 1)
            <div class="col-md-4">
            <img src="{{URL::asset('public/admin/images/banners')}}/{!! $section5->banner !!}" class="img-fluid" alt="">
            </div>
            <div class="col-md-8">
              <p class="mt-md-0">{!! substr($section5->description,0,799) !!}</p>
              <a href="" class="text-orange">Read More</a>
            </div>
            @else
            <div class="col-md-12">
              <p class="mt-md-0">{!! substr($section5->description,0,799) !!}</p>
              <a href="" class="text-orange">Read More</a>
            </div>
            @endif      
        </div>

        </div>
      </div>
      @endif

      @if(isset($exclusive_products) && $exclusive_products->count()>0)
      <div class="auction-section exclusive section-padding wow fadeInUp">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-0 heading d-flex justify-content-between">
              @if(isset($section6->id))
              <h2>Our Exclusive Collections</h2>
              @endif
              <a href="{{url('/products')}}" class="text-orange">View All Products</a>
            </div>
          </div>
        </div>
        <div class="ex-carousel owl-carousel owl-theme">
          @foreach($exclusive_products as $key => $product)
          <div class="item">
            <div class="pro-box">
              <div class="img"><img src="{{ asset('public/admin/images/teams/')}}/{{$product->image}}" alt=""></div>
              <div class="pro-cont">
                <a href="javascript:void(0)" onclick="viewDetails('{{$product->slug}}')" class="btn bg-orange">View Details</a>
              </div>
            </div>
            <a href="{{url('/product-details/')}}/{{$product->slug}}"><h6>{!! $product->title !!}</h6></a>
            <p><strong>₹ {!! number_format($product->amount,2) !!}</strong></p>
          </div>
          @endforeach
          
        </div>
      </div>
      @endif
     
      @include('element.process_section')

<div class="modal" tabindex="-1" role="dialog" id="bid_now_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="bid_now_form" method="post"></form>
    </div>
  </div>
</div>

<script type="text/javascript">  
  function  viewDetails(slug){
    window.location.href = "{{url('/product-details/')}}"+'/'+slug;
  }
  $(document).on('click','#bidnow_btn',function(){
    var flag = 1;
    if($('#ubprice').val() == ''){
      $('#ubpriceError').html('Please enter bidding price');
      flag = 0;
      return false;
    }
    if($('#ucomment').val() == ''){
      //$('#ucommentError').html('Please enter comment');
      //flag = 0;
      //return false;
    }
    var price = $('#ubprice').val();
    var comment = $('#ucomment').val();
    var pid = $('#bpid').val();
    if(flag == 1){
      var url = "{{route('pages.add-new-bid')}}";
      $('#bidnow_btn').html('Processing...');
      $('#bidnow_btn').attr('disabled',true);
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},			
        url: url,
        data: {pid:pid,price:price,comment:comment},
        success:function(response){
          if(response == 'Success'){
            $('#bid_now_modal').modal("hide");
            swal("Success!", 'Bidding submitted successfully', "success");
          }else if(response == 'priceError'){
            $('#ubpriceError').html('Bidding price must be greater then bidding start price');
            $('#ubprice').val('');
          }else{
            $('#bid_now_modal').modal("hide");
            swal("Error!", 'Something went wrong', "error");
          }
          $('#bidnow_btn').html('Submit');
          $('#bidnow_btn').attr('disabled',false);
        }
      });
      return false;
    }
  });
  function bidProduct(pid){
    $('#bid_now_form').html('Processing...');
    $('#bid_now_modal').modal("show");
    if(pid  != ''){
      var url = "{{route('pages.get-bidding-product-details')}}";
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},			
        url: url,
        data: {pid:pid},
        success:function(response){
          $('#bid_now_form').html(response);          
        }
      });
      return false;      
    }
  }


</script>

@endsection