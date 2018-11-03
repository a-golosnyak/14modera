@extends('layouts.home')

@section('content')
	<div class="container">
		@if(isset($cats))
			<ul class="list-group">
				@foreach($cats as $cat)
					@if($cat->parent_id === 0)
						<li id="item{{$cat->id}}" class="blue-grey-text point list-group-item">
							<form  onclick="GetCategory({{$cat->id}});">{{$cat->id}} {{$cat->name}} {{$cat->parent_id}}
								<input id="trigg{{$cat->id}}" type="hidden" value="0">	
							</form>
							<ul id="data{{$cat->id}}"> </ul>
						</li>
					@else
						<li class="black-text">{{$cat->id}} {{$cat->name}} {{$cat->parent_id}}</li>
					@endif
				@endforeach
			</ul>
		@endif
	</div>
@endsection