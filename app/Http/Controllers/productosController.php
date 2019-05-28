<?php

namespace TecStore\Http\Controllers;

use Auth;
use DB;
use Session;
use Redirect;   
use TecStore\imagen;
use TecStore\productos;
use TecStore\user;
use Illuminate\Http\Request;

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = productos::all();
        //$img = imagen::all();
        //return view('index',['data'=>$data,'img'=>$img]);

        $data = DB::table('productos')->join('imagen','productos.id','imagen.id_producto')->select('productos.*','imagen.*')->get();
        return view('index',['data'=>$data]);
        
    }
    public function perfil(){
        
        $item=DB::table('productos')->join('imagen','productos.id','imagen.id_producto')->where('productos.id_usuario','=',auth::user()->id)->select('productos.*','imagen.*')->get();

        
        //$item = productos::where('id_usuario',Auth::user()->id)->get();
        return view('perfil_Usuario.perfil',compact('item'));

    }

    public function showImg(){
        $show = imagen::where('id_producto');
    }
    /**
     * Show the form for creating a new resource.   
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $producto = productos::create([
           'nombre' => $request['nom_producto'],
           'descripcion' => $request['descripcion'],
           'cantidad' => $request['cantidad'],
           'precio' => $request['precio'],
           'status' => '1',
           'id_usuario' => Auth::id(),
        ]);
        
        $this->img($request,$producto->id);
        return redirect('/perfil_Usuario')->with('message','store');
        
    }

    public function img(Request $request,$id){
        $nombre="";
        $archivo="";
    
        if($request->hasFile('file')){
            $archivo = $request->file('file');
            $nombre = time().$archivo->getClientOriginalName();
            $archivo->move(public_path().'/productos/',$nombre);
        }

        imagen::create([
            'id_producto' => $id,
            'url' => $nombre,
            'alt' => $request['nom_producto'],
        ]);

        
    }

    /* 
     * 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nombre)
    {
        $nombre_p = productos::where('nombre','=',$nombre);
        return view('perfil_Usuario.update',compact('nombre_p'));
    }

    /** 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
    //Este causa el problema

    $producto = productos::where('id',$id)->get();
    $item=DB::table('productos')->join('imagen','productos.id','imagen.id_producto')->where('productos.id_usuario','=',auth::user()->id)->select('productos.*','imagen.*')->get();
    //return $item;
    return view('perfil_Usuario.update',['producto'=>$producto,'item'=>$item]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editar=productos::find($id);
        $editar->nombre = $request->get('nom_producto');
        $editar->descripcion = $request->get('descripcion');
        $editar->cantidad = $request->get('cantidad');
        $editar->precio = $request->get('precio');
        $editar->save();
        return Redirect::to('perfil_Usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Redirect::to('perfil_Usuario');
    }
}
