<?php
class Respuesta extends AppModel {
    public $belongsTo = array(
        'Pregunta', 'Usuario'
    );
}
?>