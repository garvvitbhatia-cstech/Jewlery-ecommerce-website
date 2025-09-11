@if($records->count()>0)
@foreach($records as $key => $row)   
<tr>
   @php
      $count = $records->count();
      $last = $records->lastItem();
      $page = $records->currentPage();
      $sr = $key+1;
      if($page > 1){
            $sr = ($last-$count)+$key+1;
      }
   @endphp
   <td>
      <div class="d-flex align-items-center">
            {!! $sr !!}
      </div>
   </td>
   <td width="30%">
      <div class="d-flex align-items-center">
         {!! $row->question !!}
      </div>
   </td>
   <td>
      <div class="d-flex align-items-center">
         {!! substr($row->answer,0,30) !!}...
      </div>
   </td>
   <td>
      <div class="d-flex align-items-center">
		<input type="text" maxlength="3" style="width:100px;text-align:center;" class="form-control ordering" onchange="saveOrder({{$row->id}},{{$row->ordering}},'faqs',this.value);" id="ordering" value="{{$row->ordering}}"/>
      </div>
   </td>
   <td>
      @if($row->status == 1)
      	<a href="javascript:void(0);" onclick="changeStatus('faqs','{!!$row->id!!}','{!!$row->status!!}');" class="badge bg-success ">Active</a>
      @else
      	<a href="javascript:void(0);" onclick="changeStatus('faqs','{!!$row->id!!}','{!!$row->status!!}');" class="badge bg-danger">In-Active</a>
      @endif
   </td>
   <td>
      <span class="text-muted fw-bold text-muted d-block fs-7">{!! date('d M, Y h:i A',strtotime($row->created_at)) !!}</span>
   </td>
   <td>
      <a href="{{ url('/admin/edit-faq',base64_encode($row->id)) }}" class="btn btn-sm btn-primary" title="Edit">
      <i class="bi bi-pencil"></i>
      </a>
      <a href="javascript:void(0);" onclick="deleteData('faqs','{{ $row->id }}');" class="btn btn-sm btn-danger" title="Delete">
      <i class="bi bi-trash"></i>
      </a>
   </td>
</tr>
@endforeach
@else
<tr>
   <td align="center" colspan="15">Record not found</td>
</tr>
@endif
<tr>
   <td align="center" colspan="15">
      <div id="pagination">{{ $records->appends(request()->except('page'))->links('vendor.pagination.custom') }}</div>
   </td>
</tr>

<script>
	$('.numberonly').keypress(function(e){   
		var charCode = (e.which) ? e.which : event.keyCode   
		if(String.fromCharCode(charCode).match(/[^0-9+]/g))   
		return false;   
   });
</script>