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

    <div class="my-cart-section py-4 py-lg-5 wow fadeInUp">
        <div class="container">           
            <div class="row wow fadeInUp">
                {!! $inner_page->description !!}
            </div>
        </div>
    </div>

    
    @include('element.process_section')
    

@endsection