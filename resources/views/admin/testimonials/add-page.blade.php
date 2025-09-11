@extends('layout.admin.dashboard')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Add New Testimonial</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/admin/testimonials')}}">Testimonials</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Testimonial</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <section class="section">
    <form class="form w-100" id="pageForm" action="#">
      <div class="row">
        <div class="col-9 col-md-9">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation"> <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                                    role="tab" aria-controls="home" aria-selected="true">General Info</a> </li>
              </ul>
              <hr />
              <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">        
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="basicInput">Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" value="" name="title" id="title">
                      </div>
                    </div> 
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">User Name</label>
                        <input type="text" class="form-control" placeholder="Enter User Name" value="" name="user_name" id="user_name">
                      </div>
                    </div> 
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="basicInput">Rating</label>
                        <select name="rating" id="rating" class="form-select">
                          <option value="1">1 Star</option>
                          <option value="2">2 Star</option>
                          <option value="3">3 Star</option>
                          <option value="4">4 Star</option>
                          <option value="5">5 Star</option>
                        </select>
                      </div>
                    </div>  
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">User Icon Image</label>
                        <input type="file" class="form-control" placeholder="Enter Title" value="" name="profile" id="profile">
                      </div>
                    </div>                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Testimonial</label>
                        <textarea class="form-control" name="testimonial" rows="6" placeholder="Testimonial" id="testimonial"></textarea>
                      </div>
                    </div>
                  </div>
                </div>                
              </div>
            </div>
          </div>
        </div>
        <div class="col-3 col-md-3 ">
          <div class="card">
            <div class="col-md-12">
              <div class="text-left  p-3 p-l-20"> 
                <!--begin::Submit button-->
                <button type="button" id="form_submit" class="btn btn-sm btn-primary fw-bolder me-3 my-2"> <span class="indicator-label" id="formSubmit">Submit</span> <span class="indicator-progress d-none">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span> </button>
                <!--end::Submit button--> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</div>
<!-- end plugin js --> 
<script>
    $(document).ready(function () {
		$('.numberonly').keypress(function(e){
			var charCode = (e.which) ? e.which : event.keyCode
			if(String.fromCharCode(charCode).match(/[^0-9+]/g))
				return false;
		});
    });
    let saveDataURL = "{{url('/admin/add-testimonial')}}";
    let returnURL = "{{url('/admin/testimonials')}}";
</script> 
<script src="{{ asset('public/admin/js/pages/testimonials/add-page.js') }}"></script> 
@endsection