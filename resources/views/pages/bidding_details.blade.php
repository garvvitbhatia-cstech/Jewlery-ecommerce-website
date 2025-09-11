<div class="modal-header">
  <h5 class="modal-title" id="bidprd_title">Earings: {!! $product->title !!}</h5>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-12 col-md-6"><img src="https://sgj.365wah.com/public/admin/images/teams/8546a39931e20489a70aa400f2163ecfd56952c6.png" alt=""></div>
    <div class="col-12 col-md-6">
      <p><b>Gross Weight:</b> 15gm</p>
      <p><b>Rubellite Weight:</b> 0.58gm</p>
      <p><b>Tanzanite Weight:</b> 10 gm</p>
      <p class="mt-md-3"><b>Bidding Date</b></p>
      <p> <b>Start Date:</b> {!! date('d-m-Y h:i a',strtotime($product->start_date)) !!}</p>
      <p> <b>End Date:</b> {!! date('d-m-Y h:i a',strtotime($product->end_date)) !!}</p>
    </div>
    <hr>
  </div>
  <div class="row">
    <div class="col-12">
      <input type="hidden" name="bpid" id="bpid">
      <p>Bidding Start Price: <span id="sprice"></span></p>
      <br>
      <label>Bidding Price</label>
      <input type="text" placeholder="Please Enter Bidding Price" style="width:50%" name="ubprice" id="ubprice" onKeyUp="$('#ubpriceError').html('')" class="form-control numberonly"/>
      <span class="field_error" id="ubpriceError"></span><br>
      <label>Comment</label>
      <textarea placeholder="Please Enter Comment" rows="4" name="ucomment" id="ucomment" onKeyUp="$('#ucommentError').html('')" class="form-control"></textarea>
      <span class="field_error" id="ucommentError"></span> </div>
    <div class="modal-footer">
      <button type="button" id="bidnow_btn" class="btn btn-primary">Submit</button>
      <button type="button" class="btn btn-secondary" id="close_btn">Close</button>
    </div>
  </div>
</div>
