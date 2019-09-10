@extends('organizations/layout')

@section('content')
	<h1 class="title">{{ $organization->name }}</h1>
	
	<div class="content">
		<label class="label" for="name">Наименование организации:</label>
		<div class="control">
			{{ $organization->name }}
		</div>
	</div>
	
	<div class="content">
		<label class="label" for="latitude">Координаты широты организации:</label>
		<div class="control">
			{{ $organization->latitude }}
		</div>
	</div>
	
	<div class="content">
		<label class="label" for="longitude">Координаты долготы организации:</label>
		<div class="control">
			{{ $organization->longitude }}
		</div>
	</div>
	
	<div class="content">
		<label class="label" for="comment">Комментарий:</label>
		<div class="control">
			{{ $organization->comment }}
		</div>
	</div>
	
	<form method="LINK" action="/organizations/{{ $organization->id }}/edit">
        <input type="submit" class="button is-link" value="Редактировать">
    </form>
	
	@include('errors')

@endsection
