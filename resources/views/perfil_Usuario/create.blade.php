{!! Form::open(['route'=>'producto.store', 'method'=>'POST', 'files' => true, 'role' => 'form']) !!}
<div class="form-group">    
        <input type="text" name="nom_producto" value="" placeholder="Name" class="form-control"  required>
    </div>

    <div class="form-group">    
         <input type="text" style="height: 7rem;" name="descripcion" placeholder="Description" class="form-control" required>
     </div>
                  
    <div class="form-group">    
        <input type="text" name="cantidad" placeholder="Cantidad" class="form-control" required>
    </div>

    <div class="form-group">
        <input type="text" name="precio" placeholder="Precio" class="form-control" required>
    </div>

    <h5>Selecciona imagenes del producto</h5>
   
    <div class="fallback dropzone" class="" id="my-awesome-dropzone">
        <input type="file" name="file" multiple>
    </div>
    
    <button type="submit" class="btn btn-primary">Guardar</button> 
{!! Form::close() !!}