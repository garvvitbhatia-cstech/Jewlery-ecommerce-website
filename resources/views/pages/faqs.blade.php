@extends('layout.default')
@section('content')
@if(isset($inner_page->id))
@section('title',strip_tags($inner_page->seo_title))
@section('description',strip_tags($inner_page->seo_description))
@section('keywords',strip_tags($inner_page->seo_keyword))
@section('robots',strip_tags($inner_page->robot_tags))
@endif

@section('content')

<style>
  .single-faq {
    border: 1px solid #CCC;
    padding: 17px;
    margin-bottom: 15px;
}
.single-faq span {
    font-weight: bold;
}
.single-faq div {
    margin-top: 10px;
}
</style>

<div class="hero-section innerpage-section">
    <div class="container">
        <div class="text-center d-flex align-items-center justify-content-center flex-column">
            <h2>{{$inner_page->heading}}</h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$inner_page->heading}}</li>                
                </ol>
            </nav>
        </div>
    </div>
</div>



@if(isset($faqs) && $faqs->count()>0)
<section class="pro-carousel">
  <div class="container">
<div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-12">
            <div class="accordion myOrder-tab-cls replaceHtml" id="accordionExample">
      @foreach($faqs as $key => $faq)
      <div class="accordion-item">
            <div class="accordion-header" id="headingthree{{$key}}">
              <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapsethree{{$key}}" aria-expanded="true" aria-controls="collapsethree{{$key}}">
                <div class="kk-contant-boxb cart-box-cnt w-100 align-items-center  d-flex justify-content-between">
                  <div class="left-content-order">
                    <h4 class="d-block cat-head text-capitalize mb-2">Q{{$key+1}}: {{$faq->question}} </h4>
                  </div>
                </div>
              </div>
            </div>
            <div id="collapsethree{{$key}}" class="accordion-collapse collapse " aria-labelledby="headingthree{{$key}}" data-bs-parent="#accordionExample">
              <div class="d-flex flex-md-row">
                <p class="d-flex">
                {!!$faq->answer!!}
                </p>
              </div>

            </div>
        </div>
    @endforeach
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
    <div class="col-md-12 col-lg-12 text-center alert alert-danger">No Faq's Found!</div>
    </div>
</section>
@endif


@endsection