<?php
class Pvoto extends AppModel {
    public $belongsTo = array(
        'Pregunta', 'Usuario'
    );
}
?>
