<?php
class PreguntasController extends AppController {
    public $helpers = array('Html', 'Form');
    
    /*funcion index que se corresponde con la vista index.ctp
    La vista index.ctp podra acceder a la variable preguntas, que contiene todas las filas de la tabla
    Pregunta*/
    public function index() {
        $this->layout = 'faq_life';
        $this->set('preguntas', $this->Pregunta->find('all'));
    }
    public function add() {
        
    }
    public function view($id = null) {
        $this->layout = 'faq_life';
        
        if (!$id) {
            throw new NotFoundException(__('Invalid pregunta'));
        }

        $pregunta = $this->Pregunta->findById($id);
        if (!$pregunta) {
            throw new NotFoundException(__('Invalid pregunta'));
        }

        $this->set('pregunta', $pregunta);
        
        //Array con las fotos de todos los usuarios que respondieron en el mismo orden que las respuestas
        $usuarios = array();
        foreach ($pregunta['Respuesta'] as $respuesta){
            $usuarios[] = ClassRegistry::init('Usuario')->findById($respuesta['Usuario_id']);
        }
        
        $this->set('usuarios', $usuarios);
    }
}
?>