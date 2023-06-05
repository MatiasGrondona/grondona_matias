<?php
namespace App\Controllers;
use App\Models\usuarios_model;
use CodeIgniter\Controller;

class Usuarios_controller extends Controller {

    public function __construct() {
        helper(['form', 'url', 'html']);
    }

    public function create(){
        $data = array('titulo' => 'Registro');
        echo view('front/header', $data);
        echo view('front/navbar');
        echo view('back/usuario/nuevoUsuario');
        echo view('front/pie');
    }

    public function formValidation() {
             
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]|max_length[30]',
            'apellido' => 'required|min_length[3]|max_length[30]',
            'email'    => 'required|min_length[4]|max_length[50]|valid_email|is_unique[usuarios.email]',
            'usuario'  => 'required|min_length[3]|max_length[20]|is_unique[usuarios.usuario]',
            'pass'     => 'required|min_length[3]|max_length[50]'
        ],
        
       );
        $formModel = new Usuarios_model();
     
        if (!$input) {
               $data['titulo']='Registro'; 
                echo view('front/header',$data);
                echo view('front/navbar');
                echo view('back/usuario/registro', ['validation' => $this->validator]);
                echo view('front/pie');
        } else {
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido'=> $this->request->getVar('apellido'),
                'email'=> $this->request->getVar('email'),
                'usuario'=> $this->request->getVar('usuario'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
                //password_hash() crea un nuevo hash de contraseña usando un algoritmo de hash de único sentido.
            ]);  
                //return $this->response->redirect(site_url('/home'));

            // Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
               session()->setFlashdata('success', 'Usuario registrado con exito');
               return $this->response->redirect(base_url('/home'));
      
        }
    }

    public function adminUsuarios(){
        $usuarioModel = new Usuarios_model();
        $listaUsuarios['usuarios'] = $usuarioModel->orderBy('id', 'DESC')->where('baja', 'NO')->findAll();

        $data = array('titulo' => 'Administrar Usuarios');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/usuario/adminUsuarios', $listaUsuarios) 
        . view('front/pie');
    }

    public function adminUsuariosBaja(){
        $usuarioModel = new Usuarios_model();
        $listaUsuarios['usuarios'] = $usuarioModel->orderBy('id', 'DESC')->where('baja', 'SI')->findAll();

        $data = array('titulo' => 'Usuarios de BAJA');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/usuario/adminUsuariosBaja', $listaUsuarios) 
        . view('front/pie');
    }

    public function bajaUsuario(){

    }

    public function altaUsuario(){

    }

    public function editarUsuario(){
        
    }
}