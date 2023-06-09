<?php
namespace App\Controllers;
use App\Models\mensajes_model;
use CodeIgniter\Controller;

class Mensaje_controller extends Controller{

    public function __construct() {
        helper(['form', 'url', 'html']);
    }

    public function index(){
        helper(['form', 'url', 'html']);

        $data = array('titulo' => 'Contacto');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/contacto/contacto') 
        . view('front/pie');

    }

    public function enviarMensaje(){

        $input = $this->validate([
            'nombre'   => 'required|min_length[3]|max_length[100]',
            'email'    => 'required|min_length[4]|max_length[50]|valid_email',
            'mensaje'  => 'required|min_length[3]|max_length[1000]'
        ],);

        $formModel = new Mensajes_model();

        if (!$input) {
            session()->setFlashdata('success', 'Exceso de Caracteres en el mensaje');
            $data['titulo']='contacto'; 
             echo view('front/header',$data);
             echo view('front/navbar');
             echo view('back/contacto/contacto', ['validation' => $this->validator]);
             echo view('front/pie');
        } else {
            $mensajeData = [
                'nombre' => $this->request->getVar('nombre'),
                'email'=> $this->request->getVar('email'),
                'mensaje'=> $this->request->getVar('mensaje')
            ];
            $mensaje = new Mensajes_model();
            $mensaje->insert($mensajeData);

            // Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
            session()->setFlashdata('success', 'Mensaje enviado con exito');
            return $this->response->redirect(base_url('/contacto'));
   
        }
    }

    public function adminMensajes(){
        $mensajeModel = new Mensajes_model();
        $listaMensajes['mensajes'] = $mensajeModel->orderBy('id', 'DESC')->where('leído', 'NO')->findAll();

        $data = array('titulo' => 'Administrar Productos');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/contacto/administrarMensajes', $listaMensajes) 
        . view('front/pie');
    }

    public function adminMensajesLeidos(){
        $mensajeModel = new Mensajes_model();
        $listaMensajes['mensajes'] = $mensajeModel->orderBy('id', 'DESC')->where('leído', 'SI')->findAll();

        $data = array('titulo' => 'Administrar Productos');
        return view('front/header', $data) 
        . view('front/navbar') 
        . view('back/contacto/administrarMensajesLeidos', $listaMensajes) 
        . view('front/pie');
    }

    public function leerMensaje($id){
        $mensajeModel = new Mensajes_model();
        $data = ['leído' => 'SI'];

        $mensajeModel->update($id, $data);

        return $this->response->redirect(base_url('/administrarMensajes'));
    }

    public function mensajeNoLeido($id){
        $mensajeModel = new Mensajes_model();
        $data = ['leído' => 'NO'];

        $mensajeModel->update($id, $data);

        return $this->response->redirect(base_url('/administrarMensajesLeidos'));
    }

    public function verMensaje($id){
        $mensajeModel = new Mensajes_model();

        $mensaje['mensaje'] = $mensajeModel->getMensaje($id);

        $data = array('titulo' => 'Mensaje');

        return view('front/header', $data) 
        . view('front/navbar')
        . view('back/contacto/verMensaje', $mensaje) 
        . view('front/pie');
    }

}