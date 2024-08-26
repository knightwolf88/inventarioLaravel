<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{

    protected $productosModel;

    // Inyección de dependencias en el constructor
    public function __construct(Productos $productosModel)
    {
        $this->productosModel = $productosModel;
    }

    public function index()
    {
        return view('productos');
    }

    public function listar(Request $request)
    {
        // Obtén los datos del request
        $draw = $request->input('draw');
        $start = $request->input('start');
        $length = $request->input('length');

        // Llama al modelo para obtener los datos paginados y el conteo total
        $totalRecords =   $this->productosModel->contarTotalProductos();
        $productos =   $this->productosModel->obtenerTodosLosProductos();

        // Procesar los datos para DataTables
        $data = [];
        foreach ($productos as $producto) {
            $estado = ($producto->estado == 1)
                ? '<span class="badge badge-success">ACTIVO</span>'
                : '<span class="badge badge-danger">INACTIVO</span>';

            $data[] = [
                $producto->nombre,
                $estado,
                ($producto->estado)
                    ? '<button type="button" class="btn btn-success btn-sm" onclick="estado(' . $producto->idproducto . ',0)"><i class="fa fa-check"></i></button> <button type="button" class="btn btn-info btn-sm" data-bs-target="#modal-producto" data-bs-toggle="modal" onclick="editarModal(' . $producto->idproducto . ')"><i class="fa fa-edit"></i></button>'
                    : '<button type="button" class="btn btn-danger btn-sm" onclick="estado(' . $producto->idproducto . ',1)"><i class="fa fa-close"></i></button> <button type="button" class="btn btn-info btn-sm" data-bs-target="#modal-producto" data-bs-toggle="modal" onclick="editarModal(' . $producto->idproducto . ')"><i class="fa fa-edit"></i></button>'
            ];
        }

        // Resultados para DataTables
        $results = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $data
        ];

        return response()->json($results);
    }

    public function datosProducto(Request $request)
    {
        // Obtén los datos del request
        $idproducto = $request->input('idproducto',0);

        $producto =   $this->productosModel->obtenerDatoProducto($idproducto);

        if ($producto) {
            // Devolver el objeto como JSON
            return response()->json($producto);
        } else {
            // Devolver una respuesta JSON en caso de que no se encuentre el producto
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
    }

    public function insertar(Request $request) {

        $data = $request->only(['nombre']);

        $producto =   $this->productosModel->insertarProducto($data);

        if ($producto) {
            return response()->json([
                'status' => 'success',
                'message' => 'Producto insertado exitosamente'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al insertar el producto'
            ]);
        }
    }


    public function editar(Request $request){

        $id = $request->input('idproducto',0);

        $data = $request->only(['nombre']);

        $producto =   $this->productosModel->actualizarProducto($id,$data);

        if ($producto) {
            return response()->json([
                'status' => 'success',
                'message' => 'Producto editado exitosamente'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al editar el producto'
            ]);
        }
    }

    public function estado(Request $request){

        $id = $request->input('idproducto',0);

        $data = $request->only(['nombre','estado']);

        $producto =   $this->productosModel->actualizarProducto($id,$data);

        if ($producto) {
            if($request->input('estado')==1){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Producto activado exitosamente'
                ]);
            }else{
                return response()->json([
                    'status' => 'success',
                    'message' => 'Producto desactivado exitosamente'
                ]);
            }       
        } else {
            if($request->input('estado')==1){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error al activar el producto'
                ]);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error al desactivar el producto'
                ]);
            }
        
        }
    }
}
