<?php
require_once "models/User.php";
class Login{
    // Controlador Principal
    public function main() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once 'views/company/login.view.php';
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $profile = new User(
                $_POST['user_email'],
                $_POST['user_pass']
            );                        
            $profile = $profile->login();
            if ($profile) {
                echo "Usuario Encontrado";
                // header("Location:?c=Dashboard");
            } else {                
                echo "Usuario No Encontrado";
                // header("Location:?");                
            }
        }
    }
}