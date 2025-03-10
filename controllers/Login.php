<?php
require_once "models/User.php";
class Login{
    // Controlador Principal
    public function main() {
        $message = "";
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once 'views/company/header.view.php';
            require_once 'views/company/login.view.php';
            require_once 'views/company/footer.view.php';
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
                    $profile = serialize($profile);
                    $_SESSION['profile'] = $profile;
                    header("Location:?c=Dashboard");
                } else {
                    $message = "<div class='alert alert-danger mt-2'>El Usuario NO está activo</div>";                    
                    require_once 'views/company/header.view.php';
                    require_once 'views/company/login.view.php';
                    require_once 'views/company/footer.view.php';
                }                
            } else {
                $message = "<div class='alert alert-danger mt-2'>Las credenciales no son correctas</div>";
                require_once 'views/company/header.view.php';
                require_once 'views/company/login.view.php';
                require_once 'views/company/footer.view.php';
            }
        }
    }
}