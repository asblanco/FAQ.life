<?php
class Pregunta extends AppModel {
    public $belongsTo = array(
        'Categoria', 'Usuario'
    );
    public $hasMany = 'Respuesta';

    public $validate = array(
        'titulo' => array('rule' => 'notBlank'),
        'cuerpo' => array('rule' => 'notBlank')
    );
}
?>
