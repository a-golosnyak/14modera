@extends('layouts.home')

@section('content')
	<div class="container">
{{--		<div class="list-group">
			<div class="list-group-item">Cras justo odio</div>
			<div class="list-group-item">Dapibus ac facilisis in</div>
			<div class="list-group-item">Morbi leo risus</div>
			<div class="list-group-item">Porta ac consectetur ac</div>
			<div class="list-group-item">Vestibulum at eros</div>
		</div>	--}}

		@if(isset($cats))
			<ul>
				@foreach($cats as $cat)
					@if($cat->parent_id == 0)
						<li><a class="blue-grey-text" href="#">{{$cat->id}} {{$cat->name}} {{$cat->name}} {{$cat->parent_id}}</a></li>
					@else
						<li class="black-text">{{$cat->id}} {{$cat->name}} {{$cat->name}} {{$cat->parent_id}}</a></li>
					@endif
				@endforeach
			</ul>
		

{{--			<ul>
				<li><a href="#">{{$cats->name}}</a></li>
				<li>Cras justo odio</li>
				<li>Cras justo odio</li>
				<li>Cras justo odio</li>
				
				<ul>
					<li>Cras justo odio</li>
					<li>Cras justo odio</li>
					<ul>
						<li>Cras justo odio</li>
						<li>Cras justo odio</li>
						<li>Cras justo odio</li>
					</ul>
					<li>Cras justo odio</li>
					<li>Cras justo odio</li>
				</ul>
				
				<li>Cras justo odio</li>
			</ul>		--}}
		@endif
	</div>
@endsection