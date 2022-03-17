<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
// header("Content-type:application/pdf");
// header("Content-Disposition:attachment;filename='recapitulatif.pdf'");

// The PDF source is in original.pdf
return readfile("recapitulatif.pdf");

/*

<?php
  $filename = 'httpfile.zip';
  $mimetype = 'application/zip';
  $data = file_get_contents($filename);
  $size = strlen($data);
  header("Content-Disposition: attachment; filename
    = $filename");
  header("Content-Length: $size");
  header("Content-Type: $mimetype");
  echo $data;
 */

?>