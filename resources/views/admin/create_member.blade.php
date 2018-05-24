@extends('admin_layout.master')

@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">

	<div class="panel panel-info">
		<div class="panel-heading">Create Member</div>
		<div class="panel-body">
			<form action="{{ route('member.store') }}" method="post"> 
			{{ csrf_field() }}
			<div class="form-group">
			<label>Member Name</label>
				<input class="form-control" placeholder="Name" required="" name="name">
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
		<div class="panel-heading">All Member</div>
		<div class="panel-body">
           
           <div class="table-responsive">
           	 
           	 <table class="table table-bordered table-striped">
           	   <tr>
           	 	<th>Id</th>
              <th>Name</th>
           	 	<th>Status</th>
           	 	<th>Update</th>
           	   </tr>
               
               @foreach($member as $value) 
           	   <tr>
           	   <form action="{{ route('member.update',$value->id) }}" method="post">
           	   {{ csrf_field() }}
           	   <input type="hidden" name="_method" value="PUT">
           	   	 <td>{{ $value->id }}</td>
           	   	 <td>
           	   	 <input class="form-control" type="text" name="name" value="{{ $value->name }}">
           	   	 </td>

                 <td>
                   <select class="form-control" name="status">
                     <option @if(1 == $value->status) selected @endif value="1">Active</option>
                     <option @if(0 == $value->status) selected @endif value="0">Inactive</option>
                   </select>
                 </td>
           	   	 <td><button type="submit" class="btn btn-warning">Update</button></td>
               </form>
           	   </tr>
           	   @endforeach 
           	 </table>



           </div>

		</div>
		<div class="panel-footer">{{ $member->links() }}</div>
	</div>

</div>
</div>
@endsection