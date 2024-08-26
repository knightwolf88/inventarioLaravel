<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'idproducto';

    protected $fillable = ['nombre', 'pcosto', 'pventa', 'estado','idusuario'];

    public $timestamps = false;

     // Método para obtener todos los productos
     public function obtenerTodosLosProductos()
     {
         return $this->all();
     }

    // Método para obtener el conteo total de productos
    public  function contarTotalProductos()
    {
        return $this->count();
    }

    public  function obtenerDatoProducto($id)
    {
        return $this->find($id);
    }

    public  function insertarProducto($data)
    {
        return $this->create($data);
    }

    public function actualizarProducto($id, $data)
    {
        $producto = $this->find($id);
        if ($producto) {
            return $producto->update($data);
        }
        return false;
    }

    public function actualizarEstadoProducto($id, $data)
    {
        $producto = $this->find($id);
        if ($producto) {
            return $producto->update($data);
        }
        return false;
    }
}


