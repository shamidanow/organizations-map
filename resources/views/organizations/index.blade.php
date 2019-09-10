@extends('organizations/layout')

@section('content')
	<h1 class="title">Список организаций</h1>
	<table class="table">
        <tr>
            <th>#</th>
            <th>Наименование организации</th>
            <th>Широта</th>
            <th>Долгота</th>
            <th>Комментарий</th>
            <th></th>
        </tr>
        @foreach ($organizations as $organization)
        <tr>
            <td>{{ $organization->number }}</td>
            <td><a href="/organizations/{{ $organization->id }}/edit" title="Редактировать">{{ $organization->name }}</a></td>
            <td>{{ $organization->latitude }}</td>
            <td>{{ $organization->longitude }}</td>
            <td><a href="/organizations/{{ $organization->id }}" title="Просмотр">{{ $organization->comment }}</a></td>
            <td>
                <form method="POST" action="/organizations/{{ $organization->id }}" style="margin-bottom: lem;">
            		@method('DELETE')
            		@csrf
            		<button type="submit" class="button">Удалить организацию</button>
            	</form>
			</td>
        </tr>
        @endforeach
    </table>
    
    <div class="column">
    	<form method="LINK" action="/organizations/create">
            <input type="submit" class="button is-link" value="Добавить новую организацию">
        </form>
    </div>
    
    <div class="column">
    	<form method="LINK" action="/organizations/showmap">
            <input type="submit" class="button is-link" value="Показать карту">
        </form>
    </div>
    
@endsection