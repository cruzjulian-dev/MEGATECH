<?php

namespace App\Controllers;

use App\Models\ConsultaModel;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class ConsultaController extends BaseController {

    public function registrar_consulta(){

        $request = \Config\Services::request();
        $validations = \Config\Services::validation();

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        if($request->is('post')){

            $rules = [
                'nombre' => 'required',
                'mail' => 'required|valid_email',
                'asunto' => 'required',
                'consulta' => 'required'        
            ];

            $validations = $this->validate($rules);

            if($validations){
                $data = [
                    'nombre' => $request->getPost('nombre'),
                    'mail' => $request->getPost('mail'),
                    'asunto' => $request->getPost('asunto'),
                    'consulta' => $request->getPost('consulta')
                ];
                $consulta = new ConsultaModel();
                $consulta->insert($data);
                
                return redirect()->to('contacto')->with('Mensaje', 'Su consulta se ha enviado correctamente.');
            } else {

                $data['validations'] = $this->validator;
                $data['titulo'] = 'Contacto';
                echo view('plantillas/header', $data).view('plantillas/nav').view('contacto').view('plantillas/footer');
                
            }
        }
    }

    public function vista_consultas(){

        $consultaModel = new ConsultaModel();
        $data['consulta'] = $consultaModel->findAll();

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();
        $data['titulo'] = 'Ver Consultas - MEGATECH';

        echo view('/plantillas/header', $data);
        echo view('/plantillas/nav');
        echo view('backend/ver_consultas');
        echo view('/plantillas/footer');
    }

    public function consulta_visto($id){
        $data = array('consulta_leido' => 1);
        $consultaModel = new ConsultaModel();
        $consultaModel->update($id, $data);
        return redirect()->to('ver_consultas')->with('Mensaje', 'Se ha marcado como <b>visto</b> el mensaje.');
        
    }

    public function consulta_noVisto($id){
        $data = array('consulta_leido' => 0);
        $consultaModel = new ConsultaModel();
        $consultaModel->update($id, $data);
        return redirect()->to('ver_consultas')->with('Mensaje', 'Se ha marcado como <b>no visto</b> el mensaje.');
    }
}
?>