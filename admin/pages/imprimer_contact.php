<?php

require '../lib/php/dbConnectMysql.php';
require '../lib/php/classes/Connexion.class.php';
require '../lib/php/classes/ContactDB.class.php';

$cnx = Connexion::getInstance($dsn, $user, $pass);

$cake = new ContactDB($cnx);
$liste = $cake->getAllContact();
$nbrCakes = count($liste);

require '../lib/php/fpdf/fpdf.php';


$pdf = new FPDF('P', 'cm', 'A4');
$pdf->setFont('Arial', 'B', 14);
$pdf->AddPage();
$pdf->setX(8);
$pdf->cell(3.5, 1, 'Contact', 0, 0, 'C');
$pdf->SetFillColor(200, 10, 10);
$pdf->SetDrawColor(0, 0, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->setXY(3, 2);
$x = 3;
$y = 3;

$pdf->SetXY($x, $y);
$pdf->cell(1, 1, 'id_contact', 0, 0, 'C');
$pdf->SetXY($x + 3, $y);
$pdf->cell(1, 1, utf8_decode('nom'), 0, 0, 'C');
$pdf->SetXY($x + 7, $y);
$pdf->cell(1, 1, utf8_decode('email'), 0, 0, 'C');
$pdf->SetXY($x + 10, $y);
$pdf->cell(1, 1, utf8_decode('subject'), 0, 0, 'C');
$pdf->SetXY($x + 13, $y);
$pdf->cell(1, 1, utf8_decode('message'), 0, 0, 'C');
$y += 2;

$y + 2;


for ($i = 0; $i < $nbrCakes; $i++) {

    $pdf->SetXY($x, $y);
    $pdf->cell(1, 1, $liste[$i]['id_contact'], 0, 0, 'C');
    $pdf->SetXY($x + 3, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['nom']), 0, 0, 'C');
    $pdf->SetXY($x + 7, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['email']), 0, 0, 'C');
    $pdf->SetXY($x + 10, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['subject']), 0, 0, 'C');
    $pdf->SetXY($x + 13, $y);
    $pdf->cell(1, 1, utf8_decode($liste[$i]['message']), 0, 0, 'C');
    $y += 2;

    if ($y % 25 == 0) {
        $pdf = new FPDF('P', 'cm', 'A4');
        $pdf->setFont('Arial', 'B', 14);
        $pdf->AddPage();
        $pdf->setX(8);
        $pdf->cell(3.5, 1, 'Contact', 0, 0, 'C');
        $pdf->SetFillColor(200, 10, 10);
        $pdf->SetDrawColor(0, 0, 255);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->setXY(3, 2);
        $x = 3;
        $y = 3;

        $pdf->SetXY($x, $y);
        $pdf->cell(1, 1, 'id_contact', 0, 0, 'C');
        $pdf->SetXY($x + 3, $y);
        $pdf->cell(1, 1, utf8_decode('nom'), 0, 0, 'C');
        $pdf->SetXY($x + 7, $y);
        $pdf->cell(1, 1, utf8_decode('email'), 0, 0, 'C');
        $pdf->SetXY($x + 10, $y);
        $pdf->cell(1, 1, utf8_decode('subject'), 0, 0, 'C');
        $pdf->SetXY($x + 13, $y);
        $pdf->cell(1, 1, utf8_decode('message'), 0, 0, 'C');
        $y += 2;
    }
}



$pdf->Output();
