<?php

require_once "models/User.php";
class Users{

    public function main(){}

    public function userRolCreate(){
        $rol = new User;
        $rol->setRolCode(4);
        $rol->setRolName("prueba_eliminación");
        $rol->createRol();
    }

    public function userRolRead(){
        $roles = new User;
        $roles = $roles->readRoles();
    }
    
    public function userRolUpdate(){
        $rolId = new User;
        $rolId = $rolId->getRolById(3);
        
        $rolUp = new User;
        $rolUp->setRolCode($rolId->getRolCode());
        $rolUp->setRolName("seller");
        $rolUp->updateRol();
    }

    public function userRolDelete(){
        $rolDel = new User;
        $rolDel->deleteRol(4);
    }
}

?>