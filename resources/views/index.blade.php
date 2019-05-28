@extends('diseño.interfaz')

@section('title','Inicio')

@section('content')
<!--Productos publicados mostrados en la pagina principal-->
<div class="container" id="principal">
        <form class="buscar" role="search">
           <input class="form-control mr-sm-2" type="text" placeholder="Empieza a buscar" aria-label="Search"><br>
            <center>
                <button class="btn btn-outline-success my-2 my-sm-0" id="btnBuscar" type="submit">Search</button>
            </center>
        </form>
        <div class="row">
            @foreach ($data as $producto)
            
            <div class="col-sm">
                <div class="card text-center" style="width: 18rem; margin-top: 40px;">
                                <img class="card-img-top rounded-circle mx-auto d-block" style="height: 200px; width: 200px; background-color: #EFEFEF;" src="productos/{{ $producto->url }}" alt="">                          
                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                <p class="card-text"><strong>Precio:</strong> {{ $producto->precio }}</p>
                                <p class="card-text"><strong>Descripción:</strong>{{ $producto->descripcion }}</p>
                                {{-- modal --}}
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>
                            
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        ...
                                    </div>
                                </div>
                            </div>
                            <!-- Large modal -->
                            <a href="show_Producto" class="btn btn-primary">Ver mas..</a>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>

</div>

@endsection