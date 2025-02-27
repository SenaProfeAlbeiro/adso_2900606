<?php

    class User{
        
        // Atributos
        private $dbh;
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
        public function __construct(){
            try {
                $this->dbh = DataBase::connection();                
                $a = func_get_args();
                $i = func_num_args();
                if (method_exists($this, $f = '__construct' . $i)) {
                    call_user_func_array(array($this, $f), $a);
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # Construtor 00
        public function __construct0(){}
        
        # Constructor 02: Iniciar Sesión
        public function __construct2($user_email, $user_pass){
            $this->user_email = $user_email;            
            $this->user_pass = $user_pass;            
        }
        
        # Constructor 09: Todos los atributos del objeto
        public function __construct9($rol_code, $rol_name, $user_code, $user_name, $user_lastname, $user_id, $user_email, $user_pass, $user_state){
            $this->rol_code = $rol_code;            
            $this->rol_name = $rol_name;            
            $this->user_code = $user_code;            
            $this->user_name = $user_name;            
            $this->user_lastname = $user_lastname;            
            $this->user_id = $user_id;            
            $this->user_email = $user_email;            
            $this->user_pass = $user_pass;            
            $this->user_state = $user_state;
        }

        // Métodos setter y getter

        # Código del Rol
        public function setRolCode($rol_code){
            $this->rol_code = $rol_code;
        }
        public function getRolCode(){
            return $this->rol_code;
        }

        # Nombre del Rol
        public function setRolName($rol_name){
            $this->rol_name = $rol_name;
        }
        public function getRolName(){
            return $this->rol_name;
        }
        # Código del Usuario
        public function setUserCode($user_code){
            $this->user_code = $user_code;
        }
        public function getUserCode(){
            return $this->user_code;
        }
        # Nombre del Usuario
        public function setUserName($user_name){
            $this->user_name = $user_name;
        }
        public function getUserName(){
            return $this->user_name;
        }
        # Apellido del Usuario
        public function setUserLastName($user_lastname){
            $this->user_lastname = $user_lastname;
        }
        public function getUserLastName(){
            return $this->user_lastname;
        }
        # Identificación del Usuario
        public function setUserId($user_id){
            $this->user_id = $user_id;
        }
        public function getUserId(){
            return $this->user_id;
        }
        # Email del Usuario
        public function setUserEmail($user_email){
            $this->user_email = $user_email;
        }
        public function getUserEmail(){
            return $this->user_email;
        }
        # Contraseña del Usuario
        public function setUserPass($user_pass){
            $this->user_pass = $user_pass;
        }
        public function getUserPass(){
            return $this->user_pass;
        }
        # Estado del Usuario
        public function setUserState($user_state){
            $this->user_state = $user_state;
        }
        public function getUserState(){
            return $this->user_state;
        }


        // Métodos de persistencia a la base de datos

        # CU04 - Registrar Rol
        public function createRol(){
            try {
                $sql = 'INSERT INTO ROLES VALUES (:rolCode,:rolName)';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('rolName', $this->getRolName());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }


    }

?>