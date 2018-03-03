@if(Session()->has('successMessage'))
	
	<div class="alert alert-success alert-dismissible">
	   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<strong>Success!</strong> {{ session('successMessage') }}
	</div>

@endif


