<?php

	$target_dir = "./assets/img/";
	$target_file = $target_dir . basename($_FILES["foto"]["name"]);
	
	$check = getimagesize($_FILES["foto"]["tmp_name"]);
	
    if($check !== false) {
		// Si es una imagen...
        if( !move_uploaded_file( $_FILES["foto"]["tmp_name"], $target_file ) )
			// Si la he conseguido subir...
			echo "Sorry, there was an error uploading ". basename( $_FILES["foto"]["name"]). " file.";

    } else {
        echo "File is not an image.";

    }
	
?>