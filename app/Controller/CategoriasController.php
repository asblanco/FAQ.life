<?php
class CategoriasController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');

    public function index() {
        $this->layout = 'faq_life';
        $this->set('categorias', $this->Categoria->find('all', array('order' => array('nombre_categoria' => 'desc'))));
    }
    
    public function view($cat_id) {
        $this->layout = 'faq_life';
        $busquedas = array();
        $cat = $this->Categoria->findById($cat_id);

        $preguntas = ClassRegistry::init('Pregunta')->find('all',
               array('conditions'=>array('Pregunta.categoria_id'=>$cat_id)));
        $this->set('busquedas', $preguntas);
        $this->set('categoria', $cat['Categoria']['nombre_categoria']);
    }
}
?>
