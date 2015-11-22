<?php
App::uses('AppController', 'Controller');

class UsuariosController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('registro');
    }

    //El index de usuarios es el registro de un nuevo usuario
    public function index() {
        $this->layout = 'faq_life';
        if ($this->request->is('post')) {
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
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
                return $this->redirect(array('action' => 'index'));
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

}
?>