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
        // print_r($this->request->data['Pregunta']['categoria_id']); echo "NADA"; die();
        if ($this->request->is('post')) {
            if($this->request->data['Pregunta']['categoria_id'] == "") {
                $this->Flash->success('Select a category.');
                $this->redirect(array('action' => 'index'));
            } else {
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

    public function votarPositivo (){
        //$this->autoRender = false;
        if ($this->request->is('post')) {
            //Actualizar el contador de numero de respuestas de la pregunta
            $id = $this->request->data['Pregunta']['id'];
            $pregunta = $this->Pregunta->findById($id);
            $numPositivos = $pregunta['Pregunta']['positivos'];
            $numPositivos += 1;

            $this->Pregunta->updateAll(
                array('Pregunta.positivos' => "'$numPositivos'"),
                array('Pregunta.id' => "$id")
            );

            /*Quitar el comiendo de la url del metodo referer para
              poder comparar solo la url como si fuera $this->here*/
            $here = str_replace("http://localhost","",$this->request->referer());
            /*Condicion para redirigir a la pagina en la que se vote positivo*/
            if ($here == '/FAQ.life/'){
                $this->redirect(array('action' => 'index'));
            } else {
                $this->redirect(array('action' => 'view', $id));
            }
        }
    }

    public function votarNegativo (){
        //$this->autoRender = false;
        if ($this->request->is('post')) {
            //Actualizar el contador de numero de respuestas de la pregunta
            $id = $this->request->data['Pregunta']['id'];
            $pregunta = $this->Pregunta->findById($id);
            $numPositivos = $pregunta['Pregunta']['negativos'];
            $numPositivos += 1;

            $this->Pregunta->updateAll(
                array('Pregunta.negativos' => "'$numPositivos'"),
                array('Pregunta.id' => "$id")
            );

            /*Quitar el comiendo de la url del metodo referer para
              poder comparar solo la url como si fuera $this->here*/
            $here = str_replace("http://localhost","",$this->request->referer());
            /*Condicion para redirigir a la pagina en la que se vote positivo*/
            if ($here == '/FAQ.life/'){
                $this->redirect(array('action' => 'index'));
            } else {
                $this->redirect(array('action' => 'view', $id));
            }
        }
    }

    public function idioma() {
        // print_r($this->request->data); die();
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $idioma = $this->request->data['Pregunta']['idioma'];
            switch ($idioma) {
                case 'eng':
                    $this->Session->write('Config.language', 'eng');
                    break;
                case 'spa':
                    $this->Session->write('Config.language', 'spa');
                    break;
                case 'glg':
                    $this->Session->write('Config.language', 'glg');
                    break;
                default:
                    $this->Session->write('Config.language', 'spa');
                    break;
            }
            $this->redirect(array('controller' => 'preguntas', 'action' => 'index'));
            // $this->referer();
        }
    }
}
?>
