<?php
//App::uses('AppController', 'Controller');
//App::uses('AuthComponent', 'Controller/Component');

class UsuariosController extends AppController {
    public $helpers = array('Html', 'Form');

    //El index de usuarios es el registro de un nuevo usuario
    public function index() {
        $this->layout = 'faq_life';
        if ($this->request->is('post')) {
            $this->Usuario->create();
            if ($this->data['Usuario']['foto']['name'] != null) {
                $file = new File($this->data['Usuario']['foto']['tmp_name']);
				$type = $this->request->data['Usuario']['foto']['type'];
				if ($type != 'image/jpeg') {
					$this->Session->setFlash(__('Only you can upload JPG or PNG images'));
					$this->render();
				} else {
					$filename = $this->data['Usuario']['username'];
					$data = $file->read();
					$file->close();
					$file = new File(WWW_ROOT.'/img/img_users/'.$filename.".jpg",true);
					$file->write($data);
					$file->close();
                    $this->data['Usuario']['foto'] = $this->data['Usuario']['foto']['name'];
                    $this->request->data['Usuario']['foto'] = "img_users/".$this->data['Usuario']['username'].".jpg";
				}
			} else {
                $this->request->data['Usuario']['foto'] = "img_users/default.png";
            }
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->success(__('The user has been created'));
                $this->redirect(array('controller' => 'preguntas', 'action' => 'index'));
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
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
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
        if($this->Session->check('Auth.User')){
            $this->redirect(array('action' => 'index'));
        }
        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                //Seleccionar el idioma definido por el usuario
                $username = $this->request->data['Usuario']['username'];
                $usu = $this->Usuario->find('all', array('conditions'=> array ('Usuario.username' => $username)));
                $idioma = $usu['0']['Usuario']['idioma'];
                $this->setIdioma($idioma);

                $this->Flash->success(__('Welcome, '. $this->Auth->user('username')));
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->warning(__('Invalid username or password'));
            }
        }
        $this->Flash->error("Lo sentimos pero debes loguearte primero.");
        $this->redirect(array("controller"=>"preguntas", "action"=>"index"));
    }

     public function logout() {
         $this->Auth->logout();
         $this->redirect(array("controller"=>"preguntas", "action"=>"index"));
    }}
?>
