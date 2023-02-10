@extends('parent')

@section('main')

<div class="jumbotron text-center">
	<div align="right">
		<a href="{{ route('tarea_lista.index') }}" class="btn btn-default">atras</a>
	</div>
	<br />
	<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" />
	<h3>Nombre de Tarea - {{ $data->tarea_nom }} </h3>
	<h3>Estado - {{ $data->last_name }}</h3>
</div>
@endsection
