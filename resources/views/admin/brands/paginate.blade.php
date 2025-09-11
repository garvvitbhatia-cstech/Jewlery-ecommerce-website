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
            <div class="d-flex align-items-center">
                @if($row->image != '')
                <img src="{{URL::asset('public/admin/images/testimonials/')}}/{!! $row->image !!}" style="max-width: 80px;height: auto;"> 
                @endif
            </div>
        </td> 
        <td>
            @if($row->status == 1)
            <a href="javascript:void(0);" onclick="changeStatus('brands','{!!$row->id!!}','{!!$row->status!!}');" class="badge bg-success ">Active</a>
            @else
            <a href="javascript:void(0);"  onclick="changeStatus('brands','{!!$row->id!!}','{!!$row->status!!}');" class="badge bg-danger">In-Active</a>
            @endif
        </td>
        <td>
            <span class="text-muted fw-bold text-muted d-block fs-7">{!! date('d M, Y h:i A',strtotime($row->created_at)) !!}</span>
        </td>
        <td>
            <a href="{{ url('/admin/edit-brand',base64_encode($row->id)) }}" class="btn btn-sm btn-primary" title="Edit">
                <i class="bi bi-pencil"></i>
            </a>
            <a href="javascript:void(0);" onclick="deleteData('brands','{{ $row->id }}');" class="btn btn-sm btn-danger"  title="Delete">
                <i class="bi bi-trash"></i>
            </a>
        </td>
    </tr>
    @endforeach
    @else
    <tr>
        <td align="center" colspan="9">Record not found</td>
    </tr>
    @endif
    <tr>
        <td align="center" colspan="10">
            <div id="pagination">{{ $records->appends(request()->except('page'))->links('vendor.pagination.custom') }}</div>
        </td>
    </tr>


