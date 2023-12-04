CREATE TABLE IF NOT EXISTS visiteur (
  id_visiteur int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(50) NOT NULL,
  mail varchar(100) NOT NULL,
  adresse varchar(100) NOT NULL,
  num_tel int(11) NOT NULL,
  date_enregistrement date NOT NULL,
  PRIMARY KEY (id_visiteur,nom,mail,num_tel))