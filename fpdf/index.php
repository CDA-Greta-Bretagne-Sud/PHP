<?php
require("fpdf185/fpdf.php");

class PDF extends FPDF
{

    function Titre($titre)
    {
        // font 
        $this->SetFont('Arial', 'B', 14);
        // titre
        $this->MultiCell(0, 5, utf8_decode($titre), 0, 'C', false);
        // saut de ligne
        $this->Ln();
    }

    function Date($date)
    {
        // font
        $this->SetFont('Arial', '', 10);
        // date
        $this->Cell(0, 10, utf8_decode($date), 0, 1, 'L', 0);
    }

    function Auteur($auteur)
    {
        // font
        $this->SetFont('Arial', '', 10);
        // auteur
        $this->Cell(0, 10, utf8_decode($auteur), 0, 1, 'L', 0);
    }


    function Texte(string $text)
    {
        // font 
        $this->SetFont('Arial', '', 10);
        // texte
        $this->MultiCell(0, 10, utf8_decode($text), 0, 'L', false);
    }

    function TexteGras(string $text)
    {
        // font 
        $this->SetFont('Arial', 'B', 10);
        // texte
        $this->MultiCell(0, 10, utf8_decode($text), 0, 'L', false);
    }


    function ImageDoc($image, $lien)
    {
        // image
        $this->Image($image, 20, 130, 170, 150, 'png', $lien);
    }
}

$titre = "Les pirates de Thalès diffusent des centaines de documents volés au géant high tech";

$date = "Le 11 Novembre 2022";

$auteur = "par: Damien Bancal";

$texte_gras = "Alors que des internautes se moquaient de Lockbit 3.0 en affichant le fait que la menace des pirates à l'encontre de Thalès n'était que du bluff, en réponse, les hackers malveillants viennent de diffuser des centaines de documents internes !";

$texte_lien = "Comme je vous l'expliquais dernièrement, LockBit 3.0 fait face à une masse de victimes qui dépasse l'entendement, sans parler d'une restructuration interne suite à, au moins, une arrestation d'un membre affilié.";

$texte1_normal = "Alors que LockBit avait menacé, début novembre le géant high tech Thalès, aucunes informations n'avaient fuité aprés la fin du compte à rebours malveillant.";

$image = 'image.png';

$texte2_normal = "Avec une semaine de retard, le pirate caché derrière cette intrusion et exfiltrations de données vient de mettre à exécution sa menace via 10 espaces de stockages différents (sic!).
Parmi les documents, des plans concernant des centres radars, des entrainement VOR (VHF Omnidirectional Radio Range – équipement d'aéroport).
Les pirates ont diffusé plus de 9Go de données. Vicieux, le pirate a nommé son larcin « New Attack«, nouvelle attaque !
Rassurant, aucunes données d'employés ne semblent avoir été dérobées.";

$lien = "https://www.zataz.com/lockbit-est-il-depasse-par-le-nombre-de-ses-victimes/";


// Première page
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetMargins(20, 20, 20);
$pdf->Titre($titre);
$pdf->Date($date);
$pdf->Auteur($auteur);
$pdf->TexteGras($texte_gras);
$pdf->Texte($texte_lien);
$pdf->Texte($texte1_normal);
$pdf->Image($image, 20, 130, 170, 150, 'png', $lien);

// Seconde page
$pdf->AddPage();
$pdf->Texte($texte2_normal);
$pdf->Output();
