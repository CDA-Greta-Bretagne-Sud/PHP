<?php 
use PHPUnit\Framework\TestCase;
require_once 'Adresse.php';

/**
 * Personne test case.
 */
class AdresseTest extends TestCase
{

    /**
     *
     * @var Adresse
     */
    private $adresse;

    /**
     * Prepares the environment before running a test.
     */
    public function setUp(): void
    {
        parent::setUp();

     
        $this->adresse = new Adresse();
        
    }

    /**
     * Cleans up the environment after running a test.
     */
    public function tearDown(): void
    {
        // TODO Auto-generated PersonneTest::tearDown()
        $this->adresse = null;

        parent::tearDown();
    }
     /**
     * Tests Adresse->__toString()
     */
    public function testSimple()
    {
        //un dummy est un objet qui a un objectif à atteindre.  
//Un stub est un dummy auquel on ajoute un comportement. Cela signifie concrètement que vous indiquez ce que la méthode d'un objet doit toujours retourner lorsqu'elle est appelée.

//creation du bouchon pour la classe Adresse
        $stub= $this->createMock(Adresse::class);
        //config du bouchon
        $stub->method('__toString')
             ->willReturn('[6,rue sainte Croix,44000,Nantes]');

        $this->assertSame('[6,rue sainte Croix,44000,Nantes]',$stub->__toString());
     
    

    }
    public function testParametre(){
             //creation du bouchon
       $stub= $this->createMock(Adresse::class);
       $stub->method('__toString')
       ->will($this->returnArgument(0));
       //retourne l'argument passé en parametre
       $this->assertSame('[une adresse passe en argument]',$stub->__toString('[une adresse passe en argument]'));
    }
    public function testReference(){
           
           //creation du bouchon
      $stub= $this->createMock(Adresse::class);
          //config du bouchon
      $stub->method('__toString')
      ->will($this->returnSelf());
      //retourne la reference $stub
      $this->assertSame($stub, $stub->__toString());
   }

   public function testReturnValuemap(){
       //creation du bouchon
    $stub= $this->createMock(Adresse::class);
     // Créer une association entre arguments et valeurs de retour
     $tab = [
        ['a', 'b', 'c', 'd'],
        ['e', 'f', 'g', 'h']
    ];
    
        // Configurer le bouchon.
        $stub->method('testReturn')
             ->will($this->returnValueMap($tab));

        // $stub->testReturn() retourne différentes valeurs selon
        // les paramètres fournis.
        $this->assertSame('d', $stub->testReturn('a', 'b', 'c'));
        $this->assertSame('h', $stub->testReturn('e', 'f', 'g'));
   }
   public function testReturnCall(){
    //creation du bouchon
    $stub= $this->createMock(Adresse::class);
 
 // Configurer le bouchon.
    $stub->method('testReturn')
    ->will($this->onConsecutiveCalls(2, 3, 5, 7));

// $stub->testReturn() retourne une valeur différente à chaque fois
$this->assertSame(2, $stub->testReturn());
$this->assertSame(3, $stub->testReturn());
$this->assertSame(5, $stub->testReturn());
}
public function testThrowException()
{
    // Créer un bouchon pour la classe SomeClass.
    $stub = $this->createMock(Adresse::class);

    // Configurer le bouchon.
    $stub->method('testReturn')
         ->will($this->throwException(new Exception));

    // $stub->testreturn throws Exception
   // $stub->testReturn();
    $this->assertEquals('Exception', $stub->testReturn());
    //$this->expectException('Exce)ption';
}

}

