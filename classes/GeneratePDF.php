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
                $filename = 'formulaire_complete.pdf';
                $fileproducts = './completed/produits_selected.pdf';
                $fileoutput = './completed/recapitulatif.pdf';
                $fileimages = 'formulaire_images.pdf';
                // print_r($data);

                //page de solutions
                $page = 6;
            
                //remplir le formulaire
                $pdf1 = new PdftkPdf($filename);
                $pdf1->fillForm($data)
                      ->flatten()
                      ->saveAs($fileoutput);

                //quand on ajoute pas les solutions 
                if (!$addSolutions) {
                      $pdf2 = new PdftkPdf($fileoutput);
                      $pdf2->cat(1, 5, 'A')
                            ->cat(7, 'end', 'A')
                            ->cat(1, 'end', 'B')
                            ->saveAs($fileoutput);
                      $page = $page-1;
                }

                if($fileimages){
                        $c_files = [
                              'A' => $fileoutput,
                              'B' => $fileimages,
                        ];

                        $pdf3 = new PdftkPdf($c_files);
                        $pdf3->cat(1, 'end', 'A')
                              ->cat(1, 'end', 'B')
                        ->saveAs($fileoutput);
                }

                //page des produits
                if ($addProducts) {
                      //concatenation des pages
                      $files = [
                            'A' => $fileoutput,
                            'B' => $fileproducts,
                            'C' => $fileimages
                      ];

                      $pdf = new PdftkPdf($files);
                      $pdf->cat(1, $page, 'A')
                            ->cat(1,'end', 'B')
                            ->cat($page+1, 'end', 'A')
                            ->cat(1,'end', 'C')
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