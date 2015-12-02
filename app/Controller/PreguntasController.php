<?php
class PreguntasController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');

    /*funcion index que se corresponde con la vista index.ctp
    La vista index.ctp podra acceder a la variable preguntas, que contiene todas las filas de la tabla
    Pregunta*/
    public function index() {
        $this->layout = 'faq_life';
        $this->set('preguntas', $this->Pregunta->find('all', array('order' => array('fecha' => 'desc'))));
        $this->set('categorias', ClassRegistry::init('Categoria')->find('all'));
    }

    public function add() {
        // print_r($this->request->data['Pregunta']['categoria_id']); echo "NADA"; die();
        if ($this->request->is('post')) {
            if($this->request->data['Pregunta']['categoria_id'] == "") {
                $this->Flash->success('Select a category.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->request->data['Pregunta']['usuario_id'] = $this->Auth->user('id');
                $this->request->data['Pregunta']['fecha'] = date('Y-m-d H:i:s');
                if ($this->Pregunta->save($this->request->data)) {
                    $this->Flash->success('Your post has been saved.');
                    $this->redirect(array('action' => 'index'));
                }
            }
        }
        $this->layout = 'faq_life';
        $this->set('preguntas', $this->Pregunta->find('all', array('order' => array('fecha' => 'desc'))));
        $this->set('categorias', ClassRegistry::init('Categoria')->find('all'));
        return $this->render('/preguntas/index');
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
        
        
        //Aumentar el contador de vistos de la pregunta
        $numVistos = $pregunta['Pregunta']['visto'];
        $numVistos += 1;
        $this->Pregunta->updateAll(
            array('Pregunta.visto' => "'$numVistos'"),
            array('Pregunta.id' => "$id")
        );
        
        // print_r($pregunta); die();
        $this->set('pregunta', $pregunta);

        //Array con las fotos de todos los usuarios que respondieron en el mismo orden que las respuestas
        $usuarios = array();
        foreach ($pregunta['Respuesta'] as $respuesta){
            $usuarios[] = ClassRegistry::init('Usuario')->findById($respuesta['usuario_id']);
        }

        $this->set('usuarios', $usuarios);
    }

    public function buscar() {
        $this->layout = 'faq_life';
        $busquedas = array();
        if (!empty($this->request->query)) {
            $query = $this->request->query['search'];
            $conditionsPregunta = array(
                'conditions' => array(
                    'or' => array(
                        'Pregunta.titulo LIKE' => "%".$query."%",
                        'Pregunta.cuerpo LIKE' => "%$query%",
                        // 'Respuesta.cuerpo_res LIKE' => "%$query%",
                        'Usuario.username LIKE' => "%$query%",
                        'Usuario.nombre LIKE' => "%$query%",
                        'Categoria.nombre_categoria LIKE' => "%$query%"
                    )
                )
            );
            // $conditionsRespuesta = array(
            //     'conditions' => array(
            //         'or' => array(
            //             'Respuesta.cuerpo_res LIKE' => "%$query%"
            //         )
            //     )
            // );
            $preguntas = ClassRegistry::init('Pregunta')->find('all', $conditionsPregunta);
            // $respuestas = ClassRegistry::init('Respuesta')->find('all', $conditionsRespuesta);
            // $busquedas = array_merge($preguntas,$respuestas);
        }
        $this->set('busquedas', $preguntas);
        // $this->set('busquedas', $busquedas);
    }

}
?>
