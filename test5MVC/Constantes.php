<?php
/**
 * 
 *Classe definissant les constantes de l'application
 * @author pascal LAMY
 *
 */
 class Constantes {

	
	const PATH_SEPARATOR ="\\";
/**
 * constante de connexion a la base de donnée
 */
	 const HOST="localhost";
	 const USER="root";
	 const PASSWORD="";
	 const BASE="pers";
	 const TYPE="mysql";
	 
	 //gestion des exceptions
	 //exception PDO
	 const EXCEPTION_DB_PERSONNE="RECORD PERSONNE not present in DATABASE";
	 const EXCEPTION_INSERT_DB_PERS="ERROR INSERT PERSONNE in DATABASE";
	 const EXCEPTION_DB_ADRESSE="RECORD ADRESSE not present in DATABASE";
	 const EXCEPTION_INSERT_DB_ADRESSE="ERROR INSERT ADRESSE in DATABASE";
	 const EXCEPTION_DB_LIVRE = "RECORD LIVRE not present in DATABASE";
	 const EXCEPTION_INSERT_DB_LIVRE="ERROR INSERT LIVRE in DATABASE";
	 //exception PDO update
	 const EXCEPTION_DB_PERS_UP="RECORD PERSONNE not update in DATABASE";
	 //exception PDO update
	 const EXCEPTION_DB_ADR_UP="RECORD ADRESSE not update in DATABASE";
	 //exception PDOconvetAdresse
	 const EXCEPTION_DB_ADR_CONVERT="ERROR CONVERSION DB -> ADRESSE CONVERTADRESS";
	 //esxception pdo dblivre
	 const EXCEPTION_DB_LIV_SELECT="ERROR SELECT LIVRE in DATABASE";
	 const EXCEPTION_DB_CONVERT_LIVR="ERROR CONVERT PDO LIVRE";
	 const EXCEPTION_DB_CONVERT_ADR="ERROR CONVERT PDO ADRESSE";
	 const EXCEPTION_DB_CONVERT_PERS="ERROR CONVERT PDO PERS";
     //connexion PDO
	const STR_CONNEXION = "Constantes::TYPE.':host='.Constantes::HOST.';dbname='.Constantes::BASE"; 
    const ARR_EXTRA_PARAMETER ="array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'";
	//validComptecontroller
	const MESSAGE_VALID_UP="Le compte a bien été mis à jour ainsi que votre adresse.";
	const MESSAGE2_VALID_UP="Le compte a bien été mis à jour et la nouvelle adresse a été insérée.";

}

