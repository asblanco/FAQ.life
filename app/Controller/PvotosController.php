<?php
class PvotosController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');

    public function index() {
        $this->set('pvoto', $this->Pvoto->find('all'));
    }

    public function votarPositivo() {
        if ($this->request->is('post')) {
            $usuario_id = $this->request->data['Pvoto']['usuario_id'];
            $pregunta_id = $this->request->data['Pvoto']['pregunta_id'];

            // Comprobación de si ya ha votado
            $busqueda = $this->Pvoto->find('first', array(
                'conditions' => array(
                        'Pvoto.usuario_id' => $usuario_id,
                        'Pvoto.pregunta_id' => $pregunta_id
                    )
                )
            );

            // Validación, puede votar si no ha votado o si quiere cambiar el voto
            if((count($busqueda) > 0) && ($busqueda['Pvoto']['voto'] == 1)) {
              $puedeVotar = false;
            } else {
              $puedeVotar = true;
            }

            if($puedeVotar) {
                //Actualizar el contador de numero de positivos de la pregunta
                $pregunta = ClassRegistry::init('Pregunta')->findById($pregunta_id);
                $numPositivos = $pregunta['Pregunta']['positivos'] + 1;

                $numNegativos = $pregunta['Pregunta']['negativos'];
                //Eliminar el voto negativo si lo tenia anteriormente
                if((count($busqueda) > 0) && $busqueda['Pvoto']['voto'] == 0){
                  $numNegativos -= 1;
                }
                $arrayToSave['Pregunta']['negativos'] = $numNegativos;
                $arrayToSave['Pregunta']['positivos'] = $numPositivos;

                ClassRegistry::init('Pregunta')->id = $pregunta_id;
                ClassRegistry::init('Pregunta')->save($arrayToSave);

                // Insertar el voto positivo si no existe o sino lo actualiza
                if(count($busqueda) == 0){
                    $data = array('usuario_id' => $usuario_id, 'pregunta_id' => $pregunta_id, 'voto' => 1);
                }else{
                    $this->Pvoto->id = $busqueda['Pvoto']['id'];
                    $data = array('voto' => 1);
                }
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
            $usuario_id = $this->request->data['Pvoto']['usuario_id'];
            $pregunta_id = $this->request->data['Pvoto']['pregunta_id'];

            // Comprobación de si ya ha votado
            $busqueda = $this->Pvoto->find('first', array(
                'conditions' => array(
                        'Pvoto.usuario_id' => $usuario_id,
                        'Pvoto.pregunta_id' => $pregunta_id
                    )
                )
            );
					
            // Validación, puede votar si no ha votado o si quiere cambiar el voto
            if((count($busqueda) > 0) && ($busqueda['Pvoto']['voto'] == 0)) {
              $puedeVotar = false;
            } else {
              $puedeVotar = true;
            }

            if($puedeVotar) {
                //Actualizar el contador de numero de negativos de la pregunta
                $pregunta_id = $this->request->data['Pvoto']['pregunta_id'];
                $pregunta = ClassRegistry::init('Pregunta')->findById($pregunta_id);
                $numPositivos = $pregunta['Pregunta']['positivos'];
                //Eliminar el voto positivo si lo tenia anteriormente
                if((count($busqueda) > 0) && $busqueda['Pvoto']['voto'] == 1){
                    $numPositivos -= 1;
                }
                $numNegativos = $pregunta['Pregunta']['negativos'] + 1;
                $arrayToSave['Pregunta']['negativos'] = $numNegativos;
                $arrayToSave['Pregunta']['positivos'] = $numPositivos;

                ClassRegistry::init('Pregunta')->id = $pregunta_id;
                ClassRegistry::init('Pregunta')->save($arrayToSave);

                // Insertar el nuevo voto negativo si no existe o sino actualizarlo
                if(count($busqueda) == 0){
                    $data = array('usuario_id' => $usuario_id, 'pregunta_id' => $pregunta_id, 'voto' => 0);
                }else{
                    $this->Pvoto->id = $busqueda['Pvoto']['id'];
                    $data = array('voto' => 0);
                }
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
