<?php
App::uses('AppModel', 'Model');
//Password hashing
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

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
    
    //Password hashing, encriptar las contraseñas para no almacenarlas en texto plano en la BD
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
}
?>