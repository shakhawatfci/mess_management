@extends('admin_layout.master')

@section('content')
<div class="row">
<div class="col-md-12">

	<div class="panel panel-info">
		<div class="panel-heading">Meal Chart {{ date('d F Y', strtotime($start_date)) }} to {{ date('d F Y', strtotime($end_date)) }}</div>
		<div class="panel-body">
	 

	     <div class="table-responsive">
	     	<table class="table table-striped table-bordered">
	     		<tr>
	     			<th>Member</th>
	     			<th>Asset</th>
	     			<th>Meal</th>
	     			<th>Meal Rate</th>
	     			<th>Cost</th>
	     			<th>Stock</th>
	     		</tr>
                 @php 
                    
                    $total_asset = 0;
                    $total_stock = 0;
                    $total_meal = 0;
                    $total_cost = 0;

                 @endphp
                @foreach($asset as $value)
                 
                 @php 
                $user_meal = App\Meal::where('member_id','=',$value->member_id)->whereBetween('date',[$start_date,$end_date])->sum('meal_amount'); 
                  
                  $cost = $user_meal*$meal_rate;

                  $due = $value->member_amount-$cost;
                   
                  $total_meal += $user_meal;

                  $total_cost += $cost;


                  $total_stock += $due;

                  $total_asset += $value->member_amount;



                @endphp
	     		<tr style="@if($due<-0.5) color: red; @endif">
	     			<td>{{ App\Member::where('id','=',$value->member_id)->first()->name }}</td>
	     			<td>{{ round($value->member_amount,2) }}</td>
	     			<td>{{ $user_meal }}</td>
	     			<td>{{ round($meal_rate,2) }}</td>
	     			<td>{{ round($cost,2) }}</td>
	     			<td>{{ round($due,2)  }} </td>
	     		</tr>
	     		@endforeach

	     		<tr style="color:green;">
	     			<td colspan="2" style="text-align: right;">Total Asset={{ round($total_asset,2) }}</td>
	     			<td colspan="2">Total meal={{ round($total_meal,2) }}</td>
	     			<td>Total Cost={{ round($total_cost,2) }}</td>
	     			<td>Total Stock={{ round($total_stock,2) }}</td>
	     		</tr>


	     	</table>
	     </div>

		</div>
	</div>

</div>

</div>
@endsection