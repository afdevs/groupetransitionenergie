<?php

$uploadResult=move_uploaded_file(
    $_FILES['pdf']['tmp_name'], 
    "./completed/produits_selected.pdf"
);
