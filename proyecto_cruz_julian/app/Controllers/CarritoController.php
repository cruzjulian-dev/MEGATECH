<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;


class CarritoController extends BaseController
{

    public function vista_carrito(){

        $cart = \Config\Services::cart();
        
        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();
        $data['titulo'] = 'Carrito de compras';

        echo view('/plantillas/header', $data);
        echo view('/plantillas/nav');
        echo view('backend/ver_carrito');
        echo view('/plantillas/footer');
    }

    public function agregar_carrito(){
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();

        $data = array(
            'id' => $request->getPost('id'),
            'name' => $request->getPost('descripcion'),
            'price' => $request->getPost('precio'),
            'qty' => 1
        );

        $cart->insert($data);
        
        return redirect()->route('ver_carrito');
    }

    public function borrar_carrito($id){
        $cart = \Config\Services::cart();
		if ($id==="all")
		{
			$cart->destroy();
		}
		else{ 

            $cart->remove($id);

		}
		
        return redirect()->route('ver_carrito');
    }
    

}

?>