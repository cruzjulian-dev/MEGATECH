<?php

namespace App\Controllers;

use App\Models\ConsultaModel;
use App\Models\PersonaModel;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;
use App\Controllers\ProductoController;


class AdminController extends BaseController
{

    public function vista_admin(){

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $data['titulo'] = 'Administrador - MEGATECH';
        echo view('/plantillas/header', $data);
        echo view('/plantillas/nav');
        echo view('backend/panel');
        echo view('/plantillas/footer');
    }

    public function vista_agregarProducto() {

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();
        $categorias['producto'] = $categoria->findAll();

        $data['titulo'] = 'Agregar Producto';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('backend/agregar_producto', $categorias);
        echo view('plantillas/footer');
    }

    public function registrar_producto()
    {

        $request = \Config\Services::request();

        if ($request->is('post')) {
            $rules = [
                'descripcion' => 'required',
                'precio' => 'required|numeric|decimal|greater_than[0]',
                'categoria' => 'required|is_not_unique[producto_categoria.categoria_id]',
                'imagen' => 'uploaded[imagen]|max_dims[imagen,900,900]',
                'stock' => 'required|is_natural',
                'vendidos' => 'required|is_natural'
            ];

            $validations = $this->validate($rules);

            if ($validations) {
                $img = $this->request->getFile('imagen');
                $nombre_aleatorio = $img->getRandomName();
                $img->move(ROOTPATH.'assets/img/catalogo/subidas', $nombre_aleatorio);

                $data = [
                    'producto_descripcion' => $request->getPost('descripcion'),
                    'producto_categoria' => $request->getPost('categoria'),
                    'producto_precio' => $request->getPost('precio'),
                    'producto_stock' => $request->getPost('stock'),
                    'producto_vendidos' => $request->getPost('vendidos'),
                    'producto_imagen' => $nombre_aleatorio,
                    'producto_estado' => 1
                ];

                $registroProducto = new ProductoModel();
                $registroProducto->insert($data);

                return redirect()->to('agregar_producto')->with('Mensaje', 'Producto agregado correctamente.');
            } else {
                $this->vista_agregarProducto();
            }
        }
    }

}

?>