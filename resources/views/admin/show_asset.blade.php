@extends('admin_layout.master')

@section('content')
<div class="row">
<div class="col-md-12">
		<div class="panel panel-info">
		<div class="panel-heading">Asset Between {{ date('d F Y', strtotime($start_date)) }} to {{ date('d F Y', strtotime($end_date)) }}</div>
		<div class="panel-body">
           
           <div class="table-responsive">
           	 
           	 <table class="table table-bordered table-striped">
           	   <tr>
           	    <th>Member</th>
           	 	<th>date</th>
              <th>Amount</th>
           	 	<th>Status</th>

           	 	<th>Delete</th>
           	   </tr>
               
               @php

                   $total_asset = 0;
                @endphp
               @foreach($asset as $value)
                <tr>
                    @php
                      $total_asset +=$value->asset_amount;    
                    @endphp

                	<td>{{ App\Member::where('id','=',$value->member_id)->first()->name }}</td>
                	<td>{{ date('d F Y', strtotime($value->asset_date)) }}</td>
                	<td>{{ $value->asset_amount }}</td>
                  <td>@if($value->status==0) previous month @endif</td>
                	<td><a onclick="return confirm('Are You Sure');" href="{{ route('asset.delete',$value->id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
               @endforeach

               <tr>
               	  <th colspan="3" style="text-align:right;">Total Asset:{{ $total_asset }}</th>
               </tr>
        
           	 </table>
         


           </div>

		</div>
	</div>

</div>
</div>
@endsection