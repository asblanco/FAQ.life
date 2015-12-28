<?php
class RvotosController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');

    public function index() {
        $this->set('rvoto', $this->Rvoto->find('all'));
    }

    public function votarPositivo() {
        //$this->autoRender = false;
        //$this->layout = 'faq_life';
        if ($this->request->is('post')) {
            $usuario_id = $this->request->data['Rvoto']['user'];
            $respuesta_id = $this->request->data['Rvoto']['id'];

            // Comprobación de si ya ha votado
            $busqueda = $this->Rvoto->find('all', array(
                'conditions' => array(
                        'Rvoto.usuario_id' => $usuario_id,
                        'Rvoto.respuesta_id' => $respuesta_id
                    )
                )
            );

            // Validación de si puede votar
            if(count($busqueda) == 0) {
                $puedeVotar = true;
            } else {
                $puedeVotar = false;
            }

            if($puedeVotar) {
                //Actualizar el contador de numero de positivos de la pregunta
                $id = $this->request->data['Rvoto']['id'];
                $pregunta = ClassRegistry::init('Respuesta')->findById($id);
                $numPositivos = $pregunta['Respuesta']['positivos'];
                $numPositivos += 1;
                ClassRegistry::init('Respuesta')->updateAll(
                    array('Respuesta.positivos' => "'$numPositivos'"),
                    array('Respuesta.id' => "$id")
                );

                // Insertar el nuevo voto positivo
                $data = array('usuario_id' => $usuario_id, 'respuesta_id' => $respuesta_id, 'voto' => 1);
                $this->Rvoto->save($data);

                $this->redirect($this->referer());
            } else {
                $this->Flash->success(__('You have already voted this answer'));
                $this->redirect($this->referer());
            }
        }
    }

    public function votarNegativo() {
        //$this->autoRender = false;
        //$this->layout = 'faq_life';
        if ($this->request->is('post')) {
            $usuario_id = $this->request->data['Rvoto']['user'];
            $respuesta_id = $this->request->data['Rvoto']['id'];

            // Comprobación de si ya ha votado
            $busqueda = $this->Rvoto->find('all', array(
                'conditions' => array(
                        'Rvoto.usuario_id' => $usuario_id,
                        'Rvoto.respuesta_id' => $respuesta_id
                    )
                )
            );

            // Validación de si puede votar
            if(count($busqueda) == 0) {
                $puedeVotar = true;
            } else {
                $puedeVotar = false;
            }

            if($puedeVotar) {
                //Actualizar el contador de numero de positivos de la pregunta
                $id = $this->request->data['Rvoto']['id'];
                $pregunta = ClassRegistry::init('Respuesta')->findById($id);
                $numNegativos = $pregunta['Respuesta']['negativos'];
                $numNegativos += 1;
                ClassRegistry::init('Respuesta')->updateAll(
                    array('Respuesta.negativos' => "'$numNegativos'"),
                    array('Respuesta.id' => "$id")
                );

                // Insertar el nuevo voto positivo
                $data = array('usuario_id' => $usuario_id, 'respuesta_id' => $respuesta_id, 'voto' => 0);
                $this->Rvoto->save($data);

                $this->redirect($this->referer());
            } else {
                $this->Flash->success(__('You have already voted this answer'));
                $this->redirect($this->referer());
            }
        }
    }

}
?>
