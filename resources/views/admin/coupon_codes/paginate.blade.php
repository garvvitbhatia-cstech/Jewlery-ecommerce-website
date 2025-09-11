@if($records->count()>0)
@foreach($records as $key => $row)   
@php
    $count = $records->count();
    $last = $records->lastItem();
    $page = $records->currentPage();
    $sr = $key+1;
    if($page > 1){
        $sr = ($last-$count)+$key+1;
    }
@endphp
 <tr>
    <td>
        <div class="d-flex align-items-center">
            {!! $sr !!}
        </div>
    </td>
   <td>
      <div class="d-flex align-items-center">
         {!! $row->title !!}
      </div>
   </td>
   <td>
      @if($row->discount_type == 'Amount')
      <div class="d-flex align-items-center">₹ {!! $row->amount !!}</div>
      @else
      <div class="d-flex align-items-center">{!! $row->amount !!}%</div>
      @endif
   </td>
   <td>
      <div class="d-flex align-items-center">
         {!! date('d-m-Y',strtotime($row->start_date)) !!}
      </div>
   </td>
   <td>
      <div class="d-flex align-items-center">
         {!! date('d-m-Y',strtotime($row->end_date)) !!}
      </div>
   </td>
   <td>
      @if($row->status == 1)
      <a href="javascript:void(0);" onclick="changeStatus('coupon_codes','{!!$row->id!!}','{!!$row->status!!}');" class="badge bg-success ">Active</a>
      @else
      <a href="javascript:void(0);" onclick="changeStatus('coupon_codes','{!!$row->id!!}','{!!$row->status!!}');" class="badge bg-danger">In-Active</a>
      @endif
   </td>
   <td>
      <span class="text-muted fw-bold text-muted d-block fs-7">{!! date('d M, Y h:i A',strtotime($row->created_at)) !!}</span>
   </td>
   <td>
      <a href="{{ url('/admin/edit-coupon-code',base64_encode($row->id)) }}" class="btn btn-sm btn-primary" title="Edit">
      <i class="bi bi-pencil"></i>
      </a>
      <a href="javascript:void(0);" onclick="deleteData('coupon_codes','{{ $row->id }}');" class="btn btn-sm btn-danger"  title="Delete">
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