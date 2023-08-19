<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;


class ProductoController extends BaseController
{

    public function vista_gestionarProductos(){

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $data['categorias'] = $categoria->findAll();
        $data['producto'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();
        $data['titulo'] = 'Gestionar Productos - MEGATECH';

        echo view('/plantillas/header', $data);
        echo view('/plantillas/nav');
        echo view('backend/gestionar_productos');
        echo view('/plantillas/footer');
    }

    public function vista_editarProducto($id=null){

        $productoModel = new ProductoModel();
        $categoria = new CategoriaModel();

        $productoModel = new ProductoModel();
        $categoria = new CategoriaModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $data['categorias'] = $categoria->findAll();
        $data['producto'] = $productoModel->where('producto_id', $id)->first();
        $data['titulo'] = 'Editar Producto - MEGATECH';

        echo view('/plantillas/header', $data);
        echo view('/plantillas/nav');
        echo view('backend/editar_producto');
        echo view('/plantillas/footer');
    }

    public function actualizar_prod(){

        $request = \Config\Services::request();

        $id_producto = $this->request->getPost('producto_id');
        $precio = $this->request->getPost('producto_precio');

        if ($request->is('post')) {
            
            if($this->request->getFile('imagen')->isValid()) {
                
                $rules = [
                    'descripcion' => 'required',
                    'precio' => 'required|numeric|decimal|greater_than[0]',
                    'categoria' => 'required|is_not_unique[producto_categoria.categoria_id]',
                    'imagen' => 'uploaded[imagen]|max_dims[imagen,900,900]',
                    'stock' => 'required|is_natural',
                    'vendidos' => 'required|is_natural'
                ];

                $validations = $this->validate($rules);

                $img = $this->request->getFile('imagen');
                $nombre_aleatorio = $img->getRandomName();
                $img->move(ROOTPATH . '/assets/img/catalogo/subidas', $nombre_aleatorio);
                
                $data = [
                    'producto_descripcion' => $request->getPost('descripcion'),
                    'producto_categoria' => $request->getPost('categoria'),
                    'producto_precio' => $request->getPost('precio'),
                    'producto_stock' => $request->getPost('stock'),
                    'producto_vendidos' => $request->getPost('vendidos'),
                    'producto_imagen' => $nombre_aleatorio,
                    'producto_estado' => 1
                ];

            }else {

                $rules = [
                    'descripcion' => 'required',
                    'precio' => 'required|numeric|decimal|greater_than[0]',
                    'categoria' => 'required|is_not_unique[producto_categoria.categoria_id]',
                    'stock' => 'required|is_natural',
                    'vendidos' => 'required|is_natural'
                ];

                $validations = $this->validate($rules);

                $data = [
                    'producto_descripcion' => $request->getPost('descripcion'),
                    'producto_categoria' => $request->getPost('categoria'),
                    'producto_precio' => $request->getPost('precio'),
                    'producto_stock' => $request->getPost('stock'),
                    'producto_vendidos' => $request->getPost('vendidos'),
                    'producto_estado' => 1
                ];
                
            }

            if ($validations) {  
                
                $productoModel = new ProductoModel();

                $productoModel->update($id_producto, $data);

                return redirect()->to('gestionar_productos')->with('Mensaje', 'El producto se ha actualizado correctamente.');
            }else {
                $data['validation'] = $this->validator;
                $productoModel = new ProductoModel();
                $categoria = new CategoriaModel();

                $data['categorias_dropdown'] = $categoria->findAll();
                $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

                $data['categorias'] = $categoria->findAll();
                $data['producto'] = $productoModel->where('producto_id', $id_producto)->first();

                $data['titulo'] = 'Editar Producto - MEGATECH';
                echo view('plantillas/header', $data);
                echo view('plantillas/nav');
                echo view('backend/editar_producto');
                echo view('plantillas/footer');
            }
        }else {
            $data['validation'] = $this->validator;
            $productoModel = new ProductoModel();
            $categoria = new CategoriaModel();

            $data['categorias_dropdown'] = $categoria->findAll();
            $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

            $data['categorias'] = $categoria->findAll();
            $data['producto'] = $productoModel->where('producto_id', $id_producto)->first();

            $data['titulo'] = 'Editar Producto - MEGATECH';
                echo view('plantillas/header', $data);
                echo view('plantillas/nav');
                echo view('backend/editar_producto');
                echo view('plantillas/footer');
        }
    }


    

    public function eliminar_prod($id=null){
        $data = array('producto_estado' => 0);
        $productoModel = new ProductoModel();
        $productoModel->update($id, $data);
        return redirect()->to('gestionar_productos')->with('Mensaje', 'El estado del producto se actualizó correctamente.');
        
    }

    public function activar_prod($id=null){
        $data = [
            'producto_estado' => '1'
        ];
        $productoModel = new ProductoModel();
        $productoModel->update($id, $data);
        return redirect()->to('gestionar_productos')->with('Mensaje', 'El estado del producto se actualizó correctamente.');
    }
    

}

?>