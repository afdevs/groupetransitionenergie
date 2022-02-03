<?php

use Classes\GeneratePDF;

if(!isset($_POST))
{
     exit;
}

define('ACCESSCHECK', TRUE);

require_once 'vendor/autoload.php';


$today = date("d-m-Y");

$data = [
      'nomPrenom' =>  $_POST['nom'].' '.$_POST['prenom'],
      'nomPrenom1' =>  $_POST['nom'].' '.$_POST['prenom'],
      'nomPrenom2' =>  $_POST['nom'].' '.$_POST['prenom'],
      'adresse' =>  $_POST['address'],
      'dateEtude' => $today,
      'refProjet' => 'BH2600-'.rand(100,999),
      'typeOccupation' => trim($_POST['type_d_occupation']),
      'nbHabitant' => $_POST['nombre_d_habitants'],
      'AnneeConstruction' => $_POST['annee_contruction'],
      'surfaceSol' => $_POST['surface_au_sol'].' m2',
      'formeMaison' => $_POST['forme_maison'],
      'nbNiveau' => $_POST['nombre_de_niveau'],
      'hauteurSousPlafond' => $_POST['hauteur_sous_plafond_moyenne'],
      'typeSousSol' => $_POST['type_de_sous_sol'],
      'typeMur' => $_POST['type_de_mur'],
      'typeCombles' => $_POST['type_de_comble'],
      'typeVitrage' => $_POST['type_de_vitrage'],
      'typeVentilation' => $_POST['type_de_ventilation'],
      'coefIso' => $_POST['gisolation'],
      'sourceChauffage' => $_POST['source_chauffage'],
      'typeChauffage' => $_POST['typeChauffage'],    
      'AnneeInst' => $_POST['AnneeInst'],    
      'tempConfort' => $_POST['temperature_de_confort'],    
      'sourceEau' => $_POST['sourceEau'],    
      'capStock' => $_POST['capStock'],    
      'utilisation' => $_POST['utilisation'],    
      'appElec' => $_POST['appElec'],    
      'typeAmpoule' => $_POST['typeAmpoule'],    
      'electUtil' => $_POST['electUtil'],
      'consoActGlob' => $_POST['consoActGlob'],
      'consoXAn' => $_POST['consoXAn'],
      'moyenneConsoXan' => $_POST['moyenneConsoXan'],
      'statutMarital' => $_POST['statutMarital'],
      'nbEnfCharge' => $_POST['nbEnfCharge'],
      'revenus' => $_POST['revenus'].' €',
      'primeRenov' => $_POST['primeRenov'],
      'coupPouce' => $_POST['coupDePouce'],
      'primeRenov2' => $_POST['primeRenov'],
      'coupPouce2' => $_POST['coupDePouce'],
      'bonusEco' => $_POST['bonusEco'],
      'aidesCumul' => $_POST['aidesCumul'],
      'chauffagePrix' => $_POST['chauffagePrix'],
      'eauPrix' => $_POST['eauPrix'],
      'appPrix' => $_POST['appPrix'],
      'elecPrix' => $_POST['elecPrix'],
      'pompeKWA' => $_POST['pompeKWA'],
      'nbAnnee' => $_POST['nbAnnee'],
      'nbAnne' => $_POST['nbAnnee'],
      'NbAnnee3' => $_POST['NbAnnee3'],
      'nbAnnee3' => $_POST['NbAnnee3'],
      'solutionEau' => $_POST['solutionEau'],
      'nbUnit' => $_POST['nbUnit'],
      'champ1' => $_POST['champ1'],
      'champ2' => $_POST['champ2'],
];
$addProducts = $_POST['addProducts'];
$addSolutions = $_POST['addSolutions'];

$pdf = new GeneratePDF();
$response = $pdf->generate($data,$addProducts,$addSolutions);