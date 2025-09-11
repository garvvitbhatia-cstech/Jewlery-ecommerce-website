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
            <h2>Our Bidding Products</h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Bidding Products</li>                
                </ol>
            </nav>
        </div>
    </div>
</div>


<section class="pro-carousel">
  <div class="container">
    <div class="container-fluid mob-list-view">
        <h3 class="text-center">{{$title}}</h3>
        <hr>
    </div>
  </div>
</section>

<section class="prodct-pt mb-5 wow fadeInUp">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-lg-2">
        <div class="accordion" id="accordionExample">
          @if(isset($categories) && $categories->count()>0)
          <div class="card pt-0">
            <div class="card-head" id="headingOne">
              <h4 class="mb-0" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Collection
              </h4>
            </div>

            
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body py-0">
                <ul>
                  @foreach($categories as $key => $category)
                  <li class="{{$key == 0?'active':''}}">
                  <div class="form-check">
                    <input class="form-check-input category_ids" {{$cat_slug == $category->id?'checked':''}} type="checkbox" onclick="checkCategory(this.value)" name="category_ids" value="{{$category->id}}" id="cat_{{$category->id}}">
                    <label class="form-check-label" for="cat_{{$category->id}}">
                      {{$category->title}}
                    </label>
                  </div>
                  </li>
                  @endforeach
                  <li><a href="#"><strong class="text-dark">+ View More</strong></a></li>
                </ul>
              </div>
            </div>
            
          </div>
          @endif

      </div>
    </div>
    
          <div class="col-md-9 col-lg-10 product-section">
          <div class="row right" id="replaceHtml"> 
          </div>  
        </div>


</div>
</div>
</section>


<div class="modal" tabindex="-1" role="dialog" id="bid_now_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="bid_now_form" method="post"></form>
    </div>
  </div>
</div>


<input type="hidden" id="category_id"/>
<input type="hidden" id="type" value="{{$slug}}"/>
<input type="hidden" id="category_slug" />

<script type="text/javascript"> 

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


  function checkCategory(){
    $('#category_slug').val('');
    let cat_id_value = [];
    $("input:checkbox[name=category_ids]:checked").each(function(){
      cat_id_value.push($(this).val());
    });
    $('#category_id').val(cat_id_value);
    filterData();
  }

  $('#replaceHtml').on('click', '.pagination a', function(){
		var url = $(this).attr('href');
		$('#replaceHtml').load(url);
		return false;
	});
  $(document).ready(function(){
    filterData();
  });
  function filterData(type = null){
      var category_id = $('#category_id').val();
      var slug = $('#type').val();
      
      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        data: {category_id:category_id,slug:slug},
        url: "{{ url('/bidding_products_filter') }}",
        success: function(response){
          $('#replaceHtml').html(response);
        }
      });
  }
</script>

@include('element.process_section')


@endsection