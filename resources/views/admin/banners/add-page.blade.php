@extends('layout.admin.dashboard')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Add Banner</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('/admin/banners')}}">Banners</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Banner</li>
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
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" value="" name="title" id="title">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="basicInput">Content (250 character)</label>
                        <textarea class="form-control" placeholder="Enter Content" rows="3" maxlength="250" name="content" id="content"></textarea>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="basicInput">Button One Title</label>
                        <input type="text" class="form-control" placeholder="Enter Button One Title" value="" name="btn1_title" id="btn1_title">
                      </div>
                    </div>  
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="basicInput">Button One URL</label>
                        <input type="text" class="form-control" placeholder="Enter Button One URL" value="" name="btn1_url" id="btn1_url">
                      </div>
                    </div> 
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Button One Status</label>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="is_show_btn1" name="is_show_btn1" value="1">
                          <label class="form-check-label" for="is_show_btn1">Active</label>
                        </div>
                      </div>
                    </div> 
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="basicInput">Button Two Title</label>
                        <input type="text" class="form-control" placeholder="Enter Button Two Title" value="" name="btn2_title" id="btn2_title">
                      </div>
                    </div>  
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="basicInput">Button Two URL</label>
                        <input type="text" class="form-control" placeholder="Enter Button Two URL" value="" name="btn2_url" id="btn2_url">
                      </div>
                    </div> 
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Button Two Status</label>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="is_show_btn2" name="is_show_btn2" value="1">
                          <label class="form-check-label" for="is_show_btn2">Active</label>
                        </div>
                      </div>
                    </div> 
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="basicInput">Image (738x738)</label>
                        <input type="file" class="form-control" name="image" id="image" accept="image/*">
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
    let saveDataURL = "{{url('/admin/add-banner')}}";
    let returnURL = "{{url('/admin/banners')}}";
</script> 
<script src="{{ asset('public/admin/js/pages/banners/add-page.js') }}"></script> 

@endsection 