<?php
class Respuesta extends AppModel {
    public $hasOne = array(
        'Pregunta', 'Usuario'
    );
}
?>