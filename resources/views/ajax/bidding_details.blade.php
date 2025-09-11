<div class="modal-header">
  <h5 class="modal-title" id="bidprd_title">{{$category->title}}: {!! $product->title !!}</h5>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-12 col-md-6"><img style="border: 1px solid #D9D9D9;" src="{{ asset('public/admin/images/teams/')}}/{{$product->image}}" alt=""></div>
    <div class="col-12 col-md-6">
      <p><b>Gross Weight:</b> {{$product->gross_weight}}</p>
      <p><b>Rubellite Weight:</b> {{$product->rubellite_weight}}</p>
      <p><b>Tanzanite Weight:</b> {{$product->tanzanite_weight}}</p>
      <p class="mt-md-3"><b>Bidding Date</b></p>
      <p> <b>Start Date:</b> {!! date('d-m-Y h:i a',strtotime($product->start_date)) !!}</p>
      <p> <b>End Date:</b> {!! date('d-m-Y h:i a',strtotime($product->end_date)) !!}</p>
    </div>    
  </div>
  <hr>
  <div class="row">
    <div class="col-12">
      <input type="hidden" name="bpid" id="bpid" value="{{base64_encode($product->id)}}">
      <p>Bidding Start Price: <span id="sprice">₹ {{number_format($product->start_price,2)}}</span></p>
      <br>
      <label>Bidding Price</label>
      <input type="text" placeholder="Please Enter Bidding Price" maxlength="12" style="width:50%" onblur="checkBidPrice(this.value)" name="ubprice" id="ubprice" onKeyUp="$('#ubpriceError').html('')" class="form-control floatonly"/>
      <span class="field_error" id="ubpriceError"></span><br>
      <label>Comment</label>
      <textarea placeholder="Please Enter Comment" rows="4" name="ucomment" id="ucomment" onKeyUp="$('#ucommentError').html('')" class="form-control"></textarea>
      <span class="field_error" id="ucommentError"></span> 
    </div>
    <div class="modal-footer">
      <button type="button" id="bidnow_btn" class="btn btn-primary">Submit</button>
      <button type="button" class="btn btn-secondary" id="close_btn">Close</button>
    </div>
  </div>
</div>

<script>
  function checkBidPrice(price){
      let start_price = '{{$product->start_price}}';
      if(!$.isNumeric(price)){
        $('#ubprice').val('');
      }
  }
  $(document).ready(function(){    
    $('.floatonly').keypress(function(e){
      var charCode = (e.which) ? e.which : event.keyCode
      if (String.fromCharCode(charCode).match(/[^0-9.+]/g))
      return false;
    });
    $("#close_btn").click(function(){
        $('#bid_now_form').html('');
        $('#bid_now_modal').modal("hide");
    });
  });
</script>