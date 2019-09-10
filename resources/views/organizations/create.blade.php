@extends('organizations/layout')

@section('content')
	<h1 class="title">Добавление новой организации</h1>
	
	<form method="post" action="/organizations">
		{{ csrf_field() }}
		
		<div><input type="text" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" value="{{ old('name') }}" placeholder="Наименование организации"></div>
		
		<div><input type="text" class="input {{ $errors->has('latitude') ? 'is-danger' : '' }}" name="latitude" value="{{ old('latitude') }}" placeholder="Координаты широты организации"></div>
		
		<div><input type="text" class="input {{ $errors->has('longitude') ? 'is-danger' : '' }}" name="longitude" value="{{ old('longitude') }}" placeholder="Координаты долготы организации"></div>
		
		<div><input type="text" class="input {{ $errors->has('comment') ? 'is-danger' : '' }}" name="comment" value="{{ old('comment') }}" placeholder="Комментарий"></div>
            
		<div class="box">
			<button type="submit" class="button is-link">Добавить организацию</button>
		</div>
		
		@include('errors')
	</form>
@endsection
