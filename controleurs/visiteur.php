
<?php
    include '../configuration/config.php';
    include '../models/visiteur.php';    


    if (isset($_POST['mail'])) 
    {
        
        $nom =$_POST['nom']; 
        $mail =$_POST['mail'];
        $adresse =$_POST['adresse'];
        $num_tel =$_POST['num_tel'];
        $date_enregistrement =date('y-m-d');

         $visiteur=new visiteur($nom,$mail,$adresse,$num_tel,$date_enregistrement);

                // Rediriger l'utilisateur vers une page de confirmation d'enregistrement
                if ($visiteur->cree_visiteur())
                {
                    global $bdd;

                    $req=$bdd->prepare('SELECT id_visiteur from visiteur where nom=:nom');
                    $exec=$req->execute(array(':nom'=>$visiteur->getNom()));

                            header('location:../vues/accueil.php');
                }   
    }
                
?>