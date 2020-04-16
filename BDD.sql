--Table CB
CREATE TABLE CB(Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,Solde varchar(50) NOT NULL,Nom_Carte varchar(50) NOT NULL,Num varchar(50) NOT NULL,Crypto int NOT NULL,Type varchar(50) NOT NULL,Date_Expiration varchar(50) NOT NULL);
--Table Objet
CREATE TABLE Objet(Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,Nom varchar(50) NOT NULL,Description text(1000) NOT NULL,Image1 varchar(50) NOT NULL,Image2 varchar(50),Image3 varchar(50),Image4 varchar(50),Video varchar(50));
--Table personne
CREATE TABLE Personne(Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,Nom varchar(50) NOT NULL,Prenom varchar(50) NOT NULL,Mail varchar(50) NOT NULL,NumTel varchar(10) NOT NULL,Mdp varchar(50) NOT NULL,adresse1 varchar(50) NOT NULL,adresse2 varchar(50),ville varchar(50) NOT NULL,CodePostal int NOT NULL,Pays varchar(50) NOT NULL, Carte int, FOREIGN KEY(Carte) REFERENCES CB(Id),username varchar(50) NOT NULL);
--Table Admin
CREATE TABLE Admin(Personne int NOT NULL, FOREIGN KEY(Personne) REFERENCES Personne(Id));
--Table Vendeur
CREATE TABLE Vendeur(Personne int NOT NULL, FOREIGN KEY(Personne) REFERENCES Personne(Id));
--Table Acheteur
CREATE TABLE Acheteur(Personne int NOT NULL, FOREIGN KEY(Personne) REFERENCES Personne(Id));
--Table Enchere
CREATE TABLE Enchere(Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,Objet int NOT NULL, FOREIGN KEY(Objet) REFERENCES Objet(Id),Fin DATE NOT NULL, Prix float NOT NULL);
--Table offre 
CREATE 	TABLE ListeEnchere(Referance int NOT NULL, FOREIGN KEY(Referance) REFERENCES Enchere(Id),Personne int NOT NULL, FOREIGN KEY(Personne) REFERENCES Personne(Id),Offre float NOT NULL);
--Table Achat
CREATE TABLE Achat(Objet int NOT NULL, FOREIGN KEY(Objet) REFERENCES Objet(Id), Prix float NOT NULL);
--Table Offre
CREATE TABLE Offre(Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,Objet int NOT NULL, FOREIGN KEY(Objet) REFERENCES Objet(Id),Nb int NOT NULL, Prix float NOT NULL);
--TABLE Negociation 
CREATE 	TABLE ListeEnchere(Referance int NOT NULL, FOREIGN KEY(Referance) REFERENCES Offre(Id),Personne int NOT NULL, FOREIGN KEY(Personne) REFERENCES Personne(Id),Offre1 float,Offre2 float,Offre3 float,Offre4 float,Offre5 float);
--Table Ferraille
CREATE TABLE Ferraille(Objet int NOT NULL, FOREIGN KEY(Objet) REFERENCES Objet(Id));
--Table Mussée
CREATE TABLE Musee(Objet int NOT NULL, FOREIGN KEY(Objet) REFERENCES Objet(Id));
--Table VIP
CREATE TABLE VIP(Objet int NOT NULL, FOREIGN KEY(Objet) REFERENCES Objet(Id));
--Table Liste Achat
CREATE TABLE ListeAchat(Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,Achat int NOT NULL, FOREIGN KEY(Achat) REFERENCES Objet(Id), Client int NOT NULL, FOREIGN KEY(Client) REFERENCES Personne(Id));
--Table Liste Vente 
CREATE TABLE ListeVente(Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,Vente int NOT NULL, FOREIGN KEY(Vente) REFERENCES Objet(Id), Client int NOT NULL, FOREIGN KEY(Client) REFERENCES Personne(Id));
--Table Hitorique des vendeurs
CREATE TABLE Histovendeur(Personne int NOT NULL, FOREIGN KEY(Personne) REFERENCES Personne(Id));