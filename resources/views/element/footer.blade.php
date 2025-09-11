@php
  $setting = Helper::settings();
@endphp
<footer class="footer  wow fadeInUp">
      <div class="container">
        <div class="newsletter">
          <h3 class="text-white">Sign up our newsletter</h3>
          <div class="form w-100">
            <div class="col-md-9 col-lg-7 d-flex mx-auto align-items-center">
              <input type="text" class="subs-box" id="newsletter_subscribe" placeholder="Enter your email id">              
              <button id="newsletter_subscribe_btn" class="btn bg-dark text-white">Signup</button>              
            </div>
          </div>
        </div>
        
        <div class="row wow fadeInUp">
          <div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">Online Store Support</h4>
              <ul class="list-unstyled">
                <li><a href="{{url('/contact-us')}}"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> Contact Us</a></li>
                <li><a href="{{url('/faqs')}}"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> FAQs</a></li>
                @if(!session()->has('login_user_email'))
                  <li><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt="">Order Tracking</a></li>
                  <li><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> My Account</a></li>
                @else
                  <li><a href="{{url('/my-orders')}}"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> Order Tracking</a></li>
                  <li><a href="{{url('/my-account')}}"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> My Account</a></li>
                @endif
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">Policies</h4>
              <ul class="list-unstyled">
                <li><a href="{{url('/privacy-policy')}}"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> Privacy Policy</a></li>
                <li><a href="{{url('/shipping-and-return')}}"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> Shipping & Returns</a></li>
                <li><a href="{{url('/terms-and-conditions')}}"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> Terms & Conditions</a></li>
              </ul>
            </div>
          </div>
          <!---<div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">More Ways to Shop</h4>
              <ul class="list-unstyled">
                <li><a href=""><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> Catalog</a></li>
                <li><a href=""><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> Best Sellers</a></li>
                <li><a href=""><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> New Arrivals</a></li>
                <li><a href=""><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> Exhibitions</a></li>
              </ul>
            </div>
          </div>--->
          <div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">About Us</h4>
              <ul class="list-unstyled">
                <li><a href="{{url('/about-us')}}"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> About Us</a></li>
                <li><a href="{{url('/store-events')}}"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> Store Events</a></li>
                <li><a href="{{url('/met-wholesale')}}"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> Met Wholesale</a></li>
                @if(!session()->has('login_user_email'))
                  <li><a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt="">Order Tracking</a></li>
                @else
                  <li><a href="{{url('/my-orders')}}"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> Order Tracking</a></li>
                @endif
                <li><a href="{{url('/licensees')}}"><img src="{{ asset('public/img/home/')}}/Arrow.svg" alt=""> Licensees</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="about-compnay-foot wow fadeInUp pb-5">
              <h4 class="wow fadeInUp">Visit The SGJ</h4>
              <ul class="list-unstyled">
                <li><a href=""><img src="{{ asset('public/img/home/')}}/Contact.svg" alt=""> {{$setting->mobile}}</a></li>
                <li><a href=""><img src="{{ asset('public/img/home/')}}/Email.svg" alt="">  {{$setting->admin_email}}</a></li>
                <li><a href=""><img src="{{ asset('public/img/home/')}}/Location.svg" alt=""> {!!nl2br($setting->business_address)!!}</a></li>
              </ul>
            </div>
          </div>
          
        </div>
        <hr class="w-100">
        <div class="footer-bottom">
          <p class="copyright-text text-white">{{$setting->footer_content}}</p>
            <ul class="social list-unstyled d-flex flex-row">
              <li><a href=""><img src="{{ asset('public/img/home/')}}/Instagram.svg" alt=""></a></li>
              <li><a href=""><img src="{{ asset('public/img/home/')}}/Facebook.svg" alt=""></a></li>
              <li><a href=""><img src="{{ asset('public/img/home/')}}/twitter x.svg" alt=""></a></li>
              <li><a href=""><img src="{{ asset('public/img/home/')}}/twitter-x.svg" alt=""></a></li>
            </ul>
        </div>
      </div>        
    </div>
  </footer>
  


  <!--Search box model start-->
<div class="modal fade search-box-model" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
<div class="modal-dialog modal-xl">
  <div class="modal-content">
      <a href="" type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></a>
    <div class="modal-body">
      <form action="#" class="search-box-form">
          <div class="search-form-main">
            <input type="search" placeholder="Search Product" class="search-box-field">
            <button type="submit" class="search-btn"><img src="{{ asset('public/img/home/')}}/search.svg"/></button>
          </div>
      </form>
    </div>    
  </div>
</div>
</div>
<!--Search box model end -->


@include('element.registration')