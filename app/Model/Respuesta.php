<?php
class Respuesta extends AppModel {
    public $belongsTo = array(
        'Pregunta', 'Usuario'
    );

    public $validate = array(
        'cuerpo_res' => array('rule' => 'notBlank')
    );
}
?>
