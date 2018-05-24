@extends('admin_layout.master')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">

	<div class="panel panel-info">
		<div class="panel-heading">Insert Bazar</div>
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
			<form action="{{ route('bazar.store') }}" method="post"> 
			{{ csrf_field() }}
			<div class="form-group">
			<label>Date</label>
            <input type="text" name="date" class="form-control datepicker">
				
			</div>	
         <div class="form-group">
			<label>Name</label>
            <input type="text" name="name" class="form-control" required="">
				
			</div>
			

			<div class="form-group">
			<label>Bazar Amount</label>
            <input type="text" name="amount" class="form-control" required="">
				
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
		<div class="panel-heading">Bazar</div>
		<div class="panel-body">
           
           <div class="table-responsive">
           	 
           	 <table class="table table-bordered table-striped">
           	   <tr>
           	 	<th>date</th>
           	 	<th>Name</th>
           	 	<th>Bazar Amount</th>
           	 	<th>Delete</th>
           	   </tr>
               

               @foreach($bazar as $value)
                <tr>
                	<td>{{ date('d F Y', strtotime($value->date)) }}</td>
                	<td>{{ $value->member_name }}</td>
                	<td>{{ $value->bazar_amount }}</td>
                	<td><a onclick="return confirm('Are You Sure');" href="{{ route('bazar.delete',$value->id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
               @endforeach
        
           	 </table>
         


           </div>

		</div>
	</div>

</div>
</div>
@endsection