<?php
class CategoriasController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');

    public function index() {
        $this->layout = 'faq_life';
        $this->set('categorias', $this->Categoria->find('all', array('order' => array('nombre_categoria' => 'desc'))));
    }
}
?>
