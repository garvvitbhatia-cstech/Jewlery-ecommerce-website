@if(isset($section7->id) || isset($section8->id) || isset($section9->id))
      <div class="del-section section-padding wow fadeInUp">
        <div class="container">
          <div class="row">
            @if(isset($section7->id))
            <div class="col-md-4">
              <div class="del-box text-center">
                @if($section7->banner != '' && $section7->banner_status == 1)
                <img src="{{URL::asset('public/admin/images/banners')}}/{!! $section7->banner !!}" class="img-fluid" alt="">
                @endif
                <h6>{{$section7->heading}}</h6>
                <p><span>{!! $section7->content !!}</span></p>
              </div>
            </div>
            @endif

            @if(isset($section8->id))
            <div class="col-md-4">
              <div class="del-box text-center">
              @if($section8->banner != '' && $section8->banner_status == 1)
                <img src="{{URL::asset('public/admin/images/banners')}}/{!! $section8->banner !!}" class="img-fluid" alt="">
                @endif
                <h6>{{$section8->heading}}</h6>
                <p><span>{!! $section8->content !!}</span></p>
              </div>
            </div>
            @endif

            @if(isset($section9->id))
            <div class="col-md-4">
              <div class="del-box text-center">
                @if($section9->banner != '' && $section9->banner_status == 1)
                <img src="{{URL::asset('public/admin/images/banners')}}/{!! $section9->banner !!}" class="img-fluid" alt="">
                @endif
                <h6>{{$section9->heading}}</h6>
                <p><span>{!! $section9->content !!}</span></p>
              </div>
            </div>
            @endif

          </div>
        </div>
      </div>
      @endif