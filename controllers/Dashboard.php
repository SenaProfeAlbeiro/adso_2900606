<?php
    require_once "models/User.php";
    class Dashboard{
        
        public function __construct(){
            if (empty($_SESSION['profile'])) {
                $_SESSION['profile'] = null;
                $_SESSION['session'] = null;
            }
        }

        public function main(){
            $session = $_SESSION['session'];
            $profile = unserialize($_SESSION['profile']);
            if ($session && $profile) {
                require_once "views/roles/" . $session . "/" . $session . ".view.php";
            } else {
                header('Location:?');
            }
            
        }
    }

?>