<?php
class RespuestasController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');

    public function responder() {
        // print_r($this->request->data); die();
        // print_r($this->params->url); die();
        if ($this->request->is('post')) {
            // $this->request->data['Respuesta']['id'] = null;
            $this->request->data['Respuesta']['fecha_res'] = date('Y-m-d H:i:s');
            $this->request->data['Respuesta']['usuario_id'] = $this->Auth->user('id');
            $this->request->data['Respuesta']['pregunta_id'] = $this->request->data['Respuesta']['id']; //43; //$this->request->data['Respuesta']['pregunta_id'];
            $this->request->data['Respuesta']['id'] = null;
            // print_r($this->request->data); die();
            if ($this->Respuesta->save($this->request->data)) {
                $this->Flash->success('Your answer has been saved.');
                $this->redirect(array('controller' => 'preguntas', 'action' => 'view/', $this->request->data['Respuesta']['pregunta_id']));
            }
        }
        // $this->layout = 'faq_life';
        // $this->set('preguntas', $this->Pregunta->find('all'));
        // $this->set('categorias', ClassRegistry::init('Categoria')->find('all'));
        // return $this->render('/preguntas/index');
    }
}
?>
