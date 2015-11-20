<?php
class PreguntasController extends AppController {
    public $helpers = array('Html', 'Form');
    
    /*funcion index que se corresponde con la vista index.ctp
    La vista index.ctp podra acceder a la variable preguntas, que contiene todas las filas de la tabla
    Pregunta*/
    public function index() {
        $this->set('preguntas', $this->Pregunta->find('all'));
        $this->layout = 'faq_life';
    }
    
    public function pregunta($id = null) {
        $this->layout = 'faq_life';
        
        if (!$id) {
            throw new NotFoundException(__('Invalid pregunta'));
        }

        $pregunta = $this->Pregunta->findById($id);
        if (!$pregunta) {
            throw new NotFoundException(__('Invalid pregunta'));
        }
        
        $usuario = ClassRegistry::init('Usuario')->findById($pregunta['Pregunta']['Usuario_id']);
        $this->set('usuario', $usuario);
        $this->set('pregunta', $pregunta);
    }
}
?>