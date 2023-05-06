<?php
namespace App\Controllers;
use App\Models\Usuarios_model;
use CodeIgniter\Controller;

class Usuarios_controller extends Controller {

    public function __construct() {
        helper(['form', 'url']);
    }

    public function create(){
        $data =array('titulo' => 'Registro');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/usuario/nuevoUsuario') 
        . view('front/pie');
    }

    public function formValidation() {
             
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario'  => 'required|min_length[3]',
            'pass'     => 'required|min_length[3]|max_length[10]'
        ],
        
       );
        $formModel = new Usuarios_model();
     
        if (!$input) {
               $data['titulo']='Registro'; 
                echo view('front/head_view',$data);
                echo view('front/nav_view');
                //echo view('back/usuario/registrarse', ['validation' => $this->validator]);
                echo view('back/usuario/registro', ['validation' => $this->validator]);
                echo view('front/footer_view');

        } else {
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido'=> $this->request->getVar('apellido'),
                'usuario'=> $this->request->getVar('usuario'),
                'email'=> $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
              //  password_hash() crea un nuevo hash de contraseña usando un algoritmo de hash de único sentido.
            ]);  
              //return $this->response->redirect(site_url(''));

            // Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
               session()->setFlashdata('success', 'Usuario registrado con exito');
               return $this->response->redirect(site_url('/registro'));
      
        }
    }
}