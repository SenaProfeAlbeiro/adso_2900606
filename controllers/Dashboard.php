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
                require_once "views/roles/" . $session . "/header.view.php";
                require_once "views/roles/" . $session . "/" . $session . ".view.php";
                require_once "views/roles/" . $session . "/footer.view.php";
            } else {
                header('Location:?');
            }            
        }
    }
?>