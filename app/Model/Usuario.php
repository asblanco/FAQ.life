<?php
App::uses('AppModel', 'Model');

class Usuario extends AppModel {
    public $hasMany = array(
        'Pregunta', 'Respuesta'
    );
    
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A password is required'
            )
        ),
        'nombre' => array(
            'valid' => array(
                'rule' => 'notBlank',
                'message' => 'Por favor, introduce el nombre completo',
                'allowEmpty' => false
            )
        )
    );
}
?>