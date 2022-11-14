<?php
use PHPUnit\Framework\TestCase;

require_once "src/Constantes.php";
require_once "src/metier/Adresse.php";
require_once "src/PDO/AdresseDB.php";

class AdresseDBTest extends TestCase {

    /**
     * @var AdresseDB
     */
    protected $adresse;
    protected $pdodb;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp():void {
        //parametre de connexion à la bae de donnée
       $strConnection = Constantes::TYPE . ':host=' . Constantes::HOST . ';dbname=' . Constantes::BASE;
        $arrExtraParam = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $this->pdodb = new PDO($strConnection, Constantes::USER, Constantes::PASSWORD, $arrExtraParam); //Ligne 3; Instancie la connexion
        $this->pdodb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown():void {
        
    }

    /**
     * @covers AdresseDB::ajout
     * Implement testAjout().
     * @large
     */
    public function testAjout() {
        try {
         //TODO
        } catch (Exception $e) {
            echo 'Exception recue : ', $e->getMessage(), "\n";
        }
    }

    /**
     * @covers AdresseDB::suppression
     * @todo   Implement testSuppression().
     */
    public function testSuppression() {
        try{
 
   //TODO
   
if($adr!=null){
      $this->markTestIncomplete(
                'This test delete not ok.'
        );
     
    }

    }  catch (Exception $e){
        //verification exception
        $exception="RECORD ADRESSE not present in DATABASE";
        $this->assertEquals($exception,$e->getMessage());

    }
         
    }

    /**
     * @covers AdresseDB::update
     * @todo   Implement testUpdate().
     */
    public function testUpdate() {
      $this->adresse = new AdresseDB($this->pdodb);
    $a=new Adresse(101,26, "boulevard victor Hugo",44000,"Nantes");
    $a->setId("11");
    $this->adresse->update($a);   
        //TODO  à finaliser 
    }

    /**
     * @covers AdresseDB::selectAll
     * @todo   Implement testSelectAll().
     */
    public function testSelectAll() {
       $this->adresse = new AdresseDB($this->pdodb);
    $res=$this->adresse->selectAll();
    $i=0; $ok=true;
   foreach ($res as $key=>$value) {
       $i++; 
   }

		
	if($i==0){
       $this->markTestIncomplete(
                'Pas de résultats'
        );
 $ok=false;
    
        }
$this->assertTrue($ok);
    print_r($res);
    
    }

    /**
     * @covers AdresseDB::selectAdresse
     * @todo   Implement testSelectAdresse().
     */
    public function testSelectIdAdresse() {
      //TODO
    }

}
