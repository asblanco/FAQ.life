<?php
class CategoriasController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');

     public function index() {
        $this->layout = 'faq_life';
    }
}
?>