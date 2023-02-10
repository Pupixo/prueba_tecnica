
@extends('parent')

@section('main')
@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
<div align="right">
 <a href="{{ route('tarea_lista.index') }}" class="btn btn-default">Retroceder</a>
</div>

<form method="post" action="{{ route('tarea_lista.store') }}" enctype="multipart/form-data">

 @csrf
 <div class="form-group">
  <label class="col-md-4 text-right">Ingresa Nombre de Tarea</label>
  <div class="col-md-8">
   <input type="text" name="tarea_nom" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Seleccionar Estado de la tarea</label>
  <div class="col-md-8">
        <select name="estado" class="form-control">
            <option value="" selected>Seleccione</option>
            <option value="1">Realizado</option>
            <option value="2" >No realizado</option>
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
  </div>
 </div>
 <br /><br /><br />
 <div class="form-group text-center">
  <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
 </div>

</form>

@endsection