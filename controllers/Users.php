<?php

require_once "models/User.php";
class Users{

    public function main(){}

    public function userRolCreate(){
        $rol = new User;
        $rol->setRolCode(3);
        $rol->setRolName("seller");
        // $rol->createRol();
    }
}

?>