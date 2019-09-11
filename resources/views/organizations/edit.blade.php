@extends('organizations/layout')

@section('content')
	<h1 class="title">Редактировать организацию</h1>
	<form method="POST" action="/organizations/{{ $organization->id }}" style="margin-bottom: lem;">
		{{ method_field('PATCH') }}
		{{ csrf_field() }}
		
		<div class="field">
			<label class="label" for="company_name">Наименование</label>
			
			<div class="control">
				<input type="text" class="input" name="company_name" placeholder="Наименование организации" value="{{ $organization->company_name }}">
			</div>
		</div>
		
		<div class="field">
			<label class="label" for="fact_addr">Адрес</label>
			
			<div class="control">
				<input type="text" class="input" name="fact_addr" placeholder="Адрес" value="{{ $organization->fact_addr }}">
			</div>
		</div>
		
		<div class="field">
			<label class="label" for="fact_addr_coord">Координаты</label>
			
			<div class="control">
				<input type="text" class="input" name="fact_addr_coord" placeholder="Координаты" value="{{ $organization->fact_addr_coord }}">
			</div>
		</div>
		
		<div class="field">
			<label class="label" for="site_url">Комментарий</label>
			
			<div class="control">
				<input type="text" class="input" name="site_url" placeholder="Комментарий" value="{{ $organization->site_url }}">
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