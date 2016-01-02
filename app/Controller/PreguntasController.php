<?php
class PreguntasController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('RequestHandler'); //para ajax

    /*funcion index que se corresponde con la vista index.ctp
    La vista index.ctp podra acceder a la variable preguntas, que contiene todas las filas de la tabla
    Pregunta*/
    public function index() {
        $this->layout = 'faq_life';
        $this->set('preguntas', $this->Pregunta->find('all', array('order' => array('fecha' => 'desc'))));
        $this->set('categorias', ClassRegistry::init('Categoria')->find('all'));
    }

    public function add() {
        if ($this->request->is('post')) {
            if($this->request->data['Pregunta']['categoria_id'] == "") {
                $this->Flash->success(__('Select a category'));
                $this->redirect(array('action' => 'index'));
            } else {
                /*Se aumenta en 1 el id de categorias porque de la vista el dropdown empieza en 0, y en la base de datos, usando null se empieza en 1*/
                $this->request->data['Pregunta']['categoria_id'] += 1;
                $this->request->data['Pregunta']['usuario_id'] = $this->Auth->user('id');
                $this->request->data['Pregunta']['fecha'] = date('Y-m-d H:i:s');
                if ($this->Pregunta->save($this->request->data)) {
                    $this->Flash->success(__('Your post has been saved.'));
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
            throw new NotFoundException(__('Invalid question'));
        }

        $pregunta = $this->Pregunta->findById($id);
        if (!$pregunta) {
            throw new NotFoundException(__('Invalid question'));
        }

        //Aumentar el contador de vistos de la pregunta
        $numVistos = $pregunta['Pregunta']['visto'];
        $numVistos += 1;
        $this->Pregunta->updateAll(
            array('Pregunta.visto' => "'$numVistos'"),
            array('Pregunta.id' => "$id")
        );

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
                        'Pregunta.titulo LIKE' => "%$query%",
                        'Pregunta.cuerpo LIKE' => "%$query%",
                        'Usuario.username LIKE' => "%$query%",
                        'Usuario.nombre LIKE' => "%$query%",
                        'Categoria.nombre_categoria LIKE' => "%$query%"
                    )
                )
            );

            $preguntas = $this->Pregunta->find('all', $conditionsPregunta);
        }
        $this->set('busquedas', $preguntas);
    }
    
}
?>
