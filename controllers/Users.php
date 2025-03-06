<?php

require_once "models/User.php";
class Users{

    public function main(){
        $session = $_SESSION['session'];
        if (!$session) {
            header('Location:?');                
        }
    }

    public function userRolCreate(){
        $rol = new User;
        $rol->setRolCode(3);
        $rol->setRolName("seller");
        $rol->createRol();
    }

    public function userRolRead(){
        $roles = new User;
        $roles = $roles->readRoles();
    }
    
    public function userRolUpdate(){
        $rolId = new User;
        $rolId = $rolId->getRolById(1);
        
        $rolUp = new User;
        $rolUp->setRolCode($rolId->getRolCode());
        $rolUp->setRolName("admin");
        $rolUp->updateRol();
    }

    public function userRolDelete(){
        $rolDel = new User;
        $rolDel->deleteRol(4);
    }

    public function userCreate(){
        $user = new User(
            3,
            6,
            "Crear",
            "Usuario",
            "456456456",
            "crear@usuario.com",
            "12345",
            1
        );        
        $user->createUser();
    }

    public function userRead(){
        $users = new User;
        $users = $users->readUsers();
        print_r($users);
    }

    public function userUpdate(){
        $userCode = new User;
        $userCode = $userCode->getUserById(2);
        
        $userUp = new User(
            2,
            $userCode->getUserCode(),
            "Ana Gabriel",
            "Márquez",
            "878979",
            "ana@marquez.com",
            "54321",
            1
        );
        $userUp->updateUser();
    }

    public function userDelete(){
        $userDel = new User;
        $userDel->deleteUser(2);
    }
}

?>