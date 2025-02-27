<?php

require_once "models/User.php";
class Users{

    public function main(){}

    public function userRolCreate(){
        $user = new User;
        $user->setRolCode(1);
        echo "Código Rol: " . $user->getRolCode();
        echo "<br>";
        $user->setRolName("admin");
        echo "Nombre Rol: " . $user->getRolName();
        echo "<br>";
        print_r($user);
    }
}

?>