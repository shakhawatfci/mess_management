@extends('admin_layout.master')

@section('content')
<div class="row">
<div class="col-md-12">
		<div class="panel panel-info">
		<div class="panel-heading">Bazar Between {{ date('d F Y', strtotime($start_date)) }} to {{ date('d F Y', strtotime($end_date)) }}</div>
		<div class="panel-body">
           
           <div class="table-responsive">
           	 
           	 <table class="table table-bordered table-striped">
           	   <tr>
           	    
           	 	<th>date</th>
           	 	<th>Who Done</th>
           	 	<th>Amount</th>
           	 	<th>Delete</th>
           	   </tr>
               
               @php

                   $total_asset = 0;
                @endphp
               @foreach($bazar as $value)
                <tr>
                    @php
                      $total_asset +=$value->bazar_amount;    
                    @endphp

                	
                	<td>{{ date('d F Y', strtotime($value->date)) }}</td>
                	<td>{{ $value->member_name }}</td>
                	<td>{{ $value->bazar_amount }}</td>
                  
                	<td><a onclick="return confirm('Are You Sure');" href="{{ route('bazar.delete',$value->id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
               @endforeach

               <tr>
               	  <th colspan="3" style="text-align:right;">Total Bazar:{{ $total_asset }}</th>
               </tr>
        
           	 </table>
         


           </div>

		</div>
	</div>

</div>
</div>
@endsection