<?php
require_once "Constantes.php";
require_once "metier/Personne.php";
/**
 * 
*Classe permettant d'acceder en bdd pour inserer supprimer
 * selectionner des objets Personne
 * @author pascal Lamy
 *
 */
class PersonneDB
{
	private $db; // Instance de PDO
	
	public function __construct($db)
	{
		$this->db=$db;
	}
	/**
	 * 
	 * fonction d'Insertion de l'objet Personne en base de donnee
	 * @param Personne $p
	 */
	public function ajout(Personne $p):void
	{
		$q = $this->db->prepare('INSERT INTO personne(nom,prenom,datenaissance,telephone,email,login,pwd) values(:nom,:prenom,:datenaissance,:telephone,:email,:login,:pwd)');
	

	$q->bindValue(':nom',$p->getNom());
	$q->bindValue(':prenom',$p->getPrenom());
	$q->bindValue(':datenaissance',$p->getDatenaissance()->format('Y-m-d'));
	$q->bindValue(':telephone',$p->getTelephone());
	$q->bindValue(':email',$p->getEmail());
	$q->bindValue(':login',$p->getLogin());
	$q->bindValue(':pwd',$p->getPwd());
		$q->execute();	
		$q->closeCursor();
		$q = NULL;
	}
    /**
     * 
     * fonction de Suppression de l'objet Personne
     * @param Personne $p
     */
	public function suppression(Personne $p):void{
		 	//TODO
	}
	/**
	 * 
	 * Fonction de selection en fonction du nom
	 * @param $nom
	 */
	public function selectionNom($nom){
		//TODO
		if(empty($arrAll)){
			throw new Exception(Constantes::EXCEPTION_DB_PERSONNE); 
		
		}
				
		$q->closeCursor();
		$q = NULL;
		//conversion du resultat de la requete en objet personne
	 	$res= $this->convertPdoPers($arrAll);
		//retour du resultat
		return $res;
	}
/**
	 * 
	 * Fonction de selection en fonction de l'id
	 * @param $nom
	 */
	public function selectionId($id){
		//TODO
		//si pas de personne , on leve une exception

		if(empty($arrAll)){
			throw new Exception(Constantes::EXCEPTION_DB_PERSONNE); 
		
		}
		
		$q->closeCursor();
		$q = NULL;
		//conversion du resultat de la requete en objet personne
		$res= $this->convertPdoPers($arrAll);
		//retour du resultat
		return $res;
	}
	/**
	 * 
	 * Fonction qui retourne toutes les personnes
	 * @throws Exception
	 */
	public function selectAll(){
		//TODO
		
		//si pas de personnes , on leve une exception
		if(empty($arrAll)){
			throw new Exception(Constantes::EXCEPTION_DB_PERSONNE);
		}
		
				
		//Clore la requete préparée
		$q->closeCursor();
		$q = NULL;
		//retour du resultat
		return $arrAll;
	}
/**
	 * 
	 * Fonction qui convertie un PDO Personne en objet Personne
	 * @param $pdoPers
	 * @throws Exception
	 */
	public function convertPdoPers($pdoPers){
	if(empty($pdoPers)){
		throw new Exception(Constantes::EXCEPTION_DB_CONVERT_PERS);
	}
	//conversion du pdo en objet
	$obj=(object)$pdoPers;
	//print_r($obj);
	//conversion de l'objet en objet personne
	//conversion date naissance en datetime
	$dt =new  DateTime($obj->datenaissance);
	$pers=new Personne($obj->nom,$obj->prenom,$dt,$obj->telephone, $obj->email,$obj->login,$obj->pwd);
	//affectation de l'id pers
	$pers->setId($obj->id);
	 	return $pers;	 
	}
	/**
	 * 
	 * Fonction de modification d'une personne
	 * @param Personne $r
	 * @throws Exception
	 */
public function update(Personne $p)
	{
		//TODO
		}
		catch(Exception $e){
			throw new Exception(Constantes::EXCEPTION_DB_PERS_UP); 
			
		}
	}
}