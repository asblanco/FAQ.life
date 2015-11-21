<?php
class Pregunta extends AppModel {
    public $belongsTo = array(
        'Categoria', 'Usuario'
    );
    public $hasMany = 'Respuesta';
}
?>