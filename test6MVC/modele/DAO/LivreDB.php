<?php
require_once "Constantes.php";
require_once "modele/metier/Livre.php";
require_once "MediathequeDB.php";

class LivreDB extends MediathequeDB
{
	private $db; // Instance de PDO
	public $lastId;
	
	public function __construct($db)
	{
		$this->db=$db;
	}
	/**
	 * 
	 * fonction d'Insertion de l'objet Livre en base de donnee
	 * @param Livre $l
	 */
	public function ajout(Livre $l)
	{
		$q = $this->db->prepare('INSERT INTO livre(titre,edition,information ,auteur) values(:t,:e,:info,:aut)');
		$q->bindValue(':t', $l->getTitre());
		$q->bindValue(':e', $l->getEdition());
		$q->bindValue(':info', $l->getInformation());		
		$q->bindValue(':aut', $l->getAuteur());			
		$q->execute();
        $this->lastId=$this->db->lastInsertId();
		$q->closeCursor();
		$q = NULL;
                

	}
/**
	 * 
	 * fonction d'update de l'objet Livre en base de donnee
	 * @param Livre $l
	 */
	public function update(Livre $l)
	{
		$q = $this->db->prepare('UPDATE livre set titre=:t,edition=:e,information=:info ,auteur=:aut where id=:i');
		$q->bindValue(':t', $l->getTitre());
		$q->bindValue(':e', $l->getEdition());
		$q->bindValue(':info', $l->getInformation());		
		$q->bindValue(':aut', $l->getAuteur());		
		$q->bindValue(':i', $l->getId());			
		$q->execute();	
		$q->closeCursor();
		$q = NULL;
	}
    /**
     * 
     * fonction de Suppression de l'objet Livre
     * @param Livre $l
     */
	public function suppression($id){
		 	$q = $this->db->prepare('delete from livre where id=:i');
		$q->bindValue(':i', $id);			
		$res=$q->execute();	
		$q->closeCursor();
		$q = NULL;
                return $res;
	}
/**
	 * 
	 * Fonction qui retourne toutes les livres
	 * @throws Exception
	 */
	public function selectAll(){
		$query = 'SELECT * FROM livre';
		$q = $this->db->prepare($query);
		$q->execute();
		
		$arrAll = $q->fetchAll(PDO::FETCH_ASSOC);
		
		//si pas de livres , on leve une exception
		if(empty($arrAll)){
			throw new Exception(Constantes::EXCEPTION_DB_LIVRE);
		}
		
		$arrAll;		
		//Clore la requ�te pr�par�e
		$q->closeCursor();
		$q = NULL;
		//retour du resultat
		return $arrAll;
	}
public function selectLivre($id){
	try{
		$query = 'SELECT * FROM livre where id=:id';
		$q = $this->db->prepare($query);
		$q->bindValue(':id', $id);
		$q->execute();
		
		$arrAll  = $q->fetch(PDO::FETCH_ASSOC);
	
		//si pas de livres , on leve une exception
		if(empty($arrAll)){
			throw new Exception(Constantes::EXCEPTION_DB_LIVRE);
		}
		
		//Clore la requete préparée
		$q->closeCursor();
		$q = NULL;
                
                	//conversion du resultat de la requete en objet livre
		$res= $this->convertPdoLiv($arrAll);
		//retour du resultat
		return $res;
	}catch (Exception $e){
		throw new Exception(Constantes::EXCEPTION_DB_LIV_SELECT . $e); 
	}
	}
        /**
	 * 
	 * Fonction qui convertie un PDO Livre en objet Livre
	 * @param $pdoLivr
	 * @throws Exception
	 */
	public function convertPdoLiv($pdoLivr){
	if(empty($pdoLivr)){
		throw new Exception(Constantes::EXCEPTION_DB_CONVERT_LIVR);
	}
	try{
	//conversion du pdo en objet
	$obj=(object)$pdoLivr;
	//conversion de l'objet en objet livre


	$l=new Livre($obj->titre,$obj->edition,$obj->information,$obj->auteur);
	//affectation de l'id livre
	$l->setId($obj->id);
	 	return $l;	 
	}catch(Exception $e){
		throw new Exception(Constantes::EXCEPTION_DB_CONVERT_LIVR.$e);
	}
	}
}