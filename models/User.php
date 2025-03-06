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
        
        # Constructor 08: Todos los atributos del objeto (Sin nombre rol)
        public function __construct8($rol_code, $user_code, $user_name, $user_lastname, $user_id, $user_email, $user_pass, $user_state){            
            $this->rol_code = $rol_code;                        
            $this->user_code = $user_code;            
            $this->user_name = $user_name;            
            $this->user_lastname = $user_lastname;            
            $this->user_id = $user_id;            
            $this->user_email = $user_email;            
            $this->user_pass = $user_pass;            
            $this->user_state = $user_state;
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
        
        # RF01_CU01 - Iniciar Sesión
        public function login(){
            try {
                $sql = 'SELECT * FROM USUARIOS
                        WHERE user_email = :userEmail AND user_pass = :userPass';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userEmail', $this->getUserEmail());
                $stmt->bindValue('userPass', sha1($this->getUserPass()));
                $stmt->execute();
                $userDb = $stmt->fetch();
                if ($userDb) {
                    $user = new User(
                        $userDb['rol_code'],                    
                        $userDb['user_code'],
                        $userDb['user_name'],
                        $userDb['user_lastname'],
                        $userDb['user_id'],
                        $userDb['user_email'],
                        $userDb['user_pass'],
                        $userDb['user_state']
                    );
                    unset($user->dbh);
                    return $user;
                } else {
                    return false;
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

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

        # RF05_CU05 - Consultar Roles
        public function readRoles(){
            try {
                $rolList = [];
                $sql = 'SELECT * FROM ROLES';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $rol) {
                    $rolObj = new User;
                    $rolObj->setRolCode($rol['rol_code']);
                    $rolObj->setRolName($rol['rol_name']);
                    array_push($rolList, $rolObj);
                }
                return $rolList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # RF06_CU06 - Obtener el Rol por el código
        public function getRolById($rolCode){
            try {
                $sql = "SELECT * FROM ROLES WHERE rol_code=:rolCode";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $rolCode);
                $stmt->execute();
                $rolDb = $stmt->fetch();
                $rol = new User;
                $rol->setRolCode($rolDb['rol_code']);
                $rol->setRolName($rolDb['rol_name']);
                return $rol;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # RF07_CU07 - Actualizar Rol
        public function updateRol(){
            try {
                $sql = 'UPDATE ROLES SET
                            rol_code = :rolCode,
                            rol_name = :rolName
                        WHERE rol_code = :rolCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('rolName', $this->getRolName());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # RF08_CU08 - Eliminar Rol
        public function deleteRol($rolCode){
            try {
                $sql = 'DELETE FROM ROLES WHERE rol_code = :rolCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $rolCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # CU08 - Registrar Usuario
        public function createUser(){
            try {
                $sql = 'INSERT INTO USUARIOS VALUES (
                            :rolCode,
                            :userCode,
                            :userName,
                            :userLastName,
                            :userId,
                            :userEmail,
                            :userPass,
                            :userState                            
                        )';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('userCode', $this->getUserCode());
                $stmt->bindValue('userName', $this->getUserName());
                $stmt->bindValue('userLastName', $this->getUserLastName());
                $stmt->bindValue('userId', $this->getUserId());
                $stmt->bindValue('userEmail', $this->getUserEmail());
                $stmt->bindValue('userPass', sha1($this->getUserPass()));
                $stmt->bindValue('userState', $this->getUserState());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

         # RF05_CU08 - Consultar Usuarios
         public function readUsers(){
            try {
                $userList = [];
                $sql = 'SELECT * FROM USUARIOS';
                $stmt = $this->dbh->query($sql);
                foreach ($stmt->fetchAll() as $user) {
                    $userObj = new User(
                        $user['rol_code'],                        
                        $user['user_code'],
                        $user['user_name'],
                        $user['user_lastname'],
                        $user['user_id'],
                        $user['user_email'],
                        $user['user_pass'],
                        $user['user_state'],
                    );
                    array_push($userList, $userObj);
                }
                return $userList;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # RF06_CU06 - Obtener el Rol por el código
        public function getUserById($userCode){
            try {
                $sql = "SELECT * FROM USUARIOS WHERE user_code=:userCode";
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
                $userDb = $stmt->fetch();
                $user = new User(
                    $userDb['rol_code'],
                    $userDb['user_code'],
                    $userDb['user_name'],                    
                    $userDb['user_lastname'],                    
                    $userDb['user_id'],                    
                    $userDb['user_email'],                    
                    $userDb['user_pass'],                    
                    $userDb['user_state']
                );
                return $user;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # RF07_CU07 - Actualizar Rol
        public function updateUser(){
            try {
                $sql = 'UPDATE USUARIOS SET
                            rol_code = :rolCode,
                            user_code = :userCode,
                            user_name = :userName,
                            user_lastname = :userLastname,
                            user_id = :userId,
                            user_email = :userEmail,
                            user_pass = :userPass,
                            user_state = :userState
                        WHERE user_code = :userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('rolCode', $this->getRolCode());
                $stmt->bindValue('userCode', $this->getUserCode());
                $stmt->bindValue('userName', $this->getUserName());
                $stmt->bindValue('userLastname', $this->getUserLastName());
                $stmt->bindValue('userId', $this->getUserId());
                $stmt->bindValue('userEmail', $this->getUserEmail());
                $stmt->bindValue('userPass', sha1($this->getUserPass()));
                $stmt->bindValue('userState', $this->getUserState());
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        # RF08_CU08 - Eliminar Rol
        public function deleteUser($userCode){
            try {
                $sql = 'DELETE FROM USUARIOS WHERE user_code = :userCode';
                $stmt = $this->dbh->prepare($sql);
                $stmt->bindValue('userCode', $userCode);
                $stmt->execute();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }



    }

?>