@extends('layouts.app')

@section('navigation')
<div class="page-header align-items-center">
    <h1 class="page-title">
        Crear Usuario
    </h1>
</div>
@endsection


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2">Agregar un usuario al sistema</h3>
            </div>
            <!-- /.card-header -->
            
            {!!Form::open(array('url'=> 'usuarios/store','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nombres">Nombre completo</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres completos" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="roles_id">Rol</label>
                        {!!Form::select('roles_slug', $roles, null, ['id' => 'roles','class'=>'form-control selectpicker p-0','data-live-search' => 'true','placeholder' => 'Seleccionar rol','required'])!!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electronico" required>
                    </div>
                    <div class="form-group  col-md-6">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Crear</button>
                <a href="/usuarios" class="btn btn-primary float-right">Cancelar</a>
            </div>
            {!!Form::close()!!}
            
        </div>
    </div>
</div>
@endsection