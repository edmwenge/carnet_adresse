<?php 

 // On appelle le modèle pour accéder aux données de l'appartement
 include_once('../models/visiteur.php');
 include('../configuration/config.php');
 
 
 function get_visit()
 {
    return visiteur :: get_visiteur();
 }
 
?>
