<?php

namespace App\Controllers;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class Home extends BaseController
{

    public function index()
    {
        $data['titulo'] = 'Inicio - MEGATECH';

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $ultimosIngresos = $productoModel->orderBy('created_at', 'DESC')->findAll();

        $data['ingresos'] = $ultimosIngresos;

        $masVendidos = $productoModel->orderBy('producto_vendidos', 'DESC')->findAll();

        $data['vendidos'] = $masVendidos;



        echo view('/plantillas/header', $data);
        echo view('/plantillas/nav');
        echo view('principal');
        echo view('/plantillas/footer');
    }

    public function contacto(){

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $data['titulo'] = 'Contacto - MEGATECH';
        echo view('/plantillas/header', $data);
        echo view('/plantillas/nav');
        echo view('contacto');
        echo view('/plantillas/footer');
    }

    public function nosotros()
    {
        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $data['titulo'] = 'Nosotros - MEGATECH';
        echo view('/plantillas/header', $data);
        echo view('/plantillas/nav');
        echo view('nosotros');
        echo view('/plantillas/footer');
    }

    public function comercializacion(){

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $data['titulo'] = 'Comercializacion - MEGATECH';
        echo view('/plantillas/header', $data);
        echo view('/plantillas/nav');
        echo view('comercializacion');
        echo view('/plantillas/footer');
    }

    public function terminos(){

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $data['titulo'] = 'Terminos y condiciones - MEGATECH';
        echo view('/plantillas/header', $data);
        echo view('/plantillas/nav');
        echo view('terminos');
        echo view('/plantillas/footer');
    }

    public function preguntas_freq(){

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $data['titulo'] = 'Preguntas frecuentes - MEGATECH';
        echo view('/plantillas/header', $data);
        echo view('/plantillas/nav');
        echo view('preguntas_freq');
        echo view('/plantillas/footer');
    }

    public function vista_catalogo($id){

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        if($id === "0"){
            $data['categoria'] = $categoria->findAll();
            $data['producto'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

            $data['titulo'] = 'Catálogo - MEGATECH';
            echo view('/plantillas/header', $data);
            echo view('/plantillas/nav');
            echo view('catalogo_todos');
            echo view('/plantillas/footer');
        } else {
            $data['categoria'] = $categoria->where('categoria_id', $id)->first();
            $data['producto'] = $productoModel->where('producto_categoria', $id)->findAll();
            
            $data['titulo'] = 'Catálogo - MEGATECH';
            echo view('/plantillas/header', $data);
            echo view('/plantillas/nav');
            echo view('catalogo_productos');
            echo view('/plantillas/footer');
        }

    }

    public function carrito(){

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $data['titulo'] = 'Carrito - MEGATECH';
        echo view('/plantillas/header', $data);
        echo view('/plantillas/nav');
        echo view('carrito');
        echo view('/plantillas/footer');
    }
}