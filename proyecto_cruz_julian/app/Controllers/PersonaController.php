<?php

namespace App\Controllers;

use App\Models\PersonaModel;
use App\Models\CategoriaModel;
use App\Models\ProductoModel;
use App\Models\ConsultaModel;
Use App\Models\VentaModel;
Use App\Models\DetalleVentaModel;

class PersonaController extends BaseController {


    public function vista_registrarse(){

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $data['titulo'] = 'Registrarse - MEGATECH';
        echo view('/plantillas/header', $data);
        echo view('/plantillas/nav');
        echo view('registrarse');
        echo view('/plantillas/footer');
    }

    public function vista_ingresar(){

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $data['titulo'] = 'Ingresar - MEGATECH';
        echo view('/plantillas/header', $data);
        echo view('/plantillas/nav');
        echo view('ingresar');
        echo view('/plantillas/footer');
    }

    public function registrar_usuario(){

        $request = \Config\Services::request();
        $validations = \Config\Services::validation();
        
        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        if($request->is('post')){
            $rules = [
                'nombre' => 'required|max_length[50]',
                'apellido' => 'required|max_length[50]',
                'telefono' => 'required|numeric|is_natural|max_length[25]',
                'dni' => 'required|numeric|is_natural|max_length[25]',
                'mail' => 'required|valid_email|is_unique[personas.persona_mail]|max_length[60]',
                'pass' => 'required|min_length[5]|max_length[200]',
                'repass' => 'required|min_length[5]|matches[pass]|max_length[200]'
            ];

            $validations = $this->validate($rules);

            if($validations){

                $data = [
                    'persona_apellido' => $request->getPost('apellido'),
                    'persona_nombre' => $request->getPost('nombre'),
                    'persona_telefono' => $request->getPost('telefono'),
                    'persona_dni' => $request->getPost('dni'),
                    'persona_mail' => $request->getPost('mail'),
                    'persona_password' => password_hash($request->getPost('pass'), PASSWORD_BCRYPT),
                    'perfil_id' => 1,
                    'persona_estado' => 1     
                ];

                $registro = new PersonaModel();
                $registro->insert($data);
                return redirect()->to('registrarse')->with('Mensaje', 'Usuario registrado exitosamente!');
            } else {
                $data['validations'] = $this->validator;
                $data['titulo'] = 'Registrarse';
                return view('plantillas/header', $data).view('plantillas/nav').view('registrarse').view('plantillas/footer');
                
            }
        }
    }

    public function login_usuario(){

        $request = \Config\Services::request();
        $session = \Config\Services::session();
        $validation = \Config\Services::validation();

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $validation->setRules(
            [
                'mail' => 'required|valid_email|',
                'pass' => 'required|min_length[5]',
            ],
            [
                "mail" => [
                    "required" => "Debe ingresar un correo electrónico.",
                    "valid_email" => "Debe ingresar un correo electrónico válido.",
                ],
                "pass" => [
                    "required" => "Debe ingresar una contraseña.",
                    "min_length" => "La contraseña debe tener por lo menos 5 caracteres."
                ],
            ]
        );

        if ($validation->withRequest($this->request)->run()) {

            $userModel = new PersonaModel();

            $mail = $request->getPost('mail');
            $pass = $request->getPost('pass');
            $user = $userModel->where('persona_mail', $mail)->first();
            
            if($user){

                $pass_user = $user['persona_password'];
                $pass_verif = password_verify($pass, $pass_user);

                    if($pass_verif){
                        $data = [
                            'id' => $user['id_persona'],
                            'nombre' => $user['persona_nombre'],
                            'apellido' => $user['persona_apellido'],
                            'perfil' => $user['perfil_id'],
                            'login' => TRUE
                        ];
                        $session->set($data);

                        switch(session('perfil')){
                            case '1':
                                return redirect()->route('/');
                                break;
                            case '2':
                                return redirect()->route('admin_panel');
                                break;
                        }

                    } else {// if passverif
                        $session->setFlashdata('Mensaje', 'Correo y/o contraseña incorrecto');
                        return redirect()->route('ingresar');
                    }

            } else { // if user
                $session->setFlashdata('Mensaje', 'Correo y/o contraseña incorrecto');
                return redirect()->route('ingresar');
            }

        } else {
            $data['validation'] = $this->validator;
            $data['titulo'] = 'Iniciar Sesión';
            echo view('plantillas/header', $data);
            echo view('plantillas/nav');
            echo view('ingresar');
            echo view('plantillas/footer');
        } 
    }

    public function cerrar_sesion(){
        $session = session();
        $session->destroy();
        return redirect()->route('ingresar');
    }

    public function mis_compras()
    {
        $ventas = new VentaModel();
        $detalle = new DetalleVentaModel();

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();


        $session = session();

        $data['compras'] = $ventas->join('personas', 'personas.id_persona = venta.id_cliente')->where('id_cliente', session('id'))->findAll();
 
        $data['titulo'] = 'Mis Compras - MEGATECH';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('backend/mis_compras');
        echo view('plantillas/footer');
    }

    public function detalle_compra($id=null) {
        $detalle = new DetalleVentaModel();
        $venta = new VentaModel();

        $categoria = new CategoriaModel();
        $productoModel = new ProductoModel();

        $data['categorias_dropdown'] = $categoria->findAll();
        $data['producto_dropdown'] = $productoModel->join('producto_categoria', 'producto_categoria.categoria_id = productos.producto_categoria')->findAll();

        $data['venta'] = $venta->where('venta_id', $id)->join('personas', 'personas.id_persona = venta.id_cliente')->first();

        $data['detalle'] = $detalle->where('detalle_venta.id_venta', $id)->join('venta', 'venta.venta_id = detalle_venta.id_venta')->join('productos', 'productos.producto_id = detalle_venta.id_producto')->findAll();

        $data['titulo'] = 'Detalle de la Compra - MEGATECH';
        echo view('plantillas/header', $data);
        echo view('plantillas/nav');
        echo view('backend/detalle_compra');
        echo view('plantillas/footer');
    }

}
?>