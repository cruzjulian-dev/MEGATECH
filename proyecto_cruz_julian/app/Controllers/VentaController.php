<?php

namespace App\Controllers;
Use App\Models\PersonaModel;
Use App\Models\ProductoModel;
Use App\Models\CategoriaModel;
Use App\Models\VentaModel;
Use App\Models\DetalleVentaModel;

class VentaController extends BaseController
{
    public function guardar_venta($total=null) {
        $cart = \Config\Services::cart();
        $venta = new VentaModel();
        $detalle_venta = new DetalleVentaModel();
        $productos = new ProductoModel();

        $cart1 = $cart->contents();

        foreach($cart1 as $item) {
            $producto = $productos->where('producto_id', $item['id'])->first();
            if($producto['producto_stock'] < $item['qty']) {
                return redirect()->route('ver_carrito')->with('MensajeStock', 'Por el momento no contamos con el stock suficiente.');
            }
        }

        $data = array(
            'id_cliente' => session('id'),
            'venta_fecha' => date('Y-m-d'),
            'venta_total' => $total
        );

        $venta_id = $venta->insert($data);


        
        $cart1 = $cart->contents();

        foreach($cart1 as $item) { 
            
            $detalle = array(
                'id_venta' => $venta_id,
                'id_producto' => $item['id'],
                'detalle_cantidad' => $item['qty'],
                'detalle_precioUnitario' => $item['price'],
                'detalle_precioTotal' => $item['price'] * $item['qty']
            );
            

            $productos->where('producto_id', $item['id'])->set('producto_stock', 'producto_stock - ' . $item['qty'], false)->update();
            $productos->where('producto_id', $item['id'])->set('producto_vendidos', 'producto_vendidos + ' . $item['qty'], false)->update();

            $detalle_venta->insert($detalle);
        }
        $cart->destroy();
        return redirect()->to('ver_carrito')->with('Mensaje', 'Encontrarás los detalles de su compra en la sección <b>Mis Compras</b>. Muchas gracias por elegirnos!');
    }

    public function listar_ventas()
    {
        $ventas = new VentaModel();
        $detalle = new DetalleVentaModel();

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $data['ventas'] = $ventas->join('personas', 'personas.id_persona = venta.id_cliente')->findAll();
 
        $data['titulo'] = 'Listado de Ventas - MEGATECH';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('backend/listar_ventas');
        echo view('plantillas/footer');
    }

    public function listar_masVendidos()
    {
        $ventas = new VentaModel();
        $detalle = new DetalleVentaModel();

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $masVendidos = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->orderBy('producto_vendidos', 'DESC')->findAll();

        $data['mas_vendidos'] = $masVendidos;

        $data['categorias'] = $categoria->findAll();
 
        $data['titulo'] = 'Listado de Ventas - MEGATECH';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('backend/listar_masVendidos');
        echo view('plantillas/footer');
    }

    public function ver_detalle($id=null) {
        $detalle = new DetalleVentaModel();
        $venta = new VentaModel();

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $data['venta'] = $venta->where('venta_id', $id)->join('personas', 'personas.id_persona = venta.id_cliente')->first();

        $data['detalle'] = $detalle->where('detalle_venta.id_venta', $id)->join('venta', 'venta.venta_id = detalle_venta.id_venta')->join('productos', 'productos.producto_id = detalle_venta.id_producto')->findAll();

        $data['titulo'] = 'Detalle de la Venta - MEGATECH';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('backend/detalle_venta');
        echo view('plantillas/footer');
    }
}