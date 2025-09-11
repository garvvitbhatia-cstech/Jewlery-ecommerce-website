@if($records->count()>0)
   @foreach($records as $key => $row)
   @php
   	$class = 'd-flex';
    $count = $records->count();
    $last = 	$records->lastItem();
    $page = $records->currentPage();
    $sr = $key+1;
    if($page > 1){
        $sr = ($last-$count)+$key+1;
    }
   @endphp
   <tr>
       <td>
           <div class="{{$class}} align-items-center">
               {!! $sr !!}
           </div>
       </td>
       <td>
           <div class="{{$class}} align-items-center">
               {!! Helper::getUserName($row->user_id) !!}
           </div>
       </td>
       <td>
           <div class="{{$class}} align-items-center">
               {!! Helper::getBiddingProduct($row->product_id,'title') !!}
           </div>
       </td>
       <td>
           <div class="{{$class}} align-items-center">
           ₹ {!! number_format($row->start_price,2) !!}
           </div>
       </td>
       <td>
           <div class="{{$class}} align-items-center">
           ₹ {!! number_format($row->bidding_price,2) !!}
           </div>
       </td>
       <td>
           <span class="{{$class}} align-items-center">{!! date('d M, Y h:i A',strtotime($row->created_at)) !!}</span>
       </td>
       <td>
           <a href="{{ url('/admin/view-user-bidding',base64_encode($row->id)) }}" class="btn btn-sm btn-primary" title="View">
               <i class="bi bi-eye"></i>
           </a>
           <a href="javascript:void(0);" onclick="deleteData('user_biddings','{{ $row->id }}');" class="btn btn-sm btn-danger" title="Delete">
               <i class="bi bi-trash"></i>
           </a>
       </td>
   </tr>
   @endforeach
   
   @else
   <tr>
       <td align="center" colspan="10">Record not found</td>
   </tr>
   @endif
   <tr>
       <td align="center" colspan="10">
           <div id="pagination">{{ $records->appends(request()->except('page'))->links('vendor.pagination.custom') }}</div>
       </td>
   </tr>