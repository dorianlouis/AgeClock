<?php


class AgeClock
{
     private $_jourNaissance;
     private $_moisNaissance;
     private $_anneeNaissance;
     private $_heureNaissance;
     private $_minuteNaissance;
     private $_secondeNaissance;

     public function __construct($jourNaissance, $moisNaissance, $anneeNaissance, $heureNaissance, $minuteNaissance, $secondeNaissance)
     {
        $this->_jourNaissance = $jourNaissance;
        $this->_moisNaissance = $moisNaissance;
        $this->_anneeNaissance = $anneeNaissance;
        $this->_heureNaissance = $heureNaissance;
        $this->_minuteNaissance = $minuteNaissance;
        $this->_secondeNaissance = $secondeNaissance;
     }

     public function jourNaissance(){
         return $this->_jourNaissance;
     }

    public function moisNaissance(){
        return $this->_moisNaissance;
    }

    public function anneeNaissance(){
        return $this->_anneeNaissance;
    }

    public function heureNaissance(){
        return $this->_heureNaissance;
    }

    public function minuteNaissance(){
        return $this->_moisNaissance;
    }

    public function secondeNaissance(){
        return $this->_secondeNaissance;
    }

    public function calculerJoursDeDifference(){
        $var = explode("/",DATEDUJOUR);
        $jourActuelle = strval($var[1]);
        $jour = $jourActuelle - $this->jourNaissance();
        return $jour;
    }

    public function calculerMoisDeDifference(){
        $var = explode("/",DATEDUJOUR);
        $moisActuelle = strval($var[1]);
        $mois = $moisActuelle - $this->moisNaissance();
        return $mois;
    }

    public function calculerAnneeDeDifference(){
        $var = explode("/",DATEDUJOUR);
        $anneeActuelle = strval($var[1]);
        $annee = $anneeActuelle - $this->anneeNaissance();
        return $annee;
    }

    public function calculerHeuresDeDifferenceNaissance(){
        $var = explode(":",HEUREACTUELLE);
        $heureActuelle = strval($var[1]);
        $heure = $heureActuelle - $this->heureNaissance();
        return $heure;
    }

    public function calculerMinutesDeDifference(){
        $var = explode(":",HEUREACTUELLE);
        $minuteActuelle = strval($var[2]);
        $minute = $minuteActuelle - $this->minuteNaissance();
        return $minute;
    }

    public function calculerSecondesDeDifference(){
        $var = explode(":",HEUREACTUELLE);
        $secondeActuelle = strval($var[3]);
        $seconde = $secondeActuelle - $this->secondeNaissance();
        return $seconde;
    }

}