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
                $active = $profile->getUserState();
                if ($active != 0) {
                    $session = $profile->getRolCode();
                    if ($session == 1) {
                        $_SESSION['session'] = 'admin';
                    } elseif ($session == 2) {
                        $_SESSION['session'] = 'customer';                        
                    } elseif ($session == 3) {
                        $_SESSION['session'] = 'seller';
                    }                    
                    header("Location:?c=Dashboard");
                } else {
                    header("Location:?");
                }
                
            } else {                                
                header("Location:?");
            }
        }
    }
}