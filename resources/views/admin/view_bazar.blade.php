@extends('admin_layout.master')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">

	<div class="panel panel-info">
		<div class="panel-heading">View Bazar</div>
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
			<form action="{{ route('view.bazar') }}" method="GET"> 
			<div class="form-group">
			<label>Start Date</label>
            <input type="text" name="start_date" class="form-control datepicker">
				
			</div>

           <div class="form-group">
			<label>End Date</label>
            <input type="text" name="end_date" class="form-control datepicker">
				
			</div>	

			
  
       <div class="form-group">
		<button type="submit" class="btn btn-info">Show</button>
			</div>

			</form>

		</div>
	</div>

</div>
</div>
@endsection