@extends('admin_layout.master')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">

	<div class="panel panel-info">
		<div class="panel-heading">Meal Chart</div>
		<div class="panel-body">
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<form action="{{ route('mealChart.view') }}" method="post"> 
			{{ csrf_field() }}

			<div class="col-md-6">
			<div class="form-group">
			<label>Date From</label>
            <input type="text" name="start_date" class="form-control datepicker" required="">

            </div>
				
			</div>			

			<div class="col-md-6">
			<div class="form-group">
			<label>Date To</label>
            <input type="text" name="end_date" class="form-control datepicker" required="">

            </div>
				
			</div>	
			
  <div class="col-md-12">
  <div class="form-group">
		<button type="submit" class="btn btn-info">View</button>
			</div>
			</div>

			</form>

		</div>
	</div>

</div>

</div>
@endsection