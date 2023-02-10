@extends('parent')

@section('main')
<div align="right">
	<a href="{{ route('tarea_lista.index') }}" class="btn btn-default">Atras</a>
</div>
<br />

<form method="post" action="{{ route('tarea_lista.update', $data->id) }}" enctype="multipart/form-data">

	@csrf
	@method('PATCH')
	<div class="form-group">
		<label class="col-md-4 text-right">Ingresa Nombre de Tarea</label>
		<div class="col-md-8">
			<input type="text" name="tarea_nom" value="{{ $data->tarea_nom }}" class="form-control input-lg" />
		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">Seleccionar Estado de la tarea</label>
		<div class="col-md-8">

        <select name="estado" class="form-control">
            <option value="">Seleecione</option>
            <option value="1"  @if( $data->estado == 1)) selected  @endif >Realizado</option>
            <option value="2"  @if( $data->estado == 2)) selected  @endif >No realizado</option>
        </select>

		</div>
	</div>
	<br />
	<br />
	<br />
	<div class="form-group">
		<label class="col-md-4 text-right">Ingrese una imagen de la tarea</label>
		<div class="col-md-8">
			<input type="file" name="imagen" />
			<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
			<input type="hidden" name="hidden_image" value="{{ $data->image }}" />
		</div>
	</div>
	<br /><br /><br />
	<div class="form-group text-center">
		<input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
	</div>
</form>
@endsection



