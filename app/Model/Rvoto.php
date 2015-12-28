<?php
class Rvoto extends AppModel {
    public $belongsTo = array(
        'Respuesta', 'Usuario'
    );
}
?>
