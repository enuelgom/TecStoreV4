@extends('diseño.navbar')

@section('title','Nombre_usuario')

@section('content')

@include('ventanas.errors')
<!--Informacion del perfil de usuario-->
<div class="container-fluid" id="inforPerfil">
    <div class="row">
        <div class="col-10 col-sm-4">
            <div class=" card text-center" style="width: 20rem; margin-top: 50px;">
                <img class="card-img-top rounded-circle mx-auto d-block" style="height: 200px; width: 200px; background-color: #EFEFEF;" src="images/{{  Auth::user()->avatar }}" alt="">
                <div class="card-body">

                    <h5 class="card-title">{{ Auth::user()->nombre }}</h5>
                    <p class="card-text">Last name: {{ Auth::user()->apellido }}</p>
                    <p class="card-text">Email: {{ Auth::user()->correo }}</p>
                    <p class="card-text">Number phone: {{ Auth::user()->num_cel }}</p>
                    <button type="submit" class="btn btn-primary">Editar perfil</button>
                </div>
             </div>
        </div>  
        
<!--Registro de productos-->    
    <div class="col-10 col-sm-4" id="perfil" style="width: 20rem; margin-top: 40px;">
        <h5>Ahora puedes registrar tus productos</h5>
        {!! Form::open(['route'=>'producto.store', 'method'=>'POST', 'files' => true, 'role' => 'form']) !!}
                    <div class="form-group">    
                        <input type="text" name="nom_producto" value="" placeholder="Name" class="form-control"  required>
                    </div>
             
                    <div class="form-group">    
                         <input type="text" style="height: 7rem;" name="descripcion" placeholder="Description" class="form-control" required>
                     </div>
                                  
                    <div class="form-group">    
                        <input type="text" name="cantidad" placeholder="Precio" class="form-control" required>
                    </div>
             
                    <div class="form-group">
                        <input type="text" name="precio" placeholder="Cantidad" class="form-control" required>
                    </div>

                    <h5>Selecciona imagenes del producto</h5>
                   
                    <div class="fallback dropzone" class="" id="my-awesome-dropzone">
                        <input type="file" name="file" multiple>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Guardar</button>
        {!! Form::close() !!}
    </div>
     
<!--Productos previamente publicados por el usuario-->
    <div class="container-fluid" id="registrados">
        <hr>
            <h2>Productos registrados</h2>
            <h6>En este apartado podra visualizar los productos que haya registrado</h6>
    <div class="row">  
        {{-- productos del usuario --}}
        @foreach ($item as $dato)
        <div class="col-sm">
            <div class="card text-center" style="width: 18rem; margin-top: 40px;">
                    <img class="card-img-top rounded-circle mx-auto d-block" style="height: 200px; width: 200px; background-color: #EFEFEF;"  alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $dato->nombre }}</h5>
                    <p class="card-text"><strong>Precio: ${{ $dato->precio }}</strong></p>
                    <p class="card-text"><strong>Descripción: {{ $dato->descripcion }}</strong></p>
                    {!! link_to_route('producto.edit',$title='Editar', $parameters=$dato->id, $attributes=['class'=>'btn btn-success']) !!}
                    {!! link_to_route('producto.destroy', $title='Eliminar', $parameters=$dato->id, $attributes=['class'=>'btn btn-danger']) !!}
                </div>
            </div>
        </div>    
            
        @endforeach
    </div>
</div>

</div>

<script src="{{ asset('js/logica.js') }}"></script>


@endsection