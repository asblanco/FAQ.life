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
            'nonEmpty' => array(
                'rule' => 'notBlank',
                'message' => 'A username is required',
                'allowEmpty' => false
            ),
            'between' => array( 
                'rule' => array('between', 5, 15), 
                'required' => true, 
                'message' => 'Usernames must be between 5 to 15 characters'
            ),
             'unique' => array(
                'rule'    => array('isUniqueUsername'),
                'message' => 'This username is already in use'
            ),
            'alphaNumericDashUnderscore' => array(
                'rule'    => array('alphaNumericDashUnderscore'),
                'message' => 'Username can only be letters, numbers and underscores'
            ),
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A password is required'
            ),
            'min_length' => array(
                'rule' => array('minLength', '6'),  
                'message' => 'Password must have a mimimum of 6 characters'
            )
        ),
        'password_confirm' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Please confirm your password'
            ),
             'equaltofield' => array(
                'rule' => array('equaltofield','password'),
                'message' => 'Both passwords must match.'
            )
        ),
        'nombre' => array(
            'valid' => array(
                'rule' => 'notBlank',
                'message' => 'Por favor, introduce el nombre completo',
                'allowEmpty' => false
            )
        ),
        'password_update' => array(
            'min_length' => array(
                'rule' => array('minLength', '6'),   
                'message' => 'Password must have a mimimum of 6 characters',
                'allowEmpty' => true,
                'required' => false
            )
        ),
        'password_confirm_update' => array(
             'equaltofield' => array(
                'rule' => array('equaltofield','password_update'),
                'message' => 'Both passwords must match.',
                'required' => false,
            )
        )
    );
    
      /**
     * Before isUniqueUsername
     * @param array $options
     * @return boolean
     */
    function isUniqueUsername($check) {
        $username = $this->find(
            'first',
            array(
                'fields' => array(
                    'Usuario.id',
                    'Usuario.username'
                ),
                'conditions' => array(
                    'Usuario.username' => $check['username']
                )
            )
        );
 
        if(!empty($username)){
            if($this->data['Usuario']['id'] == $username['Usuario']['id']){
                return true; 
            }else{
                return false; 
            }
        }else{
            return true; 
        }
    }
    
    //Comprueba que el usuario solo contenga letras, numeros y barras bajas
    public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];
 
        return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
    }
    
    //Comprueba que las dos contrasenhas sean iguales
    public function equaltofield($check,$otherfield) 
    { 
        //get name of field 
        $fname = ''; 
        foreach ($check as $key => $value){ 
            $fname = $key; 
            break; 
        } 
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname]; 
    } 
    
    //Password hashing, encriptar las contrasenhas para no almacenarlas en texto plano en la BD
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