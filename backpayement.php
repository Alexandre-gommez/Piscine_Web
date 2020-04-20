<?php

			include 'loginBDD.php';

			$NCarte=isset($_POST["number1"]) ? $_POST["number1"]:"";
			$crypto=isset($_POST["cvv"]) ? $_POST["cvv"]:"";
			$typecarte=isset($_POST["type"]) ? $_POST["type"]:"";
			$date=isset($_POST["date"]) ? $_POST["date"]:"";


			$test=mysqli_query($db_handle,"SELECT Id FROM CB WHERE Num ='" .$NCarte."' AND Crypto ='" .$crypto."' AND Type ='" .$typecarte."' AND Date_Expiration ='" .$date."'");

			if(isset($test)){
				$ID_Carte_Test=mysqli_fetch_assoc($test);
				$check=mysqli_query($db_handle,"SELECT Carte FROM Personne WHERE Id = '".$_SESSION['Id']."'");
				$ID_Carte_Personne=mysqli_fetch_assoc($check);
				if($ID_Carte_Test['Id']==$ID_Carte_Personne['Carte']){
                    $test=mysqli_query($db_handle,"SELECT * FROM ListeAchat WHERE Client='".$_SESSION['Id']."';");
                    while($temp=mysqli_fetch_assoc($test))
                    {
                        $test1=mysqli_query($db_handle,"SELECT * FROM Ferraille WHERE Objet='".$temp['Achat']."';");
                        if(mysqli_num_rows($test1)==1){
                            $temp=mysqli_query($db_handle,"DELETE FROM Ferraille WHERE Objet='".$temp['Achat']."';");
                        }
                        $test2=mysqli_query($db_handle,"SELECT * FROM VIP WHERE Objet='".$temp['Achat']."';");
                        if(mysqli_num_rows($test2)!=0){
                            $temp=mysqli_query($db_handle,"DELETE FROM VIP WHERE Objet='".$temp['Achat']."';");
                        }
                        $test3=mysqli_query($db_handle,"SELECT * FROM Musee WHERE Objet='".$temp['Achat']."';");
                        if(mysqli_num_rows($test3)!=0){
                            $temp=mysqli_query($db_handle,"DELETE FROM Musee WHERE Objet='".$temp['Achat']."';");
                        }
                        $test4=mysqli_query($db_handle,"SELECT Id FROM Offre WHERE Objet='".$temp['Achat']."';");
                        if(mysqli_num_rows($test4)!=0){
                            $id_offre=mysqli_fetch_assoc($test4);
                            $test41=mysqli_query($db_handle,"SELECT * FROM ListeOffres WHERE Referance='".$id_offre."';");
                            if(mysqli_num_rows($test41)!=0)
                            {
                                $temp=mysqli_query($db_handle,"DELETE FROM ListeOffres WHERE Referance='".$id_offre."';");
                            }
                            $temp=mysqli_query($db_handle,"DELETE FROM Offre WHERE Objet='".$temp['Achat']."';");
                        }
                        $test5=mysqli_query($db_handle,"SELECT * FROM Achat WHERE Objet='".$temp['Achat']."';");
                        if(mysqli_num_rows($test5)!=0){
                            $temp=mysqli_query($db_handle,"DELETE FROM Achat WHERE Objet='".$temp['Achat']."';");
                        }
                        $test6=mysqli_query($db_handle,"SELECT * FROM ListeAchat WHERE Objet='".$temp['Achat']."';");
                        if(mysqli_num_rows($test6)!=0){
                            $temp=mysqli_query($db_handle,"DELETE FROM ListeAchat WHERE Objet='".$temp['Achat']."';");
                        }
                        $test7=mysqli_query($db_handle,"SELECT Id FROM Enchere WHERE Objet='".$temp['Achat']."';");
                        if(mysqli_num_rows($test7)!=0){
                            $id_enchere=mysqli_fetch_assoc($test7);
                            $test71=mysqli_query($db_handle,"SELECT * FROM ListeEnchere WHERE Referance='".$id_enchere."';");
                            if(mysqli_num_rows($test71)!=0)
                            {
                                $temp=mysqli_query($db_handle,"DELETE FROM ListeEnchere WHERE Referance='".$id_enchere."';");
                            }
                            $temp=mysqli_query($db_handle,"DELETE FROM Enchere WHERE Objet='".$temp['Achat']."';");
                        }
                        $test=mysqli_query($db_handle,"DELETE FROM Objet WHERE Id='".$temp['Achat']."';");
                    }
                    echo "Payement accepté";
                    header( "Refresh:5; url=panier.php", true, 303);
                }
                else{
                    echo "information fausse, vous allez être redirigé vers l'accueil";
                    header( "Refresh:5; url=index.php", true, 303);
                }
			}
			

?>