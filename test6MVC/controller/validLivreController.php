<?php

class validLivreController  {

    public function __construct()
	{    
        session_start();
        error_reporting(E_ALL);
        require_once "controller/Controller.php";
        require_once "modele/metier/Livre.php";
        require_once "modele/DAO/LivreDB.php";
        require_once "modele/DAO/connectionPDO.php";
        require_once "Constantes.php";
      
//recuperation des valeurs du livre venant du formulaire ajout livre
$nom = ($_POST['nom']) ?? null;
$edition = $_POST['edition']?? null;
$information = $_POST['info']?? null;
$auteur =$_POST['auteur']?? null;
//recupéreation de l'id pour action update
$id=$_POST['idlivre']?? null;
//action pour update ou insert, delete, select selectall
   $operation = $_POST['operation']?? null;
    //l'action peut etre passé en GET si elle ne l'ai pas en POST
    if($operation==null){
       $operation =$_GET['operation']?? null;
    }
    if(Controller::auth())
    {
if($operation=="insert"){
//Création de l'objet livre 

try{
    $li=new Livre($nom,$edition,$auteur,$information);

//connexion a la bdd
$accesLivreBDD=new LivreDB($pdo);

//insertion du livre en bdd
$accesLivreBDD->ajout($li);
//$id=$accesLivreBDD->lastId;

//appel de la vue pour afficher message d'insertion
echo "insert";
}
//levée d'exception si probleme insertion en base de données
catch(Exception $e) {
//appel de la constantes définit dans Contantes.php pour afficher un message compréhensible 
//pour l'utilisateur
throw new Exception(Constantes::EXCEPTION_INSERT_DB_LIVRE);
}
}
else if($operation=="update"){
try{
//update de l'objet livre
$li=new Livre($nom,$edition,$information,$auteur);
$li->setId($id);

//connexion a la bdd
$accesLivreBDD=new LivreDB($pdo);
//update du livre en bdd
$accesLivreBDD->update($li);
//appel de la vue pour afficher message d'insertion
//$v=new vueValidLivre();
//$v->afficheEdit($nom, $auteur,$id);
}
//levée d'exception si probleme insertion en base de données
catch(Exception $e) {
//appel de la constantes définit dans Contantes.php pour afficher un message compréhensible 
//pour l'utilisateur
throw new Exception(Constantes::EXCEPTION_UPDATE_DB_LIVRE);
}	

}

else {
//erreur on renvoit à la page d'accueil
header('Location: accueil.php?id='.$_SESSION["token"]);

}
    }
}

}

