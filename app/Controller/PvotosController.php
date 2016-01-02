<?php
class PvotosController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');

    public function index() {
        $this->set('pvoto', $this->Pvoto->find('all'));
    }

    public function votarPositivo() {
        if ($this->request->is('post')) {
            $usuario_id = $this->request->data['Pvoto']['user'];
            $pregunta_id = $this->request->data['Pvoto']['id'];

            // Comprobación de si ya ha votado
            $busqueda = $this->Pvoto->find('all', array(
                'conditions' => array(
                        'Pvoto.usuario_id' => $usuario_id,
                        'Pvoto.pregunta_id' => $pregunta_id
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
                $id = $this->request->data['Pvoto']['id'];
                $pregunta = ClassRegistry::init('Pregunta')->findById($id);
                $numPositivos = $pregunta['Pregunta']['positivos'];
                $numPositivos += 1;
                ClassRegistry::init('Pregunta')->updateAll(
                    array('Pregunta.positivos' => "'$numPositivos'"),
                    array('Pregunta.id' => "$id")
                );

                // Insertar el nuevo voto positivo
                $data = array('usuario_id' => $usuario_id, 'pregunta_id' => $pregunta_id, 'voto' => 1);
                $this->Pvoto->save($data);

                $this->redirect($this->referer());
            } else {
                $this->Flash->success(__('You have already voted this question'));
                $this->redirect($this->referer());
            }
        }else{
					$this->redirect($this->referer());
				}
    }

    public function votarNegativo() {
        if ($this->request->is('post')) {
            $usuario_id = $this->request->data['Pvoto']['user'];
            $pregunta_id = $this->request->data['Pvoto']['id'];

            // Comprobación de si ya ha votado
            $busqueda = $this->Pvoto->find('all', array(
                'conditions' => array(
                        'Pvoto.usuario_id' => $usuario_id,
                        'Pvoto.pregunta_id' => $pregunta_id
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
                $id = $this->request->data['Pvoto']['id'];
                $pregunta = ClassRegistry::init('Pregunta')->findById($id);
                $numNegativos = $pregunta['Pregunta']['negativos'];
                $numNegativos += 1;
                ClassRegistry::init('Pregunta')->updateAll(
                    array('Pregunta.negativos' => "'$numNegativos'"),
                    array('Pregunta.id' => "$id")
                );

                // Insertar el nuevo voto positivo
                $data = array('usuario_id' => $usuario_id, 'pregunta_id' => $pregunta_id, 'voto' => 0);
                $this->Pvoto->save($data);

                $this->redirect($this->referer());
            } else {
                $this->Flash->success(__('You have already voted this question'));
                $this->redirect($this->referer());
            }
        }else{
					$this->redirect($this->referer());
				}
    }

}
?>
