@extends('admin_layout.master')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">

	<div class="panel panel-info">
		<div class="panel-heading">Insert Meal</div>
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
			<form action="{{ route('meal.store') }}" method="post"> 
			{{ csrf_field() }}
			<div class="form-group">
			<label>Date</label>
            <input type="text" name="date" class="form-control datepicker">
				
			</div>	
         <div class="form-group">
			<label>Check Member</label> <br>
			<input type="checkbox" id="checkAll"> <strong>Check All </strong> <br> <br>
@foreach($member as $value)
			  <input type="checkbox" name="member[]" value="{{ $value->id }}"> &nbsp; {{ $value->name }} &nbsp;  
@endforeach
			 	
               
			 	
				
			 </div>
			

			<div class="form-group">
			<label>Meal</label>
            <input type="text" name="meal" class="form-control" required="">
				
			</div>
			
  
  <div class="form-group">
		<button type="submit" class="btn btn-info">Save</button>
			</div>

			</form>

		</div>
	</div>

</div>

<div class="col-md-12">
		<div class="panel panel-info">
		<div class="panel-heading">Recent Meal</div>
		<div class="panel-body">
           
           <div class="table-responsive">
           	 
           	 <table class="table table-bordered table-striped">
           	   <tr>
           	 	<th>date</th>
           	 	<th>Member</th>
           	 	<th>Meal Amount</th>
           	 	<th>Delete</th>
           	   </tr>
               

               @foreach($meal as $value)
                <tr>
                	<td>{{ date('d F Y', strtotime($value->date)) }}</td>
                	<td>{{ $value->member->name }}</td>
                	<td>{{ $value->meal_amount }}</td>
                	<td><a onclick="return confirm('Are You Sure');" href="{{ route('meal.delete',$value->id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
               @endforeach
        
           	 </table>
         


           </div>

		</div>
	</div>

</div>
</div>
<script type="text/javascript">
	$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
@endsection