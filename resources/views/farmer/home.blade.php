@extends('layouts.master')
	@section('title', 'All Region')

	@section('content')
		<section class="content">
	      <div class="row">
	        <div class="col-md-12">
	           <ul>
		<li>You can see all the crops and manually add them to you cultivation from <b>LIST OF CROPS</b></li>
		<ul>
			<li><b>Details</b> to view full details</li>
			<li><b>Add To Cultivation</b> to add the crop in your cultivation</li>
		</ul>
		<li>You can see your current cultivation from <b>ONGOING CULTIVATIONS</b></li>
		<ul>
			<li>See the details of each cultivation from <b>Details</b> at right of each cultivation</li>
			<ul>
				<li>Mark weekly tasks after you have finished each task</li>
				<li>Go to <b>End cultivation</b> and provide instructed informations to end the cultivation</li>
			</ul>
		</ul>
		<li>After ending your cultivations, you can see them in the <b>HISTORY</b> tab</li>
		<li>You can utilize our system by getting suggestion of what should you cultivate from <b>GET SUGGESTION</b></li>
	</ul>
	You can use the search bars, just type the <b>Crop Name</b> you are looking for.
	        </div>
	     </div>
    </section>
		
	@endsection