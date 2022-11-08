<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
       
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
		<?php
		include "config.php";
		//phpinfo();
            
            //connexion BDD
       $connexion=mysqli_connect($host, $user,$passwd) or die("erreur de connexion au serveur");
       mysqli_select_db($connexion,$bdd) or die("erreur de connexion a la base de donnees");
       echo 'Connexion réussie';	
		
		//requete de selection
            $result = mysqli_query($connexion,"select c.nom,c.prenom, a.espece, a.poids,
			a.taille,v.modele,v.marque,v.immatriculation,v.annee from voiture v,
			conducteur c, animal a, percute p where v.id_conducteur=c.id and
			p.id_voiture=v.id and p.id_animal=a.id order by c.nom ASC;");
			// si aucun resultat dans $result-> message erreur
			if (!$result) {
			die('Requête invalide : ');
			exit;
				}
			//affichage des résultats mis en forme
			echo"<table border=0>";
			echo "<th>NOM</th>";
			echo "<th>PRENOM</th>";
			echo "<th>ESPECE</th>";
			echo "<th>POIDS</th>";
			echo "<th>TAILLE</th>";
			echo "<th>MODELE</th>";
			echo "<th>MARQUE</th>";
			echo "<th>IMMATRICULATION</th>";
			echo "<th>ANNEE</th>";
			while ($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row['nom']."</td>";
				echo "<td>".$row['prenom']."</td>";
				echo "<td>".$row['espece']." </td>";
				echo "<td>".$row['poids']." </td>";
				echo "<td>".$row['taille']." </td>";
				echo "<td>".$row['modele']." </td>";
				echo "<td>".$row['marque']." </td>";
				echo "<td>".$row['immatriculation']." </td>";
				echo "<td>".$row['annee']." </td>";
				echo "<td>";

				
				echo "</td></tr>";
			}
			echo "</table>";

        ?>
    </body>
</html>