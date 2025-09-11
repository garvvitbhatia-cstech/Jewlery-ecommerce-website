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
            <h2>My Cart Items</h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Cart</li>                
                </ol>
            </nav>
        </div>
    </div>
</div>

    <div class="my-cart-section py-4 py-lg-5 wow fadeInUp">
        <div class="container">                
                @if(isset($items) && $items->count()>0)
                <div class="row wow fadeInUp">
                    <div class="col-lg-8 mb-4">
                        @php
                            $sum = 0;
                        @endphp
                        @foreach($items as $key => $item)
                        @php 
                            $product_details = Helper::getProductInfo($item->product_id);
                            $sum = $sum+$product_details->amount;
                        @endphp
                        <div class="cart-list-main wow fadeInUp">
                            <div class="prodeuct-info d-flex">
                            <a href="{{url('product-details',$item->slug)}}" class="cart-thumb-img me-3">
                                @if($item->image != '')
                                <img src="{{ asset('public/admin/images/teams/')}}/{{$item->image}}" alt="">
                                @endif
                            </a>
                            <div class="cart-item-details">
                                <div class="cart-product-name fw-bold"><a href="#">{{$product_details->title}}</a></div>
                                <div class="d-flex align-items-center">
                                    <div class="price ms-3"><big>₹{{$product_details->amount}} per item</big></div>
                                    </div>
                                </div>
                            </div>
                            <div class="remove-cart">
                                <i onclick="removeCart('{{$item->id}}');" class="fa fa-remove"></i>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-lg-4">

                        <div class="cart-total-box">
                            <div class="total-price">
                                <p>Total:</p>
                                <p class="fw-bold">₹{{number_format($sum,2)}}</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center justify-content-between py-4">
                            @if(!session()->has('login_user_email'))
                            <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary w-100">Continue Checkout</a>
                            @else
                            <a href="{{url('/checkout')}}" class="btn btn-primary w-100">Continue Checkout</a>
                            @endif
                            
                        </div>


                    </div>
                </div>
                @else
                <div class="col-md-12 col-lg-12 text-center alert alert-danger">Cart is empty!</div>
                @endif
        </div>
    </div>



    @include('element.process_section')


<script>
function removeCart(rowID){
	
	if(rowID != ""){
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: "{{ route('removeCart') }}",
                data: {rowID:rowID},
                success: function(msg){		
				Toastify({
						text: msg.message,
						duration: 3000,
						close: true,
						style: {background: "#093"}
						}).showToast();
					setTimeout( window.location.reload(), 4000);
				}
            });
        }
        });
	}else{
		return false;
	}

}
</script>

@endsection