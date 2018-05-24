@extends('admin_layout.master')

@section('content')
<div class="row">
<div class="col-md-12">
		<div class="panel panel-info">
		<div class="panel-heading">Meal Between {{ date('d F Y', strtotime($start_date)) }} to {{ date('d F Y', strtotime($end_date)) }}</div>
		<div class="panel-body">
           
           <div class="table-responsive">
           	 
           	 <table class="table table-bordered table-striped">
           	   <tr>
           	    <th>Member</th>
           	 	<th>date</th>
           	 	<th>Meal Amount</th>
           	 	<th>Delete</th>
           	   </tr>
               
               @php

                   $total_meal = 0;
                @endphp
               @foreach($meal as $value)
                <tr>
                    @php
                      $total_meal +=$value->meal_amount;    
                    @endphp

                	<td>{{ $value->member->name }}</td>
                	<td>{{ date('d F Y', strtotime($value->date)) }}</td>
                	<td>{{ $value->meal_amount }}</td>
                	<td><a onclick="return confirm('Are You Sure');" href="{{ route('meal.delete',$value->id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
               @endforeach

               <tr>
               	  <th colspan="3" style="text-align:right;">Total Meal:{{ $total_meal }}</th>
               </tr>
        
           	 </table>
         


           </div>

		</div>
	</div>

</div>
</div>
@endsection