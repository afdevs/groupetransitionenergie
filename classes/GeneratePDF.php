<?php
namespace Classes;

if (!defined('ACCESSCHECK')) {
    die('Direct access not permitted');
}

use Exception;
use mikehaertl\pdftk\Pdf as PdftkPdf;

class GeneratePDF{
    public function generate($data, $addProducts, $addSolutions)
    {

          try {
                //les noms des fichiers utilisés
                $filename = 'formulaire.pdf';
                $fileproducts = './completed/produits_selected.pdf';
                $fileoutput = './completed/recapitulatif.pdf';
                // print_r($data);

                //page de solutions
                $page = 6;

                //remplir le formulaire
                $pdf1 = new PdftkPdf($filename);
                var_dump($pdf1);
                $pdf1->fillForm($data)
                      ->flatten()
                      ->saveAs($fileoutput);

                //quand on ajoute pas les solutions 
                if (!$addSolutions) {
                      $pdf2 = new PdftkPdf($fileoutput);
                      $pdf2->cat(1, 5)
                            ->cat(7, 'end')
                            ->saveAs($fileoutput);
                      $page = $page-1;
                }

                //page des produits
                if ($addProducts) {
                      //concatenation des pages
                      $files = [
                            'A' => $fileoutput,
                            'B' => $fileproducts,
                      ];

                      $pdf = new PdftkPdf($files);
                      $pdf->cat(1, $page, 'A')
                            ->cat(1,'end', 'B')
                            ->cat($page+1, 'end', 'A')
                            ->saveAs($fileoutput);
                      unlink($fileproducts);
                }
                //->send( $filename . '.pdf');
                return $filename;
          } catch (Exception $e) {
                return $e->getMessage();
          }
    }
}