<?php
header('Access-Control-Allow-Origin: *');
// if(isset($_FILES['pdf']['name']))
// {
//     $uploadResult = move_uploaded_file($_FILES['pdf']['tmp_name'],"./completed/produits_selected.pdf");
// }
// if(isset($_FILES['file']['name']))
// {
//     $uploadResult=move_uploaded_file(
//         $_FILES['pdf']['tmp_name'], 
//         "./completed/produits_selected.pdf"
//     );
// }


if(isset($_FILES['pdf']['name']))
{
    $uploadResult = move_uploaded_file($_FILES['pdf']['tmp_name'],"./completed/produits_selected.pdf");
}

if(isset($_FILES['file']['name']))
{
    $uploadResult = move_uploaded_file($_FILES['file']['tmp_name'],"./completed/page_images.pdf");
} 