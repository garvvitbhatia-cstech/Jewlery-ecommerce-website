@if($records->count()>0)

    @foreach($records as $key => $row)

    @php

    	$class = '';    	

    @endphp

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

                {!! $row->id !!}

            </div>

        </td>

        <td>

            <div class="{{$class}} align-items-center">

                <b>Name:</b> {!! $row->customer_name !!}<br>

                <b>Email:</b> {!! $row->customer_email !!}<br>

                <b> Mobile:</b> {!! $row->customer_mobile !!}<br>

            </div>

        </td>

        <td>

            <div class="{{$class}} align-items-center">

                <b>Invoice:</b> {!! $row->invoice_id !!}<br>

                <b>Transaction ID:</b> {!! $row->transaction_id !!}<br>

                <b>Date:</b> {!! date('d-m-Y',strtotime($row->order_date)) !!}<br>

                <b>Amount:</b> ₹ {!! number_format($row->total,2) !!}<br>

            </div>

        </td>

        <td>
            <div class="d-flex align-items-center">
            <select class="form-select" name="order_status" id="order_status" onchange="updateOrderStatus('{{$row->id}}',this.value)">

                <option {{$row->order_status == 'Pending'?'selected':''}}  value="Pending">Pending</option>

                <option {{$row->order_status == 'Processing'?'selected':''}} value="Processing">Processing</option>

                <option {{$row->order_status == 'Delivered'?'selected':''}} value="Delivered">Delivered</option>

                <option {{$row->order_status == 'Cancelled'?'selected':''}} value="Cancelled">Cancelled</option>

            </select>
            </div>

        </td>

        <td>
            <?php if($row->payment_status == '2'){ $css = 'not_confirm'; }else{ $css = 'received'; } ?>
            <div class="d-flex align-items-center">
                <select onchange="setPaymentStatus(this.value,'{{ $row->id }}')" id="pay_dropdown{{ $row->id }}" class="form-select {{ $css }}">
                    <option {{$row->payment_status == 2?'selected':''}} value="2">Not Confirm</option>
                    <option {{$row->payment_status == 1?'selected':''}} value="1">Received</option>
                </select>
            </div>
        </td>

        <td>

            <span class="{{$class}} align-items-center">{!! date('d M, Y h:i A',strtotime($row->created_at)) !!}</span>

        </td>

        <td>

            <a href="javascript:void(0)" onclick="trakno('{{$row->id}}','{{$row->shipping_company}}','{{$row->tracking_code}}','{{$row->tracking_url}}');" class="btn btn-sm btn-success" title="Tracking">
                <i class="bi bi-flag-fill"></i> Tracking
            </a>
            
            <a href="{{ url('/admin/view-order',base64_encode($row->id)) }}" class="btn btn-sm btn-primary" title="View">

                <i class="bi bi-eye"></i>

            </a>

            <!--<a href="javascript:void(0);" onclick="deleteData('report_enquiries','{{ $row->id }}');" class="btn btn-sm btn-danger"  title="Delete">

                <i class="bi bi-trash"></i>

            </a>-->

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