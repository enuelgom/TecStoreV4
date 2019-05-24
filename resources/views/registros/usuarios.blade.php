@extends('diseño.navbar')

@section('title','Registro')

@section('content')


<?php $message = Session::get('message') ?>

@if ($message == 'store')
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        ¡Usuarios creado exitosamente!
    </div>
@endif

<!--Instruccion-->
<h4 class="text-center">Registrate es gratis</h4>
<h6 class="text-center">Una vez realizado tu registrado tendras el privilegio de ofertar tus productos en nuestro sitio.</h6><br>

<!--Formulario-->
<div class="container">
    @csrf
    {!! Form::open(['route'=>'usuarios.store', 'method'=>'POST', 'files' => true, 'role' => 'form']) !!}
        
            
                <div class="row">
                    <div class="col-10 col-sm-4">
                        <div class="form-group">    
                            <input type="text" name="nombre" placeholder="Name" class="form-control"  required>
                        </div>
                        <div class="form-group">    
                            <input type="text" name="apellido" placeholder="Last name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-10 col-sm-4">
                        <div class="form-group" id="form"> 
                            <label for="">Photo</label> <br>
                            <input id="file" type="file" name="avatar" required>
                        </div> 
                    </div>
                    <div class="col-10 col-sm-4" id="imagen_preview">
                        <div class="row">
                            <div class="col-xm preview card justify-content-center" style="width: 20rem; height: 10rem; margin-left: 250px; margin-top: 1px;"  id="preview">
                                              
                            </div>
                        </div>
                        
                    </div>
                </div>
            
               
            
            <div class="form-group">    
                <input type="email" name="correo" placeholder="Enter your email" class="form-control" required>
            </div>
        
            <div class="form-group">
                <input type="text" name="facebook" placeholder="Enter your Facebook" class="form-control" required>
            </div>
        
            <div class="form-group">    
                <input type="text" name="num_telefono" placeholder="Number phone" class="form-control" required>
            </div>
        
            <div class="form-group">
                <input type="text" name="usuario" placeholder="User Name" class="form-control" required>
            </div>
        
            <div class="form-group">     
                <input type="password" name="password" placeholder="Password" class="form-control" required>
            </div>
        
            <center><button type="submit" class="btn btn-primary">Guardar</button></center>
      
</div>
<script src="{{ asset('js/logica.js') }}"></script>

@endsection