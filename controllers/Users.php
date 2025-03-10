<?php

require_once "models/User.php";
class Users{

    public function __construct(){
        if (empty($_SESSION['profile'])) {
            $_SESSION['profile'] = null;
            $_SESSION['session'] = null;
        }
    }
    
    public function main(){
        header("Location:?c=Dashboard");
    }

    public function userRolCreate(){
        $session = $_SESSION['session'];
        $profile = unserialize($_SESSION['profile']);
        if ($session == "admin") {            
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "views/roles/" . $session . "/header.view.php";
                require_once "views/modules/roles/rol_create.view.php";
                require_once "views/roles/" . $session . "/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol = new User;            
                $rol->setRolName(null);
                $rol->setRolName($_POST['rolName']);
                $rol->createRol();
                header("Location: ?c=Dashboard");
            }
        } else {
            header("Location:?c=Dashboard");
        }
        
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