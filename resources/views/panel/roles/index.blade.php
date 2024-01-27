@extends('layouts.app')

@section('navigation')
<div class="page-header align-items-center">
    <h1 class="page-title">
        Lista de roles
    </h1>
    <a href="/roles/create" class="btn btn-success ml-auto"><i class="fe fe-plus"></i> Crear</a>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2">Todos los roles del sistema</h3>
            </div>
            <div class="card-body">
                <table  id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Descripcion</th>
                            <th>Especial</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($roles as $rol)
                            <tr>
                                <td>{{$rol->name}}</td>
                                <td>{{$rol->slug}}</td>
                                <td>
                                    @if($rol->description==null)
                                    Ninguna
                                    @else
                                    {{$rol->description}}
                                    @endif
                                </td>
                                <td>
                                    @if($rol->special==null)
                                    Ninguno
                                    @elseif($rol->special=='all-access')
                                    Acceso completo
                                    @elseif($rol->special=='no-access')
                                    Acceso bloqueado
                                    @endif
                                </td>
                                <td>
                                    @can('roles.show')
                                    <a class="btn btn-primary" href="{{URL::action('RolesController@show',$rol->id)}}">
                                        <i class="fe fe-eye"></i>  
                                        Ver
                                    </a>
                                    @endcan
                                    @can('roles.edit')
                                    <a class="btn btn-info" href="{{URL::action('RolesController@edit',$rol->id)}}">
                                        <i class="fe fe-edit-2"></i> 
                                        Edit
                                    </a>
                                    @endcan
                                    @can('roles.destroy')
                                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-warning-{{$rol->id}}">
                                        <i class="fe fe-trash"></i>  
                                        Delete
                                    </a>
                                    
                                    <div class="modal fade" id="modal-warning-{{$rol->id}}" aria-modal="true" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modal-warning-{{$rol->id}}Label">Eliminar rol</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                                {{Form::Open(array('action'=>array('RolesController@destroy',$rol->id),'method'=>'delete'))}}
                                                <div class="modal-body">
                                                <p class="text-center">Confirme si desea eliminar el perfil {{$rol->name}}</p>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-between">
                                                    <button type="button" class="btn btn-primary btn-pill" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger btn-pill">Confirmar</button>
                                                </div>
                                                {{Form::Close()}}
                                            </div>
                                        </div>
                                    </div>
                                    @endcan
                                </td>  
                            </tr>
                            @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Descripcion</th>
                            <th>Especial</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
//   $(function () {
//     $('#example2').DataTable({
//       "paging": true,
//       "lengthChange": false,
//       "searching": false,
//       "ordering": true,
//       "info": true,
//       "autoWidth": false,
//       "responsive": true,
//     });
//   });
</script>
@endsection
