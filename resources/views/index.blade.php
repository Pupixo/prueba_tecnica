
@extends('parent')

@section('main')





                                          <div class="page-meta">
                                            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                                    <li class="breadcrumb-item"><a href="#">Tarea</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                                                </ol>
                                            </nav>
                                          </div>

                                        
                                    <div align="right">
                                          <a href="{{ route('tarea_lista.create') }}" class="btn btn-success btn-sm">Agregar</a>
                                    </div>
                                    <br />
                                    @if ($message = Session::get('success'))
                               

                                                                  <div class="alert alert-light-primary alert-dismissible fade show border-0 mb-4" role="alert" style="background: #153a15;">
                                                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg> ... </svg></button>
                                                                  <strong>{{ $message }}</strong></button>
                                                                  </div> 



                                    @endif

                        
                                        <div class="row layout-top-spacing">
                                    
                                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                                <div class="widget-content widget-content-area br-8">
                                                    <table id="blog-list" class="table dt-table-hover" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre de Tarea</th>
                                                                <th>Estado</th>
                                                                <th>Fotografia</th>
                                                                <th class="no-content text-center">Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($data as $row)

                                                                        <tr>
                                                                              <td>{{ $row->tarea_nom }}</td>

                                                                             


                                                                              <td><span class="badge  @if( $row->estado == 1)) badge-success @else  badge-danger  @endif"   >@if( $row->estado == 1) Realizado @else  No realizado  @endif</span></td>
                                                                              
                                                                              <td>
                                                                                    <div class="d-flex justify-content-left align-items-center">
                                                                                    <div class="avatar  me-3">
                                                                                          <img src="{{ URL::to('/') }}/images/{{ $row->image }}" alt="Avatar" width="64" height="64">
                                                                                    </div>
                                                                              
                                                                                    </div>
                                                                              </td>
                                                                  
                                                                              <td class="text-center">

                                                                                    <div class="dropdown">
                                                                                          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink18" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                                                          </a>

                                                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink19">
                                                                                                      <form action="{{ route('tarea_lista.destroy', $row->id) }}" method="post">
                                                                                                            <a href="{{ route('tarea_lista.show', $row->id) }}" class="dropdown-item" >Mostrar</a>
                                                                                                            <a href="{{ route('tarea_lista.edit', $row->id) }}"  class="dropdown-item" >Editar</a>
                                                                                                            @csrf
                                                                                                            @method('DELETE')
                                                                                                            <button type="submit"  class="dropdown-item" >Eliminar</button>
                                                                                                      </form>

                                                                                                </div>

                                                                                    </div>
                                                                                    
                                                                              </td>
                                                                        </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                        
                                        </div>
@endsection