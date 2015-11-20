<?php
class Pregunta extends AppModel {
    public $hasOne = array(
        'Categoria', 'Usuario'
    );
    public $hasMany = 'Respuesta';
}
?>