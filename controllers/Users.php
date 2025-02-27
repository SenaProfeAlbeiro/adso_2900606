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
        $user->setUserName("Jorgito");
        echo "Nombre Usuario: " . $user->getUserName();
        echo "<br>";        
        echo "<br>";
        
        $user2 = new User("pepito@perez.com", md5("1234"));
        echo "Email User02: " . $user2->getUserEmail();
        echo "<br>";
        echo "PassWord User02: " . $user2->getUserPass();
        echo "<br>";
        echo "<br>";
        print_r($user);
        echo "<br>";
        echo "<br>";
        print_r($user2);
        echo "<br>";
        echo "<br>";
        
        $user3 = new User(
            1, 
            "admin", 
            789,
            "pepito", 
            "perez", 
            123456789, 
            "vicente@fernandez.com", 
            md5("1234"), 
            1
        );        
        print_r($user3);
    }
}

?>