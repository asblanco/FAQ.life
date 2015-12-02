<?php
class RespuestasController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');

    public function responder() {
        if ($this->request->is('post')) {
            //print_r($this->request->data); die();
            $this->request->data['Respuesta']['fecha_res'] = date('Y-m-d H:i:s');
            $this->request->data['Respuesta']['usuario_id'] = $this->Auth->user('id');
            $idPregunta = $this->request->data['Respuesta']['id'];
            $this->request->data['Respuesta']['pregunta_id'] = $idPregunta;
            $this->request->data['Respuesta']['id'] = null;
            
            //Guardar los datos de la nueva respuesta
            if ($this->Respuesta->save($this->request->data)) {
                //Actualizar el contador de numero de respuestas de la pregunta
                $pregunta = ClassRegistry::init('Pregunta')->findById($idPregunta);
                $numResp = $pregunta['Pregunta']['respuestas'];
                $numResp += 1;
                ClassRegistry::init('Pregunta')->updateAll(
                    array('Pregunta.respuestas' => "'$numResp'"),
                    array('Pregunta.id' => "$idPregunta")
                );
                
                //Mostrar mensaje de confirmacion y redirigir
                $this->Flash->success('Your answer has been saved.');
                $this->redirect(array('controller' => 'preguntas', 'action' => 'view/', $idPregunta));
            }
        }
    }
    
        public function votarPositivo (){
        //$this->autoRender = false;
        if ($this->request->is('post')) {
            //Actualizar el contador de numero de respuestas de la pregunta
            $id = $this->request->data['Respuesta']['id'];
            $respuesta = $this->Respuesta->findById($id);
            $numPositivos = $respuesta['Respuesta']['positivos'];
            $numPositivos += 1;
            
            $this->Respuesta->updateAll(
                array('Respuesta.positivos' => "'$numPositivos'"),
                array('Respuesta.id' => "$id")
            );
            $this->redirect(array('controller' => 'preguntas', 'action' => 'view', $id));
        }
    }
    
    public function votarNegativo (){
        //$this->autoRender = false;
        if ($this->request->is('post')) {
            //Actualizar el contador de numero de respuestas de la pregunta
            $id = $this->request->data['Respuesta']['id'];
            $respuesta = $this->Respuesta->findById($id);
            $numPositivos = $respuesta['Respuesta']['negativos'];
            $numPositivos += 1;
            
            $this->Respuesta->updateAll(
                array('Respuesta.negativos' => "'$numPositivos'"),
                array('Respuesta.id' => "$id")
            );
            $this->redirect(array('controller' => 'preguntas', 'action' => 'view', $id));
        }
    }
}
?>
