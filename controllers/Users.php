<?php

require_once "models/User.php";
class Users{

    public function main(){}

    public function userCreate(){
        $user = new User;
        $user->setRolCode("Uno");
        echo $user->getRolCode();
    }
}

?>