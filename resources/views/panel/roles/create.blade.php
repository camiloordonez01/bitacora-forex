@extends('layouts.app')

@section('navigation')
<div class="page-header align-items-center">
    <h1 class="page-title">
        Crear rol
    </h1>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mt-2">Agregar un rol al sistema</h3>
            </div>
                {!!Form::open(array('url'=> 'roles/store','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                <div class="card-body">
                    <h3 class="text-center m-3 text-dark">Informacion</h3>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug" required>
                    </div>
                    <div class="form-group">
                        <label for="description" >Descripcion</label>
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="special" >Especial</label>
                        <select name="special" class="form-control" required id="special">
                            <option value="ninguno" selected>Ninguno</option>
                            <option value="all-access">Acceso completo</option>
                            <option value="no-access">Acceso restringido</option>
                        </select>
                    </div>
                    
                    <div class="permisosSeccion">
                        <hr>
                        <h3 class="text-center m-3 text-dark">Permisos</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control" id="permisos">
                                    <option value="" selected>Ninguno</option>
                                    @foreach($permisos as $permiso)
                                    <option value='{"description":"{{$permiso->description}}","slug":"{{$permiso->slug}}","name":"{{$permiso->name}}","opt_id":"optionPer{{$permiso->id}}" }' id="optionPer{{$permiso->id}}">{{$permiso->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 table-bordered text-center">
                                <h5>Decripcion</h5>
                                <p class="descriptionSelect"></p>
                            </div>
                            <div class="col-md-2">
                                <a href="javascript:void(0)" id="addPermiso" class="btn btn-primary float-right">Agregar</a>
                            </div>
                        </div>
                        <div class="permisosSelected text-center  mt-3 row" style="display: flex;">
                            <label class="ningunSelect" style="font-size:12px; color: #ccc;">Ningun permiso seleccionado</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Crear</button>
                    <a href="/roles" class="btn btn-primary float-right">Cancelar</a>
                </div>
                {!!Form::close()!!}
        </div>
    </div>
</div>
<style>
    #permisos option:disabled {
        background-color: #dee2e6;
    }
</style>
<script>
    $(document).ready(function(){
        $('#special').change(function(){
            if(!($(this).val()=='ninguno')){
                $('.permisosSeccion').css('display','none');
            }else{
                $('.permisosSeccion').css('display','block');
            }
        });
        $('#permisos').change(function(){
            let datos = JSON.parse($(this).val());
            $('.descriptionSelect').html(datos.description);
            $('#addPermiso').val('{"name":"'+datos.name+'","slug":"'+datos.slug+'", "opt_id":"'+datos.opt_id+'"}');
        });
        $('#addPermiso').click(function(){
            console.log($(this).val());
            let datos = JSON.parse($(this).val());
            $('#'+datos.opt_id).prop("disabled", true);
            $('.ningunSelect').css('display','none');
            $('.permisosSelected').append(`
                <div class="col-md-2 " style="
                    width: max-content;
                    padding: 8px;
                    background-color: gray;
                    color: white;
                    border-radius: 5px;
                    margin: 0px 10px;
                    margin-bottom:10px;
                    cursor: pointer;
                " onclick="deleteElement(this, '`+datos.opt_id+`')">
                    <span>`+datos.name+`</span>
                    <input type="hidden" value="`+datos.slug+`" name="permissions[]">
                </div>`);
        });
    });
    function deleteElement(element, opt_id){
        var padre = element.parentNode;
        padre.removeChild(element);
        $('#'+opt_id).prop("disabled", false);
    }
</script>
@endsection