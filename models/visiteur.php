
    <?php
    session_start();
        class visiteur 
        {
           private $nom;
           private $adresse;
           private $num_tel;
           private $date_enregistrement;
           
           
          public function __construct($nom,$mail,$adresse,$num_tel,$date_enregistrement)
          {
            $this->nom=$nom;
            $this->mail=$mail;
            $this->adresse=$adresse;
            $this->num_tel=$num_tel;
            $this->date_enregistrement=$date_enregistrement;
          }
          
          public function cree_visiteur()
          {
            global $bdd;
            $nom=$this->nom;
            $mail=$this->mail;
            $adresse=$this->adresse;
            $num_tel=$this->num_tel;
            $date_enregistrement=$this->date_enregistrement; 
            
            $req = $bdd->prepare('INSERT INTO visiteur (nom,mail,adresse,num_tel,date_enregistrement) VALUES(?, ?, ?, ?, ?)');
            $exec=$req->execute(array($nom,$mail,$adresse,$num_tel,$date_enregistrement)); 
            
                if ($exec) 
                {
                    return true;
                }
            
          }
          public function get_id_visiteur()
        {
            global $bdd;

            $req=$bdd->prepare('SELECT id_visiteur from visiteur where nom=:nom and mail=:mail and  
                adresse=:adresse and num_tel=:num_tel and date_enregistrement=:date_enregistrement');
            
            $exec=$req->execute(array(':nom'=>$this->get_nom(),':mail'=>$this->get_mail(),':adresse'=>$this->get_adresse(),
            ':num_tel'=>$this->get_num_tel(),':date_enregistrement'=>$this->get_date_enregistrement()));

            if ($exec) 
            {
                if ($id=$req->fetch()) 
                {
                   $id_visiteur=$id['id_visiteur'];
                   return $id_visiteur;
                }
                else return null;
            }else return null;
        }
        static function get_visiteur()
        {
            global $bdd;
            $num_tel=1;
            $req=$bdd->prepare('SELECT *FROM visiteur WHERE 1 order by DATE_FORMAT(date_enregistrement, \'%d/%m/%Y à %Hh%imin%ss\') desc ');
            $exec=$req->execute(array());
            $visiteurs=[];
            if ($exec) 
            {
               
                while ($donne=$req->fetch()) 
                {
                    $visiteur= new visiteur($donne['nom'],$donne['mail'],$donne['adresse'],$donne['num_tel'],$donne['date_enregistrement']);
                         array_push($visiteurs,$visiteur);
                }  return $visiteurs;
            } else return [];
        }
       
          public function getNom()
            {
                return $this->nom;
            }
         public function getMail()
            {
                return $this->mail;
            }
         public function getAdresse()
            {
                return $this->adresse;
            } 
         public function getNum_tel()
            {
            return $this->num_tel;
            } 
        public function getDate_enregistrement()
            {
                return $this->date_enregistrement;
            } 
        
    }
    ?>
