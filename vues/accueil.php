
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php include('../controleurs/visiteur.php');?>
    <?php include('../controleurs/info_visiteur.php');?>
</head>
<body>
    
    <h1>Inserez ici les informations sur les contacts</h1>  
    <p><form action="../controleurs/visiteur.php" method="post">
            <label for="nom"> nom complet:</label><br>
            <input type="text" id="nom" name="nom" required><br><br>

            <label for="mail"> Adresse Mail:</label><br>
            <input type="email" id="mail" name="mail" required><br><br>

            <label for="adresse"> residence(quartier):</label><br>
            <input type="text" id="adresse" name="adresse" required><br><br>

            <label for="num_tel"> numero de telephone:</label><br>
            <input type="tel" id="num_tel"name="num_tel" required><br><br>

            <input type="submit" value="Envoyer">
        </form>
    </p>
    <h1>Carnet d'adresses</h1>
    <?php $visit= get_visit();?>
    <p>
        <table>
            <thead>
                <tr>
                <!-- <th>Num </th> -->
                <th>Nom  </th>
                <th>Telephone  </th>
                <th>details  </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // echo "<td>".get_id_visiteur()."</td>";
                    for ($i=0; $i <count($visit) ; $i++) 
                    { 
                        echo "<tr>";
                        
                        echo "<td>".$visit[$i]->getNom()."</td>";
                        echo "<td>".$visit[$i]->getNum_tel()."</td>";?>
                        <td><a href="detail.php?nom=<?php echo $visit[$i]->getNom();?>" title='contact seved on <?php echo $visit[$i]->getDate_enregistrement()." pour joindre ".$visit[$i]->getNom()." habitant dans le quartier "
                        .$visit[$i]->getAdresse().",ecrivez  lui sur ".$visit[$i]->getNum_tel()." ou laissez lui un mail a cette adresse ".$visit[$i]->getMail()." ";?>
                        '><button>Voir plus...</button> </a></td>
                                        <?php echo "</tr>";
                    }   
                ?>
            </tbody>
        </table> 
    </p>
</body>
</html>