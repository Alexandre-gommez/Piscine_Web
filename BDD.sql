--Lier aux personnex 
--Table CB
CREATE TABLE CB(Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,Solde varchar(50) NOT NULL,Nom_Carte varchar(50) NOT NULL,Num varchar(50) NOT NULL,Crypto int NOT NULL,Type varchar(50) NOT NULL,Date_Expiration varchar(50) NOT NULL);
--Table personne
CREATE TABLE Personne(Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,Nom varchar(50) NOT NULL,Prenom varchar(50) NOT NULL,Mail varchar(50) NOT NULL,NumTel varchar(10) NOT NULL,Mdp varchar(50) NOT NULL,adresse1 varchar(50) NOT NULL,adresse2 varchar(50),ville varchar(50) NOT NULL,CodePostal int NOT NULL,Pays varchar(50) NOT NULL, Carte int, FOREIGN KEY(Carte) REFERENCES CB(Id),username varchar(50) NOT NULL,Image1 varchar(50),Image2 varchar(50));
--Table Admin
CREATE TABLE Admin(Personne int NOT NULL, FOREIGN KEY(Personne) REFERENCES Personne(Id));
--Table Vendeur
CREATE TABLE Vendeur(Personne int NOT NULL, FOREIGN KEY(Personne) REFERENCES Personne(Id));
--Table Acheteur
CREATE TABLE Acheteur(Personne int NOT NULL, FOREIGN KEY(Personne) REFERENCES Personne(Id));
--Table Hitorique des vendeurs
CREATE TABLE Histovendeur(Personne int NOT NULL, FOREIGN KEY(Personne) REFERENCES Personne(Id));
--Lier aux objets
--Table Objet
CREATE TABLE Objet(Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,Nom varchar(50) NOT NULL,Description text(1000) NOT NULL,Image1 varchar(50) NOT NULL,Image2 varchar(50),Image3 varchar(50),Image4 varchar(50),Video varchar(50),Vendeur int NOT NULL, FOREIGN KEY(Vendeur) REFERENCES Personne(Id));
--Table Ferraille
CREATE TABLE Ferraille(Objet int NOT NULL, FOREIGN KEY(Objet) REFERENCES Objet(Id));
--Table Mussée
CREATE TABLE Musee(Objet int NOT NULL, FOREIGN KEY(Objet) REFERENCES Objet(Id));
--Table VIP
CREATE TABLE VIP(Objet int NOT NULL, FOREIGN KEY(Objet) REFERENCES Objet(Id));
--Lier a la vente
--Table Enchere
CREATE TABLE Enchere(Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,Objet int NOT NULL, FOREIGN KEY(Objet) REFERENCES Objet(Id),Fin VARCHAR(50) NOT NULL, Prix float NOT NULL);
--Table Offres pour les encheres 
CREATE 	TABLE ListeEnchere(Referance int NOT NULL, FOREIGN KEY(Referance) REFERENCES Enchere(Id),Personne int NOT NULL, FOREIGN KEY(Personne) REFERENCES Personne(Id),Offre float NOT NULL);
--Table Achat
CREATE TABLE Achat(Objet int NOT NULL, FOREIGN KEY(Objet) REFERENCES Objet(Id), Prix float NOT NULL);
--Table Offre
CREATE TABLE Offre(Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,Objet int NOT NULL, FOREIGN KEY(Objet) REFERENCES Objet(Id), Prix float NOT NULL);
--TABLE Negociation 
CREATE 	TABLE ListeOffres(Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,Referance int NOT NULL, FOREIGN KEY(Referance) REFERENCES Offre(Id),Personne int NOT NULL, FOREIGN KEY(Personne) REFERENCES Personne(Id),Offre1 float,Offre2 float,Offre3 float,Offre4 float,Offre5 float,acheter int);
--Panier des vendeurs et acheteurs
--Table Liste Achat
CREATE TABLE ListeAchat(Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,Achat int NOT NULL, FOREIGN KEY(Achat) REFERENCES Objet(Id), Client int NOT NULL, FOREIGN KEY(Client) REFERENCES Personne(Id),typevente int NOT NULL);
--Remplisage
--Vendeurs
--Vendeur 1
INSERT INTO	CB(Solde,Nom_Carte,Num,Crypto,Type,Date_Expiration) VALUES ("100","Terrier","1","1","1","09/21");
INSERT INTO Personne(Nom,Prenom,Mail,NumTel,Mdp,adresse1,ville,CodePostal,Pays,Carte,username) VALUES ("Terrier","Julien","julien.terrier@edu.ece.fr","0658657052","a","10 rue de la Paix","Paris","75002","Fance","1","JT");
INSERT INTO Vendeur(Personne) VALUES ("1");
INSERT INTO Histovendeur(Personne) VALUES ("1");
--Vendeur 2
INSERT INTO	CB(Solde,Nom_Carte,Num,Crypto,Type,Date_Expiration) VALUES ("100","Martin","2","2","2","06/21");
INSERT INTO Personne(Nom,Prenom,Mail,NumTel,Mdp,adresse1,ville,CodePostal,Pays,Carte,username) VALUES ("Martin","Pierre","pierre.dupond@edu.ece.fr","0603445612","b","6 rue du Bournaire","Gennevilliers","92230","France","2","PM");
INSERT INTO Vendeur(Personne) VALUES ("2");
INSERT INTO Histovendeur(Personne) VALUES ("2");
--Acheteurs
--Acheteur 1
INSERT INTO	CB(Solde,Nom_Carte,Num,Crypto,Type,Date_Expiration) VALUES ("100","Thévin","3","3","3","12/20");
INSERT INTO Personne(Nom,Prenom,Mail,NumTel,Mdp,adresse1,ville,CodePostal,Pays,Carte,username,Image1,Image2) VALUES ("Thévin","Victor","victor.thevin@edu.ece.fr","0669632774","c","5 rue Amélie","Gennevilliers","92230","France","3","VT","pdpVictor.jpg","fdeVictor.jpg");
INSERT INTO Acheteur(Personne) VALUES ("3");
--Acheteur 2
INSERT INTO	CB(Solde,Nom_Carte,Num,Crypto,Type,Date_Expiration) VALUES ("100","Dupuis","4","4","4","10/20");
INSERT INTO Personne(Nom,Prenom,Mail,NumTel,Mdp,adresse1,ville,CodePostal,Pays,Carte,username) VALUES ("Dupuis","Marc","marc.dupuis@edu.ece.fr","0632552678","d","10 avenue de la République","Chatenay-Malabry","92290","Fance","4","MD");
INSERT INTO Acheteur(Personne) VALUES ("4");
--Admin
INSERT INTO Personne(Nom,Prenom,Mail,NumTel,Mdp,adresse1,ville,CodePostal,Pays,username) VALUES ("Gommez","Alexandre","alexandre.gommez@edu.ece.fr","0678258572","e","6 rue du Docteur Rochefort","Chatou","78400","France","AG");
INSERT INTO Admin(Personne) VALUES ("5");
--Objet1
INSERT INTO Objet(Nom,Description,Image1,Image2,Image3,Image4,Video,Vendeur) VALUES ("Ferraille","5 tonnes de dechets","Image1.jpeg","0","0","0","0","2");
INSERT INTO Ferraille(Objet) VALUES ("1");
INSERT INTO Achat(Objet,Prix) VALUES ("1","200");
INSERT INTO Offre(Objet,Prix) VALUES ("1","300");
--Objet2
INSERT INTO Objet(Nom,Description,Image1,Image2,Image3,Image4,Video,Vendeur) VALUES ("Tag Heuer Carrera","Belle montre sportive","Image2.jpeg","0","0","0","0","2");
INSERT INTO VIP(Objet) VALUES ("2");
INSERT INTO Enchere(Objet,Fin,Prix) VALUES("2","25/04/20-12:00","5000")
INSERT INTO Achat(Objet,Prix) VALUES ("2","7500");
--Objet3
INSERT INTO Objet(Nom,Description,Image1,Image2,Image3,Image4,Video,Vendeur) VALUES ("Casque de la guerre","Objet d'epoque","Image3.jpeg","0","0","0","0","2");
INSERT INTO Ferraille(Objet) VALUES ("3");
INSERT INTO Achat(Objet,Prix) VALUES ("3","500");
--Objet4
INSERT INTO Objet(Nom,Description,Image1,Image2,Image3,Image4,Video,Vendeur) VALUES ("Panneau de chantier","Ramener tot le matin","Image4.jpeg","0","0","0","0","2");
INSERT INTO VIP(Objet) VALUES ("4");
INSERT INTO Achat(Objet,Prix) VALUES ("4","200");
--Quelques enchères
INSERT INTO ListeEnchere(Referance, Personne, Offre) VALUES('1','1','12');
INSERT INTO ListeEnchere(Referance, Personne, Offre) VALUES('1','2','20');
INSERT INTO ListeEnchere(Referance, Personne, Offre) VALUES('1','3','3');
INSERT INTO ListeEnchere(Referance, Personne, Offre) VALUES('1','4','14');