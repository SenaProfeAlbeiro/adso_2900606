<?php

    class Dashboard{

        public function main(){
            $session = $_SESSION['session'];
            if ($session) {
                require_once "views/roles/" . $session . "/" . $session . ".view.php";
            } else {
                header('Location:?');
            }
            
        }
    }

?>