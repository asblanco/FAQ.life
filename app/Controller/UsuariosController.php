<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

class UsuariosController extends AppController {
    public $helpers = array('Html', 'Form');
    
     public function beforeFilter() {
         $this->Auth->allow('index', 'view');
         
        
    }
    
    //El index de usuarios es el registro de un nuevo usuario
    public function index() {
        $this->layout = 'faq_life';
        if ($this->request->is('post')) {
                 
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->success(__('The user has been created'));
                $this->redirect(array('action' => '../preguntas/index'));
            } else {
                $this->Flash->set(__('The user could not be created. Please, try again.'));
            }   
        }
    }

    public function view($id = null) {
        $this->layout = 'faq_life';
        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('usuario', $this->Usuario->findById($id));
    }

    public function edit($id = null) {
        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => '../usuarios/index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->Usuario->findById($id);
            unset($this->request->data['Usuario']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->allowMethod('post');

        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->Usuario->delete()) {
            $this->Flash->success(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }
    
    public function login() {
        
        $this->layout = 'faq_life';
        //if already logged-in, redirect
        if($this->Session->check('Auth.Usuario')){
            $this->redirect(array('action' => 'index'));      
        }
         
        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {
            print_r($this->request->data);
            
            if ($this->Auth->login()) {
                $this->Flash->success(__('Welcome, '. $this->Auth->user('username')));
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->warning(__('Invalid username or password'));
            }
        } 
        $this->Flash->error("fuera de aqui!");
        $this->redirect(array("controller"=>"preguntas", "action"=>"index"));
    }
 public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}
?>