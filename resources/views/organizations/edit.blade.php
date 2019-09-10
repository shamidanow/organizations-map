@extends('organizations/layout')

@section('content')
	<h1 class="title">Редактировать организацию</h1>
	<form method="POST" action="/organizations/{{ $organization->id }}" style="margin-bottom: lem;">
		{{ method_field('PATCH') }}
		{{ csrf_field() }}
		
		<div class="field">
			<label class="label" for="name">Наименование</label>
			
			<div class="control">
				<input type="text" class="input" name="name" placeholder="Наименование организации" value="{{ $organization->name }}">
			</div>
		</div>
		
		<div class="field">
			<label class="label" for="latitude">Широта</label>
			
			<div class="control">
				<input type="text" class="input" name="latitude" placeholder="Координаты широты организации" value="{{ $organization->latitude }}">
			</div>
		</div>
		
		<div class="field">
			<label class="label" for="longitude">Долгота</label>
			
			<div class="control">
				<input type="text" class="input" name="longitude" placeholder="Координаты долготы организации" value="{{ $organization->longitude }}">
			</div>
		</div>
		
		<div class="field">
			<label class="label" for="comment">Комментарий</label>
			
			<div class="control">
				<input type="text" class="input" name="comment" placeholder="Комментарий" value="{{ $organization->comment }}">
			</div>
		</div>
		
		<div class="field">
    		<div class="control">
    			<button type="submit" class="button is-link">Обновить организацию</button>
    		</div>
		</div>
	</form>
	
	@include('errors')
	
	<form method="POST" action="/organizations/{{ $organization->id }}" style="margin-bottom: lem;">
		@method('DELETE')
		@csrf
		
		<div class="field">
    		<div class="control">
    			<button type="submit" class="button">Удалить организацию</button>
    		</div>
		</div>
	</form>
@endsection