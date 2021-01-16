<?php


class AgeClockController
{

    public function __construct() {

}

    public function run(){

        if(!empty($_POST) && !empty($_POST["exec"])){
            $_SESSION["DateNaissance"] = $_POST["jourNaissance"]."/".$_POST["moisNaissance"]."/".$_POST["anneeNaissance"];
            $_SESSION["HeureNaissance"] = $_POST["heureNaissance"].":".$_POST["minuteNaissance"].":".$_POST["secondeNaissance"];
            $_SESSION["AgeClock"] = new AgeClock($_POST["jourNaissance"], $_POST["moisNaissance"], $_POST["anneeNaissance"], $_POST["heureNaissance"], $_POST["minuteNaissance"], $_POST["secondeNaissance"]);
            header("Location: index.php");
        }


        # Un contrôleur se termine en écrivant une vue
        require_once(CHEMIN_VUES . 'AgeClock.php');
    }

}