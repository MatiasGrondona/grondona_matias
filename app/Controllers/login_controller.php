<?php
namespace App\Controllers;
use App\Models\usuarios_model;
use CodeIgniter\Controller;

class Login_controller extends Controller{
    
    public function index() {
        helper(['form', 'url', 'html']);
        
        $data = array('titulo' => 'Iniciar Sesión');
        echo view('front/header', $data);
        echo view('front/navbar', $data);
        echo view('front/login');
        echo view('front/pie');
    }

    public function auth(){
        /*
        echo password_hash("1234", PASSWORD_DEFAULT);
        return;
        */
        $session = session();
        $model = new usuarios_model();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');
        $data = $model->where('email', $email)->first();

        if($data){
            $pass = $data['pass'];
            $ba = $data['baja'];
            //Si el usuario esta dado de baja no puede ingresar
            if($ba == 'SI'){
                session()->setFlashdata('success', 'Usuario dado de baja');
                return redirect()->to(base_url('/login'));
            }

            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id'       => $data['id'],
                    'nombre'   => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'email'    => $data['email'],
                    'usuario'  => $data['usuario'],
                    'perfil_id'=> $data['perfil_id'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('/home'));
            }else{
                //estoy teniendo un error donde no pasa el verify_pass
                session()->setFlashdata('success', 'Contraseña Incorrecta');
                return redirect()->to(base_url('/login'));
            }
        }else{
            $session->setFlashdata('success', 'El Email no Existe o es Incorrecto');
            return redirect()->to(base_url('/login'));
        }
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/login'));
    }
}