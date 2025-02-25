<?php

    class User{
        
        // Atributos
        private $rol_code; 
        private $rol_name; 
        private $user_code;
        private $user_name;
        private $user_lastname;
        private $user_id;
        private $user_email;
        private $user_pass;
        private $user_state;

        // Sobrecarga de Constructores


        // Métodos setter y getter

        # Código del Rol
        public function setRolCode($rol_code){
            $this->rol_code = $rol_code;
        }
        public function getRolCode(){
            return $this->rol_code;
        }


        // Métodos de persistencia a la base de datos


    }

?>