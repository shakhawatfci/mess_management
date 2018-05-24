@extends('admin_layout.master')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">

	<div class="panel panel-info">
		<div class="panel-heading">Insert Asset</div>
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
			<form action="{{ route('asset.store') }}" method="post"> 
			{{ csrf_field() }}
			<div class="form-group">
			<label>Date</label>
            <input type="text" name="date" class="form-control datepicker">
				
			</div>	
         <div class="form-group">
			<label>Select Member</label>

			 <select class="form-control" name="member" required="">
			 	<option value="">Select Member</option>

			 	@foreach($member as $value)
                 <option value="{{ $value->id }}">{{ $value->name }}</option>
			 	@endforeach
			 </select>	
			 </div>      

			 <div class="form-group">
			<label>Select State</label>

			 <select class="form-control" name="status" required="">
			 	<option value="">select state</option>
			 	<option value="1">current month asset</option>
			 	<option value="0">previous month asset</option>
			 </select>	
			 </div>
			

			<div class="form-group">
			<label>Asset Amount</label>
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
		<div class="panel-heading">Asset</div>
		<div class="panel-body">
           
           <div class="table-responsive">
           	 
           	 <table class="table table-bordered table-striped">
           	   <tr>
           	 	<th>date</th>
           	 	<th>Member</th>
           	 	<th>Asset Amount</th>
           	 	<th>Status</th>
           	 	<th>Delete</th>
           	   </tr>
               

               @foreach($asset as $value)
                <tr>
                	<td>{{ date('d F Y', strtotime($value->asset_date)) }}</td>
                	<td>{{ App\Member::where('id','=',$value->member_id)->first()->name }}</td>
                	<td>{{ $value->asset_amount }}</td>
                	<td>@if($value->status==0) previous month @endif</td>
                	<td><a onclick="return confirm('Are You Sure');" href="{{ route('asset.delete',$value->id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
               @endforeach
        
           	 </table>
         


           </div>

		</div>
	</div>

</div>
</div>
@endsection