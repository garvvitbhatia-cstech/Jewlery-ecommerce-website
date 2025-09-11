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

@php

	$getegory_details = Helper::getCategory($row->category_id);

    $parent = NULL;

    if($getegory_details->parent_id > 0){

    	$parent = Helper::getCategory($getegory_details->parent_id,'title');

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

      <div class="d-flex align-items-center">

         	@if(!empty($parent))

        		{!! $parent !!} →

        	@endif

         	{{ Helper::getCategory($row->category_id,'title') }}

      </div>

   </td>

   <td>

      <div class="d-flex align-items-center">

      		Actual Amount: ₹ {!! $row->amount !!}<br />

			Start Amount: ₹ {!! $row->start_price !!}         

      </div>

   </td>

   <td>

      <div class="d-flex align-items-center">

      		Start Date: {!! $row->start_date !!}<br />

			   End Date: {!! $row->end_date !!}         

      </div>

   </td>

   <td>

      @if(!empty($row->image))

      <div class="d-flex align-items-center">

         <div class="cropped" id="cropped">

         	<img src="{{URL::asset('public/admin/images/teams/')}}/{!! $row->image !!}" width="100">

         </div>

      </div>

      @endif

   </td>

   <td>

      @if($row->status == 1)

      <a href="javascript:void(0);" onclick="changeStatus('bidding_products','{!!$row->id!!}','{!!$row->status!!}');" class="badge bg-success ">Active</a>

      @else

      <a href="javascript:void(0);" onclick="changeStatus('bidding_products','{!!$row->id!!}','{!!$row->status!!}');" class="badge bg-danger">In-Active</a>

      @endif

   </td>

   <td>

      <span class="text-muted fw-bold text-muted d-block fs-7">{!! date('d M, Y h:i A',strtotime($row->created_at)) !!}</span>

   </td>

   <td>

      <a href="{{ url('/admin/edit-bidding-product',base64_encode($row->id)) }}" class="btn btn-sm btn-primary" title="Edit">

      	<i class="bi bi-pencil"></i>

      </a>

      <a href="javascript:void(0);" onclick="deleteData('bidding_products','{{ $row->id }}');" class="btn btn-sm btn-danger" title="Delete">

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